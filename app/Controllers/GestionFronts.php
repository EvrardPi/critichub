<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\GestionFront\Create;
use App\Forms\GestionFront\CreatePicture;
use App\Forms\GestionFront\CreateBackground;
use App\Helper;
use App\Middlewares\CheckIsAdmin;
use App\Models\Category;
use App\Models\User;
use App\Core\SQL;
use App\Models\GestionFront;

class GestionFronts
{

    public function view(array $errors = []): void
    {
        CheckIsAdmin::isAdmin();
        $view = new View("BackOffice/gestionFront", "back");
        $view->assign("pageName", "Backoffice-Gestion du front");
        $createForm = new Create();
        $view->assign("createForm", $createForm->getConfig());
        $createFormBackground = new CreateBackground();
        $view->assign("createFormBackground", $createFormBackground->getConfig());
        $createFormPicture = new CreatePicture();
        $view->assign("createFormPicture", $createFormPicture->getConfig());
        $view->assign("errors", $errors);

        // Récupérer l'image dans le répertoire "assets/images/gestionFront/banner/"
        $imagePath = "assets/images/gestionFront/banner/";
        $imagesBanner = glob($imagePath . "*");
        $imageBanner = reset($imagesBanner); // Utiliser $imagesBanner ici

// Ajouter le chemin de l'image à la vue
        $view->assign("imageBanner", $imageBanner);


// Récupérer l'image dans le répertoire "assets/images/gestionFront/picture-media/"
        $imagePath = "assets/images/gestionFront/picture-media/";
        $imagesMedia = glob($imagePath . "*");
        $imageMedia = reset($imagesMedia); // Utiliser $imagesMedia ici

// Ajouter le chemin de l'image à la vue
        $view->assign("imageMedia", $imageMedia);
    }

    public function createContent(): void
    {
        CheckIsAdmin::isAdmin();
        if (Helper::methodUsed() === Helper::POST) {
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
            Helper::redirectTo('/back-view-gestionfront');
        }
    }

    public function createBackground(): void
    {
        CheckIsAdmin::isAdmin();
        if (Helper::methodUsed() === Helper::POST) {
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
            Helper::redirectTo('/back-view-gestionfront');
        }
    }

    public function createPicture(): void
    {
        CheckIsAdmin::isAdmin();
        if (Helper::methodUsed() === Helper::POST) {
            $form = new CreatePicture();
            if (!$form->isValid()) {
                $errors = $_SESSION['error_messages'];
                unset($_SESSION['error_messages']);
                $this->view($errors);
                return;
            }
            $formdata = $form->data;
            $selectedTab = $formdata['selected_tab'];

            if ($selectedTab == "banner") {
                //Préparation de l'image
                $prefix = "assets/images/gestionFront/banner/";
                $uploadedFile = $_FILES['picture'];
                $nomFichier = $formdata['picture']['name'];
                $tempFilePath = $uploadedFile['tmp_name'];


            } else {
                //Préparation de l'image
                $prefix = "assets/images/gestionFront/picture-media/";
                $uploadedFile = $_FILES['picture'];
                $nomFichier = $formdata['picture']['name'];
                $tempFilePath = $uploadedFile['tmp_name'];
            }


            // Supprimer les images existantes dans le dossier
            $existingFiles = glob($prefix . "*"); // Récupérer tous les fichiers d'images dans le dossier
            foreach ($existingFiles as $file) {
                if (is_file($file)) {
                    unlink($file); // Supprimer chaque fichier
                }
            }
            //Enrengsitrement de l'image
            $destinationPath = $prefix . $nomFichier;
            if (!move_uploaded_file($tempFilePath, $destinationPath)) {
                array_push($_SESSION['error_messages'], "Erreur lors du téléchargement du fichier.");
                $this->view();
                return;
            }
            Helper::redirectTo('/back-view-gestionfront');
        }
    }

    public function getContent()
    {
        CheckIsAdmin::isAdmin();
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








