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



require_once dirname(__DIR__) . '/vendor/autoload.php';



class Auth
{
    public function view(): void
    {
        $view = new View("Auth/register", "front");
        $form = new Register();
        $view->assign("registerForm", $form->getConfig());
        $view->assign("pageName", "Inscription");
        if (isset($_SESSION['error_message'])) {
            $view->assign("errorMessage", $_SESSION['error_message']);
            // Suppression de la variable de session d'erreur
            unset($_SESSION['error_message']);
        }
    }

    public function register(): void
    {
        $form = new Register();
        $formdata = $form->data;
        $user = new User();
        if (!$form->isValid()) {
            $_SESSION['error_message'] = "Erreur : le formulaire n'est pas valide.";
            $this->view();
            return;
        }
        $email = ["email" => $formdata['email']];
        $mailVerif = $user->emailExists($email);
        if ($mailVerif) {
            $_SESSION['error_message'] = "Erreur : Le mail existe déjà, veuillez rentrer un autre mail";
            $this->view();
        }
        $user->setFirstname($formdata['firstname']);
        $user->setLastname($formdata['lastname']);
        $user->setEmail($formdata['email']);
        $user->setPassword($formdata['password']);
        $user->setBirthDate($formdata['birth_date']);
        $user->setRole(3);
        $user->setConfirmKey(bin2hex(random_bytes(32)));
        $user->setConfirm(0);
        $user->save();

        // Envoi de l'e-mail de validation
        Mailer::sendMail($user->getEmail(), "valadition du compte", "Veuillez validé votre compte: http://localhost:80/confirm?mail=" . $user->getEmail() . '&key=' . $user->getConfirmKey());
        echo "Inscription réussie. Veuillez vérifier votre boîte de réception pour valider votre compte.";

        $this->view();
    }

    public function logout(): void
    {
        echo "Page de déconnexion";
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
}
