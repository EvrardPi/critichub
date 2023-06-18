<?php

namespace App\Controllers;

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



    /*public function register(): void
    {
        $form = new Register();
        $view = new View("Auth/register", "front");
        $view->assign("form", $form->getConfig());
        $user = new User();

        //Form validé ? et correct ?
        if ($form->isSubmited() && $form->isValid()) {
            $user->setFirstname($_POST['firstname']);
            $user->setLastname($_POST['lastname']);
            $user->setEmail($_POST['email']);
            $user->setCountry($_POST['country']);
            $user->setPassword($_POST['password']);
            $user->setBirthDate($_POST['birth_date']);
            $user->save();
        }
        $view->assign("formErrors", $form->errors);
    }*/

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}