<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Register;
use App\Forms\ForgotPwd;
use App\Forms\ResetPwd;
use App\Forms\Login;
use App\Models\User;
use App\Core\Mailer;
use App\Helper;
use App\Middlewares\CheckAuth;
use App\Controllers\Error;

require_once dirname(__DIR__) . '/vendor/autoload.php';

class Auth
{
    public function logout(): void
    {
        session_destroy();
        Helper::redirectTo(); // redirige vers l'index
    }

    public function login(): void
    {
        // Si déjà enregistré dans session, redirige vers l'index
        if ((Helper::methodUsed() === Helper::GET) && CheckAuth::isLoggedIn()) {
            Helper::redirectTo();
            return;
        }

        if (Helper::methodUsed() === Helper::POST) {

            $form = new Login();

            if (!$form->isValid()) {
                array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
                $this->viewLogin();
                return;
            }

            $this->loginPost($form->getData());
        }

        $this->viewLogin();
    }

    public function loginPost(array $data): void
    {
        $captchaToken = $data['g-recaptcha-response'];
        if (!Helper::checkCaptcha($captchaToken)) {
            array_push($_SESSION['error_messages'], "Le captcha n'est pas valide.");
            $this->viewLogin();
            return;
        }
        
        $email = $data['email'];
        $password = $data['pwd'];

        // chercher le user
        $user = new User();
        $where = ['email' => $email];
        $user = $user->getOneWhere($where);

        if (!Validator::loginVerify($user, $password)) {
            $this->viewLogin();
            return;
        }

        // Connexion réussiehttp://localhost/#
        $_SESSION['isAuth'] = true;
        $_SESSION['userId'] = $user->getId();
        $_SESSION['name'] = $user->getLastname() . " " . $user->getFirstname();
        $_SESSION['email'] = $user->getEmail();
        Helper::generateCSRFToken();
        Helper::redirectTo();
    }

    public function viewLogin(): void
    {
        $view = new View("Auth/login", "auth");
        $form = new Login();
        $view->assign("loginForm", $form->getConfig());
        $view->assign("pageName", "Connexion");
    }

    public function view_register(): void
    {
        $view = new View("Auth/register", "auth");
        $form = new Register();
        $view->assign("registerForm", $form->getConfig());
        $view->assign("pageName", "Inscription");
    }

    public function register(): void
    {
        // Si déjà enregistré dans session, redirige vers l'index
        if ((Helper::methodUsed() === Helper::GET) && CheckAuth::isLoggedIn()) {
            Helper::redirectTo();
            return;
        }

        // Juste la View
        $form = new Register();

        // Puis vérif si POST ou GET
        if (Helper::methodUsed() === Helper::POST) {

            if (!$form->isValid()) {
                $this->view_register();
                return;
            }

            $this->registerPost($form->getData());
        } // else {
            // GET
        // }

        $this->view_register();
    }

    public function registerPost(array $data): void
    {
        $captchaToken = $data['g-recaptcha-response'];
        if (!Helper::checkCaptcha($captchaToken)) {
            array_push($_SESSION['error_messages'], "Le captcha n'est pas valide.");
            $this->view_register();
            return;
        }

        $user = new User();
        $user->setFirstname($data['firstname']);
        $user->setLastname($data['lastname']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setBirthDate($data['birth_date']);
        $user->setRole(3);
        $user->setConfirmKey(bin2hex(random_bytes(32)));
        $user->setConfirm(0);
        $user->save();

        // Envoi de l'e-mail de validation
        Mailer::sendMail($user->getEmail(), "validation du compte", "Veuillez validé votre compte: http://localhost:80/confirm?key=" . $user->getConfirmKey());
        //Helper::redirectTo('/login');
        Helper::successAlert('Votre compte a bien été créé, veuillez valider votre compte via le mail qui vous a été envoyé');
        header('Refresh: 5; URL=/login');
    }

    public function confirmAccount()
    {
        if (isset($_SESSION['isAuth']) && $_SESSION['isAuth']) {
            header('Refresh: 0; URL=/');
            return;
        }

        if (isset($_GET['key'])) {

            $userModel = new User();

            $getKey = htmlspecialchars($_GET['key']);

            $user = $userModel->getUserToConfirm($getKey);

            if (is_array($user)) {
                if (!$user['confirm']) {
                    $userModel->confirmAccount($user['id']);
                    Helper::successAlert('Votre compte a bien été confirmé, vous allez être redirigé vers la page de connexion');
                    header('Refresh: 5; URL=/login');
                } else {
                    array_push($_SESSION['error_messages'], "Compte déja confirmé");
                }
            } else {
                array_push($_SESSION['error_messages'], "Token invalid");
            }
        } else {
            array_push($_SESSION['error_messages'], "Aucun token présent");
        }

        $this->viewConfirm();
        $_SESSION['error_messages'] = [];
    }

    public function viewConfirm(): void
    {
        $view = new View("Auth/confirm", "auth");
        $view->assign("pageName", "Confirmation de compte");
    }

    public function viewForgotPwd()
    {
        $view = new View("Auth/forgotPwd", "auth");
        $forgotForm = new ForgotPwd();
        $view->assign("forgotForm", $forgotForm->getConfig());
        $view->assign("pageName", "Forgot Password");
    }

    public function forgotPassword()
    {
        $forgotForm = new ForgotPwd();

        if (!isset($forgotForm->getData()['emailForgot'])){
            $error = new Error();
            $error->error403();
            exit();
        }

        if (!$forgotForm->isValid()) {
            array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
            $this->viewForgotPwd();
            return;
        }

        $emailToSend = $forgotForm->getData()['emailForgot'];

        $_SESSION['error_mail_sent'] = [];

        $user = new User();
        if (!$user->emailExists($emailToSend)) {
            $this->viewForgotPwd();
            return;
        }
        $forgotToken = $this->generateToken(32);
        $tokenExpiration = time() + 300;
        Mailer::sendMail($emailToSend, "Modification du mot de passe", "Nous vous avons envoyé ce mail car une demande de réinitialisation de mot de passe a été demandée. Vous pouvez le modifier via ce lien : http://localhost:80/reset-password?mail=" . $emailToSend . "&token=" . $forgotToken . ". La demande expirera dans 5 minutes.");
        $user->updateForgotToken(['email' => $emailToSend], ['forgot_token' => $forgotToken]);
        $user->setExpirationTime(['email' => $emailToSend], ['expiration_time' => $tokenExpiration]);
        $this->viewForgotPwd();
    }

    public function viewResetPassword()
    {
        if (!isset($_GET['mail']) || !isset($_GET['token'])) {
            $error = new Error();
            $error->error403();
            exit();
        }

        $view = new View("Auth/resetPwd", "auth");
        $resetForm = new ResetPwd();
        $view->assign("resetForm", $resetForm->getConfig());
        $view->assign("pageName", "Reset Password");
    }
    public function resetPassword()
    {

        if (!isset($_GET['mail']) || !isset($_GET['token'])) {
            $error = new Error();
            $error->error403();
            exit();
        }
        
        $user = new User();
        $tokenValidity = $user->isTokenExpired(['email' => $_GET['mail']]);

        if (Helper::methodUsed() === Helper::POST) {
            $resetPwd = new ResetPwd();

            if (!$resetPwd->isValid() || !$user->isTokenValid(['email' => $_GET['mail']], ['forgot_token' => $_GET['token']])) {
                $this->viewResetPassword();
            } else {
                if ($tokenValidity === false) {
                    $user->updateUserPwd(['email' => $_GET['mail']], ['password' => password_hash($resetPwd->getData()['password'], PASSWORD_DEFAULT)]);
                    $user->updateForgotToken(['email' => $_GET['mail']], ['forgot_token' => null]);
                    header('Location: /login');
                } else {
                    $user->updateForgotToken(['email' => $_GET['mail']], ['forgot_token' => null]);
                    array_push($_SESSION['error_messages'], "Le token a expiré.");
                    $this->viewForgotPwd();
                }
            }
        }
    }

    //Génération Token -> Sécurité Reset password
    function generateToken($length = 32)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $token = '';

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = random_int(0, $charactersLength - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }
}
