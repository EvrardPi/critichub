<?php

namespace App\Controllers;

use App\Core\View;
use App\Middlewares\Error;
use App\Models\User;

class Memento
{
    //PARTIE VUE
    public function mementoView()
    {
        $user = new User();
        if (!isset($_GET['id']) || !isset($_SESSION['userId'])) {
            $error = new Error();
            $error->error403();
            exit();
        }

        $userRole = $user->getUserInfo(['email' => $_SESSION['email']]);
        if($userRole['role'] != 1) {
            $error = new Error();
            $error->error403();
            exit();
        }

        $view = new View("Memento/memento", "front");
        $view->assign("pageName", "Memento Page");
        $view->assign("id", $_GET['id']);
    
    }
}