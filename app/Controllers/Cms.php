<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Create;
use App\Forms\Register;
use App\Forms\Login;
use App\Models\Elementard;
use App\Models\User;
use App\Core\SQL;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
use App\Core\Mailer;
use App\Helper;
use App\Middlewares\CheckAuth;


class Cms
{
    public function cmsView(): void
    {
        $view = new View("Cms/front/cms", "cms");
        $view->assign("pageName", "Elementard");
    }

    // public function readAll()
    // {
    //     $cms = new Elementard();
    //     $rows = $cms->getAll();
    //     header('Content-Type: application/json');
    //     echo json_encode($rows);
    // }

    public function getSix()
    {
        $cms = new Elementard();
        $rows = $cms->getLastSix();
        header('Content-Type: application/json');
        echo json_encode($rows);
    }



    public function getAjaxData()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        function isStringValide($string, $champs)
        {
            if ($string === null || $string === "") {
                $response = array('success' => false, 'message' => 'Aucune caractère n\'a été entré dans le champ' . ' ' . $champs);
                echo json_encode($response);
                exit();
            }
            $string = stripslashes($string); // Supprime les antislashs d'une chaîne
            return $string;
        }

        function isIntValide($integer, $champs)
        {
            if (!is_numeric($integer)) {
                $response = array('success' => false, 'message' => 'La valeur n\'est pas un entier valide dans le champ' . ' ' . $champs);
                echo json_encode($response);
                exit();
            }

            // Autres tests de sécurité spécifiques aux entiers
            // Par exemple, vous pouvez vérifier si l'entier est dans une plage spécifique

            return $integer;
        }

        $newPage = new Elementard();
        //faire des vérifications sur les données string

        if (isset($data['id']) && $data['id'] !== null) {
            $newPage->setId($data['id']);
        }
        ;


        $newPage->setBackground_color(isStringValide($data['backgroundColor'], 'background_color'));
        $newPage->setCategories(isStringValide($data['categories'], 'categories'));
        $newPage->setCategories_color(isStringValide($data['categoriesColor'], 'categories_color'));
        $newPage->setCritique(isStringValide($data['critique'], 'critique'));
        $newPage->setCritique_background_color(isStringValide($data['critiqueBackgroundColor'], 'critique_background_color'));
        $newPage->setDate_sortie(isIntValide($data['dateSortie'], 'date_sortie'));
        $newPage->setDirector_name(isStringValide($data['directorName'], 'director_name'));
        $newPage->setFont(isStringValide($data['font'], 'font'));
        $newPage->setFont_color(isStringValide($data['fontColor'], 'font_color'));
        $newPage->setFont_textarea_color(isStringValide($data['fontTextAreaColor'], 'font_textarea_color'));
        $newPage->setImage_url(isStringValide($data['imageUrl'], 'image_url'));
        $newPage->setMovie_name(isStringValide($data['movieName'], 'movie_name'));
        $newPage->setMovie_time(isIntValide($data['movieTime'], 'movie_time'));
        $newPage->setNote(isIntValide($data['note'], 'note'));
        $newPage->setSlogan_movie(isStringValide($data['sloganMovie'], 'slogan_movie'));
        $newPage->setTemplate(isStringValide($data['template'], 'template'));
        $newPage->setNb_vue(0);
        $newPage->setId_user($_SESSION['userId']); //récupérer l'id de l'admin connecté

        // Enregistrez les données dans la base de données
        $newPage->save();

        // renvoyer une réponse au format JSON
        $response = array('success' => true, 'message' => 'Données enregistrées avec succès');
        echo json_encode($response);
    }

    public function viewCrud(): void
    {
        $view = new View("BackOffice/cmsGestion", "back");
        $view->assign("pageName", "Backoffice-Cms");
    }

    public function readAll()
    {
        $cms = new Elementard();
        $rows = $cms->getAll();
        header('Content-Type: application/json');
        echo json_encode($rows);
    }

    public function deleteCms()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {

            $id = intval($_POST['id']);
            $cms = new Elementard();
            $cms->delete($id);
        }
        $this->viewCrud();
    }

    public function getCms()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $cms = new Elementard();
            $where = ['id' => $id];
            $cmsData = $cms->getOneWhere($where);
            var_dump($cmsData);
            die();
            header('Content-Type: application/json');
            echo json_encode($cmsData);
        }
    }

}