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

    public function createReview(): void
    {
        $view = new View("Main/createReview", "front");
        $view->assign("pageName", "Créer un commentaire");
    }


    public function contact(): void
    {
        $view = new View("Main/contact", "front");
        $view->assign("pageName", "Nous contacter");
    }

    public function legals(): void
    {
        $view = new View("Main/legals", "front");
        $view->assign("pageName", "Mentions légales");
    }

    public function confidentiality(): void
    {
        $view = new View("Main/confidentiality", "front");
        $view->assign("pageName", "Politique de confidentialité");
    }

    public function sitemap(): void
    {
        echo "Page de sitemap";
    }

}