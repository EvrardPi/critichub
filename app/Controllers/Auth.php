<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;

class Auth
{


    public function login(): void
    {
        $form = new Login();
        $view = new View("Auth/login", "front");
        $view->assign("form", $form->getConfig());

        echo $form->getData()['email'];
        echo $form->getData()['pwd'];
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

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}