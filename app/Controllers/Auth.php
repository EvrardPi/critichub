<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\ForgotPwd;
use App\Forms\ResetPwd;
use App\Forms\Login;
use App\Models\User;
use App\Core\SQL;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Core\Mailer;
use App\Helper;
use App\Middlewares\CheckAuth;

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

        // Juste la View
        $form = new Login();

        // Puis vérif si POST ou GET
        if (Helper::methodUsed() === Helper::POST) {
            
            // token CSRF
            if (!$form->isValid()) {
                array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
                $this->view_login();
                return;
            }

            self::login_post($form->getData());
        } else {
            // GET
        }

        $this->view_login();
    }

    public function login_post(array $data): void
    {
        $email = $data['email'];
        $password = $data['pwd'];

        // chercher le user
        $user = new User();
        $where = ['email' => $email];
        $user = $user->getOneWhere($where);

        if (!$user) {
            // Pas de user trouvé
            array_push($_SESSION['error_messages'], "Connexion échouée.");
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            // Mauvais mot de passe
            array_push($_SESSION['error_messages'], "Connexion échouée.");
            return;
        }

        if ($user->getConfirm() == 0) {
            // Compte non confirmé
            array_push($_SESSION['error_messages'], "Compte non confirmé.");
            return;
        }

        // Connexion réussie
        $_SESSION['isAuth'] = true;
        $_SESSION['userId'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();
        Helper::generateCSRFToken();
        Helper::redirectTo();
    }

    public function view_login(): void
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
            
            // token CSRF
            if (!$form->isValid()) {
                array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
                $this->view_register();
                return;
            }

            self::register_post($form->getData());
        } else {
            // GET
        }

        $this->view_register();
    }

    public function register_post(array $data): void
    {
        $email = ["email" => $data['email']];

        $user = new User();

        if ($user->emailExists($email)) {
            array_push($_SESSION['error_messages'], "Le mail existe déjà, veuillez rentrer un autre mail");
            $this->view_register();
            return;
        }

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
        Mailer::sendMail($user->getEmail(), "validation du compte", "Veuillez validé votre compte: http://localhost:80/confirm?mail=" . $user->getEmail() . '&key=' . $user->getConfirmKey());
        //Helper::redirectTo('/login');
        Helper::successAlert('FEUR');
    }

    public function valideToken()
    {
        $view = new View("Auth/confirm", "front");
        if (isset($_GET['mail'], $_GET['mail'])) {
            var_dump($_GET['mail'], $_GET['key']);
            $user = new User();
            $getMail = htmlspecialchars(urldecode($_GET['mail']));
            $getKey = htmlspecialchars($_GET['key']);
            $response = $user->getToken($getMail, $getKey);
            $return_value = match ($response['user']) {
                0 => "Compte inexistant",
                1 => "sheeeesh",
                default => "Autre cas"
            };
            if ($response['confirm'] == 1) {
                echo "Votre compte à deja été confirmé ";
            };
            $response = $user->confirmAccount($getMail);
        }
    }

    public function view_forgotPwd() {
        $view = new View("Auth/forgotPwd", "auth");
        $forgotForm = new ForgotPwd();
        $view->assign("forgotForm", $forgotForm->getConfig());
        $view->assign("pageName", "Forgot Password");

    }

    public function forgotPassword() {
        $forgotForm = new ForgotPwd();

        if (!$forgotForm->isValid()) {
            array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
            $this->view_forgotPwd();
            return;
        }

        $emailToSend = $forgotForm->getData()['email'];

        $user = new User();
        if (!$user->emailExists(['email' => $emailToSend])) {
            array_push($_SESSION['error_messages'], "Si votre adresse mail existe, un mail vous sera envoyé à cette adresse : " . $emailToSend);
            $this->view_forgotPwd();
            return;
        }
        $fotgotToken = $this->generateToken(32);
        Mailer::sendMail($emailToSend, "Modification du mot de passe", "Nous vous avons envoyé ce mail car une demande de réinitialisation de mot de passe a été demandée. Vous pouvez le modifier via ce lien : http://localhost:80/reset-password?mail=" . $emailToSend . "&token=" . $fotgotToken);
        $user->updateForgotToken(['email' => $emailToSend], ['forgot_token' => $fotgotToken]);
        $this->view_forgotPwd();
    }


    public function view_resetPassword() {
        $view = new View("Auth/resetPwd", "auth");
        $resetForm = new ResetPwd();
        $view->assign("resetForm", $resetForm->getConfig());
        $view->assign("pageName", "Reset Password");

    }

    public function resetPassword() {
        $resetPwd = new ResetPwd();
        $user = new User();
        if (!$user->emailExists(['email' => $_GET['mail']])) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            $this->view_resetPassword();
            return;
        } else {
            $userInfo = $user->getUserInfo(['email' => $_GET['mail']]);
        }
        // var_dump($user);
        if (!$resetPwd->isValid()) {
            array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
            $this->view_resetPassword();
            return;
        }
        if ($resetPwd->getData()['newPwd'] != $resetPwd->getData()['confirmNewPwd']) {
            array_push($_SESSION['error_messages'], "Les mots de passe ne correspondent pas.");
            $this->view_resetPassword();
            return;
        }

        $isTokenValid = $user->isTokenValid(['email' => $_GET['mail']], ['forgot_token' => $_GET['token']]);

        // if ($isTokenValid === false){
        //     array_push($_SESSION['error_messages'], "Token faux");
        //     $this->view_resetPassword();
        //     return;
        // } else {
        //     array_push($_SESSION['error_messages'], "Token vrai");
        //     $this->view_resetPassword();
        //     return;
        // }

        if ($resetPwd->getData()['newPwd'] === $resetPwd->getData()['confirmNewPwd'] && empty($_SESSION['error_messages'])) {
            if ($isTokenValid === true){
            $user->updateUserPwd(['email' => $_GET['mail']], ['password' => password_hash($resetPwd->getData()['newPwd'],PASSWORD_DEFAULT)]);
            header('Location: /login');
            } else {
                array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
                $this->view_resetPassword();
                return;
            }
        } else {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            $this->view_resetPassword();
            return;
        }
        $this->view_resetPassword();
    }

    //Génération Token -> Sécurité Reset password
    function generateToken($length = 32) {
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
