<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
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

        // Puis vérif si POST ou GET
        if (Helper::methodUsed() === Helper::POST) {

            $form = new Login();

            // token CSRF
            if (!$form->isValid()) {
                array_push($_SESSION['error_messages'], "Le formulaire n'est pas valide.");
                $this->view_login();
                return;
            }

            $this->login_post($form->getData());
        } // else {
        //     // GET
        // }

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

            if (!$form->isValid()) {
                $this->view_register();
                return;
            }

            $this->register_post($form->getData());
        } else {
            // GET
        }

        $this->view_register();
    }

    public function register_post(array $data): void
    {
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

        $this->view_confirm();
        $_SESSION['error_messages'] = [];
    }

    public function view_confirm(): void
    {
        $view = new View("Auth/confirm", "auth");
        $view->assign("pageName", "Confirmation de compte");
    }
}
