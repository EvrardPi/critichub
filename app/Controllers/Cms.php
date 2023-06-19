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
        $view = new View("Main/userReview", "front");
        $view->assign("pageName", "Create a new review");
    }

    public function adminReview(): void
    {
        $view = new View("Main/adminReview", "front");
        $view->assign("pageName", "New Admin Review");
        // $publishForm = new Admincms();
        // $view->assign("Admincms", $publishForm->getConfig());
    }
}