<?php

namespace App\Controllers;

use App\Core\View;

class Main
{
    public function home(): void
    {
        $view = new View("Main/home", "front");
        $view->assign("pageName", "CriticHub");
    }

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
        $view = new View("Main/test", "back"); //juste pour test le back office
    }

}