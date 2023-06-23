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

        // if (!$dataForm->isValid()){
        //     echo "error";
        //     die();
        // }
        
        $formReview = new Adminreview();
        
        $formReview->setTitleMedia($verifiedDataForm['titleMedia']);
        $formReview->setCategory($verifiedDataForm['category']);
        $formReview->setStars($verifiedDataForm['stars']);
        $formReview->setSlogan($verifiedDataForm['slogan']);
        $formReview->setDescription($verifiedDataForm['description']);
        $formReview->setCreated_at(date("m/d/y"));
        $formReview->setUpdated_at(date("m/d/y"));
        // var_dump($formReview);
        // $formReview->save();
    }

    public function sendData(): void
    {
        $dataForm = new Admincms();
        unset($dataForm->data['submit']);
        if (!$dataForm->isValid()){
            echo "error";
            die();
        }
        $verifiedDataForm = $dataForm->data;

        //Création variable qui prend que le nom du fichier, afin de l'envoyer en BDD
        $banner_img_path = json_decode($verifiedDataForm['banner'], true);
        $banner_img_path = "assets/images/" . $banner_img_path[0]["file_name"];
        
        //Création variable qui prend que le nom du fichier, afin de l'envoyer en BDD
        $logo_img_path = json_decode($verifiedDataForm['logo'], true);
        $logo_img_path = "assets/images/" . $logo_img_path[0]["file_name"];

        $actor1_img_path = json_decode($verifiedDataForm['actor1'], true);
        $actor1_img_path = "assets/images/" . $actor1_img_path[0]["file_name"];


        $dataToSend = new Adminreview();
        $dataToSend->setTitleMedia($verifiedDataForm['titleMedia']);
        $dataToSend->setCategory($verifiedDataForm['category']);
        $dataToSend->setStars($verifiedDataForm['stars']);
        $dataToSend->setSlogan($verifiedDataForm['slogan']);
        $dataToSend->setDescription($verifiedDataForm['description']);
        $dataToSend->setActors($verifiedDataForm['actors']);
        $dataToSend->setBanner($banner_img_path);
        $dataToSend->setLogo($logo_img_path);
        $dataToSend->setActor1($actor1_img_path);
        if (isset($verifiedDataForm['actor2'])) {
            $actor2_img_path = json_decode($verifiedDataForm['actor2'], true);
            $actor2_img_path = "assets/images/" . $actor2_img_path[0]["file_name"];
            $dataToSend->setActor2($verifiedDataForm['actor2']);
        }
        if (isset($verifiedDataForm['actor3'])) {
            $actor3_img_path = json_decode($verifiedDataForm['actor3'], true);
            $actor3_img_path = "assets/images/" . $actor3_img_path[0]["file_name"];
            $dataToSend->setActor3($verifiedDataForm['actor3']);
        }
        if (isset($verifiedDataForm['actor4'])) {
            $actor4_img_path = json_decode($verifiedDataForm['actor4'], true);
            $actor4_img_path = "assets/images/" . $actor4_img_path[0]["file_name"];
            $dataToSend->setActor4($verifiedDataForm['actor4']);
        }
        if (isset($verifiedDataForm['actor5'])) {
            $actor5_img_path = json_decode($verifiedDataForm['actor5'], true);
            $actor5_img_path = "assets/images/" . $actor5_img_path[0]["file_name"];
            $dataToSend->setActor5($verifiedDataForm['actor5']);
        }
        if (isset($verifiedDataForm['actor6'])) {
            $actor6_img_path = json_decode($verifiedDataForm['actor6'], true);
            $actor6_img_path = "assets/images/" . $actor6_img_path[0]["file_name"];
            $dataToSend->setActor6($verifiedDataForm['actor6']);
        }
        // echo "<pre>";
        // var_dump($dataToSend);
        $dataToSend->save();
    }
}