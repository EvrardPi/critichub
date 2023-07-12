<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\GestionFront\Create;;
use App\Forms\GestionFront\CreateBackground;
use App\Models\Category;
use App\Models\User;
use App\Core\SQL;
use App\Models\GestionFront;

class GestionFronts
{

    public function view(array $errors = []): void
    {
        $view = new View("BackOffice/gestionFront", "back");
        $view->assign("pageName", "Backoffice-Gestion du front");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $createFormBackground = new CreateBackground();
        $view->assign("createFormBackground", $createFormBackground->getConfig());
        $view->assign("errors", $errors);
    }

    public function createContent(): void
    {
        $form = new Create();
        if (!$form->isValid()) {
            $errors = $_SESSION['error_messages'];
            unset($_SESSION['error_messages']);
            $this->view($errors);
            return;
        }
        $formdata = $form->data;
        unset($formdata['csrf_token']);
        $selectedTab = $formdata['selected_tab'];
        $gestionFront = new GestionFront();
        $methodName = 'set' . ucfirst($selectedTab);
        $gestionFront->$methodName(json_encode($formdata));
        $dataString = json_encode($formdata);
        $gestionFront->changeFront($formdata['selected_tab'], $dataString);
        $this->view();
    }

    public function createBackground(): void
    {

        $form = new CreateBackground();
        if (!$form->isValid()) {
            $errors = $_SESSION['error_messages'];
            unset($_SESSION['error_messages']);
            $this->view($errors);
            return;
        }
        $formdata = $form->data;
        unset($formdata['csrf_token']);
        $selectedTab = $formdata['selected_tab'];
        $gestionFront = new GestionFront();
        $methodName = 'set' . ucfirst($selectedTab);
        $gestionFront->$methodName(json_encode($formdata));
        $dataString = json_encode($formdata);
        $gestionFront->changeFront($formdata['selected_tab'], $dataString);
        $this->view();
    }


    public function getContent()
    {
        $content = new GestionFront();
        $contentData = $content->getAll();

        // Puisque le contenu est dans le premier élément du tableau
        $contentData = $contentData[0];

        foreach ($contentData as $key => $value) {
            if (is_string($value) && is_array($json = json_decode($value, true)) && (json_last_error() == JSON_ERROR_NONE)) {
                $contentData[$key] = $json;
            }
        }

        header('Content-Type: application/json');
          echo json_encode($contentData);
    }
}








