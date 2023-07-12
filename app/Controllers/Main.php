<?php

namespace App\Controllers;

use App\Core\View;
use App\Core\SQL;
use App\Models\User;
use App\Models\Medias;
use App\Models\UserReview;

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
        $mediaList = new Medias();
        $view->assign("medias", $mediaList);
        $view->assign("pageName", "Média");
    }

    public function contact(): void
    {
        echo "Page de contact";
    }

    public function createReview(): void
    {
        $view = new View("Main/createReview", "front");
        $view->assign("pageName", "Créer un commentaire");
    }

}