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
        $view = new View("CMS/adminEditor", "front");
        $view->assign("pageName", "New Admin Review");
        $publishForm = new Admincms();
        $view->assign("publishForm", $publishForm->getConfig());
    }

    public function adminPreview(): void
    {
        $view = new View("CMS/adminReview", "front");
        $view->assign("pageName", "Admin rewiew Preview");
    }
}