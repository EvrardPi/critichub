<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\GestionFront\Create;

use App\Models\Category;
use App\Models\User;
use App\Core\SQL;

class GestionFront
{

    public function view(array $errors = []): void
    {
        $view = new View("BackOffice/gestionFront", "back");
        $view->assign("pageName", "Backoffice-Gestion du front");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $view->assign("errors", $errors);
    }

    public function formGestion(): void{
        $form = new Create();
    }




}
