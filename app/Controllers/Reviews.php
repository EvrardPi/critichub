<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Elementard;
use App\Models\Category;

class Reviews
{
    public function allReviews()
    {
        $cms = new Elementard();
        $allReviews = $cms->getAll();

        $cat = new Category();
        $allCategories = $cat->getAll();

        $this->viewReviews($allReviews, $allCategories);
    }

    public function viewReviews(Mixed $allReviews, Mixed $allCategories): void
    {
        $view = new View("Reviews/allReviews", "front");
        $view->assign("reviews", $allReviews);
        $view->assign("categories", $allCategories);
        $view->assign("pageName", "Reviews");
    }
}