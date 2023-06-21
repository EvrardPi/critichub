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
        if (!$form->isValid()){
            $_SESSION['error_message'] = "Erreur : le formulaire n'est pas valide.";
            $this->view();
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
        $user->save();
        $mail = new PHPMailer(true);
        // Envoi de l'e-mail de validation
        try {
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'critichub-web-1';
            $mail->Port = 1025;
            $mail->CharSet = 'utf-8';
            $mail->addAddress('brouette@site.fr');
            $mail->setFrom('no-reply@site.fr', );
            $mail->Subject = 'Validation d\'inscription';
            $mail->Body = 'Bonjour, veuillez cliquer sur le lien suivant pour valider votre inscription : <a href="https://example.com/validate.php?token=XYZ123">Valider</a>';
            $mail->AltBody = 'Bonjour, veuillez copier et coller le lien suivant dans votre navigateur pour valider votre inscription : https://example.com/validate.php?token=XYZ123';
            $mail->send();

            echo "Inscription réussie. Veuillez vérifier votre boîte de réception pour valider votre compte.";
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi de l'e-mail : " . $mail->ErrorInfo;
        }
        $this->view();
    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }
}
