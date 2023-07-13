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

    public function getAjaxData()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        function isStringValide($string)
        {
            if ($string === null || $string === "") {
                $response = array('success' => false, 'message' => 'Aucune caractère n\'a été entré');
                echo json_encode($response);
                exit();
            }
            $string = stripslashes($string); // Supprime les antislashs d'une chaîne
            $string = htmlspecialchars($string); // Convertit les caractères spéciaux en entités HTML
            $string = addslashes($string); // Ajoute des antislashes (\) devant les guillemets simples et doubles, aidant ainsi à prévenir les injections SQL.
            return $string;
        }

        function isIntValide($integer)
        {
            if (!is_numeric($integer)) {
                $response = array('success' => false, 'message' => 'La valeur n\'est pas un entier valide');
                echo json_encode($response);
                exit();
            }

            // Autres tests de sécurité spécifiques aux entiers
            // Par exemple, vous pouvez vérifier si l'entier est dans une plage spécifique

            return $integer;
        }

        $newPage = new Elementard();
        //faire des vérifications sur les données string
        $newPage->setBackground_color(isStringValide($data['backgroundColor']));
        $newPage->setCategories(isStringValide($data['categories']));
        $newPage->setCategories_color(isStringValide($data['categoriesColor']));
        $newPage->setCritique(isStringValide($data['critique']));
        $newPage->setCritique_background_color(isStringValide($data['critiqueBackgroundColor']));
        $newPage->setDate_sortie(isIntValide($data['dateSortie']));
        $newPage->setDirector_name(isStringValide($data['directorName']));
        $newPage->setFont(isStringValide($data['font']));
        $newPage->setFont_color(isStringValide($data['fontColor']));
        $newPage->setFont_textarea_color(isStringValide($data['fontTextAreaColor']));
        $newPage->setImage_url(isStringValide($data['imageUrl']));
        $newPage->setMovie_name(isStringValide($data['movieName']));
        $newPage->setMovie_time(isIntValide($data['movieTime']));
        $newPage->setNote(isIntValide($data['note']));
        $newPage->setSlogan_movie(isStringValide($data['sloganMovie']));
        $newPage->setTemplate(isStringValide($data['template']));
        $newPage->setNb_vue(0);
        $newPage->setId_user(1);//récupérer l'id de l'admin connecté

        // Enregistrez les données dans la base de données
        $newPage->save();

        // renvoyer une réponse au format JSON
        $response = array('success' => true, 'message' => 'Données enregistrées avec succès');
        echo json_encode($response);
    }

}