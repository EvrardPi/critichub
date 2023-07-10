<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\GestionFront\CreateH1;
use App\Forms\GestionFront\CreateH2;
use App\Forms\GestionFront\CreateH3;
use App\Forms\GestionFront\CreateH4;
use App\Models\Category;
use App\Models\User;
use App\Core\SQL;

class GestionFront
{

    public function view(array $errors = []): void
    {
        $view = new View("BackOffice/gestionFront", "back");
        $view->assign("pageName", "Backoffice-Gestion du front");
        $createFormH1 = new CreateH1();
        $view->assign("createFormH1", $createFormH1->getConfig());
        $createFormH2 = new CreateH2();
        $view->assign("createFormH2", $createFormH2->getConfig());
        $createFormH3 = new CreateH3();
        $view->assign("createFormH3", $createFormH3->getConfig());
        $createFormH3 = new CreateH3();
        $view->assign("createFormH4", $createFormH44->getConfig());
        $view->assign("errors", $errors);
    }




}
