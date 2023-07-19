<?php

namespace App\Controllers;

use App\Core\View;

class Memento
{
    //PARTIE VUE
    public function mementoView()
    {
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