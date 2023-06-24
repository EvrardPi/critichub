<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;
use App\Helper;
use App\Middlewares\CheckAuth;

class Auth
{

    public function logout(): void
    {
        session_destroy();
        Helper::redirectTo();
        // rediriger vers l'index
    }

    public function login(): void
    {
        // Si déjà enregistré dans session, rediriger vers l'index car déjà loggé
        if ((Helper::methodUsed() === Helper::GET) && CheckAuth::isLoggedIn()) {
            Helper::redirectTo();
            return;
        }

        // Juste la View
        $form = new Login();
        $errors = [];

        // Puis vérif si POST ou GET
        if (Helper::methodUsed() === Helper::POST) {
            $errors = self::login_post($form->getData());
        } else {
            // GET
        }

        $view = new View("Auth/login", "front");
        $view->assign("form", $form->getConfig());
        $view->assign("errors", $errors);

    }

    public function login_post(Array $data) 
    {
        $email = $data['email'];
        $password = $data['pwd'];

        // chercher le user
        $user = new User();
        $where = ['email' => $email];
        $user = $user->getOneWhere($where);
        if (!$user) {
            echo "PAS BON";
            // erreurs
            return;
        }

        if (!password_verify($password, $user->getPassword())) {
            // login invalid
            echo "BON";
            return;
        }

        $_SESSION['isAuth'] = true;
        $_SESSION['userId'] = $user->getId();
        $_SESSION['email'] = $user->getEmail();

        Helper::redirectTo();
    }


    public function register(): void
    {
        $view = new View("Auth/register", "front");
        $form = new Register();
        $view->assign("form", $form->getConfig());
        $view->assign("pageName", "Inscription");

        if (!$form->isValid()){
            echo "error";
            die();
        }
            $user = new User();
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setBirthDate($_POST['birth_date']);
        $user->setRole($_POST['role']);
            $user->save();


    }
}