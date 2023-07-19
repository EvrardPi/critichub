<?php

namespace App\Controllers;

use App\Core\View;
use App\Middlewares\Error;
use App\Middlewares\CheckIsAdmin;

class Memento
{
    //PARTIE VUE
    public function mementoView()
    {
        CheckIsAdmin::isAdmin();
        if (!isset($_GET['id'])) {
            $error = new Error();
            $error->error403();
            exit();
        }

        $view = new View("Memento/memento", "front");
        $view->assign("pageName", "Memento Page");
        $view->assign("id", $_GET['id']);
    
    }
}