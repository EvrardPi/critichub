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
        unset($dataForm->data['submit']);
        if (!$dataForm->isValid()){
            echo "error";
            die();
        }
        $verifiedDataForm = $dataForm->data;

        // Envoi des données dans la BDD
        $dataToSend = new Adminreview();
        $dataToSend->setTitleMedia($verifiedDataForm['titleMedia']);
        $dataToSend->setCategory($verifiedDataForm['category']);
        $dataToSend->setStars($verifiedDataForm['stars']);
        $dataToSend->setSlogan($verifiedDataForm['slogan']);
        $dataToSend->setDescription($verifiedDataForm['description']);
        $dataToSend->setActors($verifiedDataForm['actors']);
        $dataToSend->setBanner($prefix . $verifiedDataForm['banner']);
        $dataToSend->setLogo($prefix . $verifiedDataForm['logo']);
        $dataToSend->setActor1($prefix . $verifiedDataForm['actor1']);
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