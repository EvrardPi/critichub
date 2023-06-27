<?php

namespace App\Controllers;

use App\Core\Validator;
use App\Core\View;
use App\Forms\Admincms;
use App\Models\Adminreview;
use App\Core\SQL;

class Cms
{
    public function userReview(): void
    {
        $view = new View("CMS/userReview", "front");
        $view->assign("pageName", "Create a new review");
    }

    public function adminReview(): void
    {
        $view = new View("CMS/adminEditor", "adminMenu");
        $view->assign("pageName", "New Admin Review");
        $publishForm = new Admincms();
        $view->assign("publishForm", $publishForm->getConfig());
    }

    public function adminPreview(): void
    {
        $view = new View("CMS/adminReview", "front");
        $view->assign("pageName", "Admin rewiew Preview");
        $dataForm = new Admincms();
        $verifiedDataForm = $dataForm->data;
        $view->assign("dataSent", $verifiedDataForm);
    }

    public function sendData(): void
    {
        $prefix = "assets/images/";
        $dataForm = new Admincms();
        echo "<pre>";
        // unset($dataForm->data['submit']);
        var_dump($dataForm->data);
        if (!$dataForm->isValid()) {
            echo "error";
            die();
        }
        $verifiedDataForm = $dataForm->data;


        //Création variable qui prend que le nom du fichier, afin de l'envoyer en BDD
        $bannerImgPath = json_decode($verifiedDataForm['banner'], true);
        //Enregistrement de la bannière dans le dossier assets/images
        $bannerImageToSave = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $bannerImgPath[0]["base64img"]));
        if (!file_exists($prefix . $bannerImgPath[0]["file_name"])) {
            file_put_contents($prefix . $bannerImgPath[0]["file_name"], $bannerImageToSave);
        }

        //Création variable qui prend que le nom du fichier, afin de l'envoyer en BDD
        $logoImgPath = json_decode($verifiedDataForm['logo'], true);
        //Enregistrement du logo dans le dossier assets/images
        $logoImageToSave = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $logoImgPath[0]["base64img"]));
        if (!file_exists($prefix . $logoImgPath[0]["file_name"])) {
            file_put_contents($prefix . $logoImgPath[0]["file_name"], $logoImageToSave);
        }

        // Envoi des données dans la BDD
        $dataToSend = new Adminreview();
        $dataToSend->setTitleMedia($verifiedDataForm['titleMedia']);
        $dataToSend->setCategory($verifiedDataForm['category']);
        $dataToSend->setStars($verifiedDataForm['stars']);
        $dataToSend->setSlogan($verifiedDataForm['slogan']);
        $dataToSend->setDescription($verifiedDataForm['description']);
        $dataToSend->setActors($verifiedDataForm['actors']);
        $dataToSend->setBanner($prefix . $bannerImgPath[0]["file_name"]);
        $dataToSend->setLogo($prefix .  $logoImgPath[0]["file_name"]);

        //Mise en place des valeurs des acteurs en fonction de leur nombre déterminé par le "actors" du formulaire
        for ($i = 0; $i < $verifiedDataForm['actors']; $i++ ) {
            if (isset($verifiedDataForm['actor'.$i+1])) {
                // Décodage de l'array envoyé dans le formulaire
                $actorImgPath = json_decode($verifiedDataForm['actor'.$i+1], true);
                // Enregistrement de l'acteur dans le dossier assets/images
                $actorImageToSave = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $actorImgPath[0]["base64img"]));
                if (!file_exists($prefix . $actorImgPath[0]["file_name"])) {
                    file_put_contents($prefix . $actorImgPath[0]["file_name"], $actorImageToSave);
                }

                $method = "setActor".$i+1;
                if (method_exists($dataToSend, $method)) {
                    $dataToSend->$method($prefix . $actorImgPath[0]["file_name"]);
                } else {
                    echo "La méthode n'existe pas";
                }

            }
        }
        // echo "<pre>";
        // var_dump($dataToSend);

        $dataToSend->save();
        echo "Opération réussie !";
    }
}
