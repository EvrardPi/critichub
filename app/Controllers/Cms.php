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
{    public function cmsView(): void
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



        // Afficher ou enregistrer les valeurs des paramètres pour identifier lequel pose problème
        echo "Valeur de backgroundColor : " . isStringValide($data['backgroundColor']) . "\n";
        echo "Valeur de critique : " . isStringValide($data['critique']) . "\n";
        echo "Valeur de critiqueBackgroundColor : " . isStringValide($data['critiqueBackgroundColor']) . "\n";
        echo "Valeur de critiqueTitle : " . isStringValide($data['critiqueTitle']) . "\n";
        echo "Valeur de font : " . isStringValide($data['font']) . "\n";
        echo "Valeur de fontColor : " . isStringValide($data['fontColor']) . "\n";
        echo "Valeur de movieName : " . isStringValide($data['movieName']) . "\n";
        echo "Valeur de sloganMovie : " . isStringValide($data['sloganMovie']) . "\n";
        echo "Valeur de template : " . isStringValide($data['template']) . "\n";
        echo "Valeur de userId : " . isStringValide($_SESSION['userId']) . "\n";

        // .



        $newPage = new Elementard();

        //faire des vérifications sur les données string


        $newPage->setBackgroundColor(isStringValide($data['backgroundColor']));
        $newPage->setCritique(isStringValide($data['critique']));
        $newPage->setCritiqueBackgroundColor(isStringValide($data['critiqueBackgroundColor']));
        $newPage->setCritiqueTitle(isStringValide($data['critiqueTitle']));
        $newPage->setFont(isStringValide($data['font']));
        $newPage->setFontColor(isStringValide($data['fontColor']));
        $newPage->setMovieName(isStringValide($data['movieName']));
        $newPage->setSloganMovie(isStringValide($data['sloganMovie']));
        $newPage->setTemplate(isStringValide($data['template']));
        $newPage->setUserId(isStringValide($_SESSION['userId']));


        // Vérifiez les images movieAffiche et movieTopimg



        if ($data['movieAffiche'] === null || $data['movieTopimg'] === null) {
            $response = array('success' => false, 'message' => 'Aucune image n\'a été entré');
            echo json_encode($response);
            exit();
        } else {

            // Définissez la taille maximale de l'image en octets (par exemple, 20 Mo)
            $maxImageSize = 20 * 1024 * 1024;

            // Traitez l'image movieAffiche
            $movieAffiche = $data['movieAffiche'];
            list($type, $movieAffiche) = explode(';', $movieAffiche);
            list(, $movieAffiche) = explode(',', $movieAffiche);
            list(, $ext) = explode('/', $type);
            $ext = $ext === 'jpeg' ? 'jpg' : $ext;
            if (!in_array($ext, ['png', 'jpg'])) {
                $response = array('success' => false, 'message' => 'Invalid image format for movieAffiche');
                echo json_encode($response);
                exit();
            }
            $movieAffiche = base64_decode($movieAffiche);



            // Traitez l'image movieTopimg
            $movieTopimg = $data['movieTopimg'];
            list($type, $movieTopimg) = explode(';', $movieTopimg);
            list(, $movieTopimg) = explode(',', $movieTopimg);
            list(, $ext) = explode('/', $type);
            $ext = $ext === 'jpeg' ? 'jpg' : $ext;
            if (!in_array($ext, ['png', 'jpg'])) {
                $response = array('success' => false, 'message' => 'Invalid image format for movieTopimg');
                echo json_encode($response);
                exit();
            }
            $movieTopimg = base64_decode($movieTopimg);

            // Vérifiez la taille totale des images
            if (strlen($movieAffiche) + strlen($movieTopimg) > $maxImageSize) {
                $response = array('success' => false, 'message' => 'The total size of the images is too large');
                echo json_encode($response);
                exit();
            }

            $imagePath1 = 'assets/images/cmsUser/' . uniqid() . '.' . $ext;
            if (!file_put_contents($imagePath1, $movieAffiche)) {
                $response = array('success' => false, 'message' => 'Failed to save movieAffiche');
                echo json_encode($response);
                exit();
            }

            $imagePath2 = 'assets/images/cmsUser/' . uniqid() . '.' . $ext;
            if (!file_put_contents($imagePath2, $movieTopimg)) {
                $response = array('success' => false, 'message' => 'Failed to save movieTopimg');
                echo json_encode($response);
                exit();
            }
        }





        echo "Valeur de movieAffiche : " . $imagePath1 . "\n";
        echo "Valeur de movieTopimg : " . $imagePath2 . "\n";

        // Rajouter les chemins des images dans la classe Elementard
        $newPage->setMovieAffiche($imagePath1);
        $newPage->setMovieTopImg($imagePath2);


        // Enregistrez les données dans la base de données
        $newPage->save();

        // renvoyer une réponse au format JSON
        $response = array('success' => true, 'message' => 'Données enregistrées avec succès');
        echo json_encode($response);
    }

}