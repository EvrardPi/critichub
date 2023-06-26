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
        // echo "<pre>";
        unset($dataForm->data['submit']);
        // var_dump($dataForm->data);
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

        //Création variable qui prend que le nom du fichier, afin de l'envoyer en BDD
        $actor1ImgPath = json_decode($verifiedDataForm['actor1'], true);
        //Enregistrement de l'acteur 1 dans le dossier assets/images
        $actor1ImageToSave = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $actor1ImgPath[0]["base64img"]));
        if (!file_exists($prefix . $actor1ImgPath[0]["file_name"])) {
            file_put_contents($prefix . $actor1ImgPath[0]["file_name"], $actor1ImageToSave);
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
        $dataToSend->setActor1($prefix . $actor1ImgPath[0]["file_name"]);
        if (isset($verifiedDataForm['actor2'])) {
            $dataToSend->setActor2($prefix . $verifiedDataForm['actor2']);
        }
        if (isset($verifiedDataForm['actor3'])) {
            $dataToSend->setActor3($prefix . $verifiedDataForm['actor3']);
        }
        if (isset($verifiedDataForm['actor4'])) {
            $dataToSend->setActor4($prefix . $verifiedDataForm['actor4']);
        }
        if (isset($verifiedDataForm['actor5'])) {
            $dataToSend->setActor5($prefix . $verifiedDataForm['actor5']);
        }
        if (isset($verifiedDataForm['actor6'])) {
            $dataToSend->setActor6($prefix . $verifiedDataForm['actor6']);
        }
        // echo "<pre>";
        // var_dump($dataToSend);

        $dataToSend->save();
        echo "Opération réussie !";
    }
}
