<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\User;
use App\Core\SQL;

class Auth
{
    public function view(): void
    {
        $view = new View("Auth/register", "front");
        $form = new Register();
        $view->assign("registerForm", $form->getConfig()); // Correction : Utilisez $form au lieu de $registerForm
        $view->assign("pageName", "Inscription");
    }

    public function register(): void
    {
        $form = new Register();
        if (!$form->isValid()){
            echo "error";
            die();
        }
        $formdata = $form->data;
        var_dump($formdata);
        $user = new User();
        $user->setFirstname($formdata['firstname']);
        $user->setLastname($formdata['lastname']);
        $user->setEmail($formdata['email']);
        $user->setPassword($formdata['password']);
        $user->setBirthDate($formdata['birth_date']);
        $user->setRole(3);
        $user->save();
        $this->view();

    }

    public function logout(): void
    {
        echo "Page de déconnexion";
    }

}