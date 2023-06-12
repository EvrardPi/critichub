<?php

namespace App\Controllers;

use App\Core\View;

class Main
{
  
    public function media(): void
    {
        $view = new View("Main/media", "front");
        $view->assign("pageName", "MédiaName");
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function aboutUs(): void
    {
        echo "Page à propos";
    }

}