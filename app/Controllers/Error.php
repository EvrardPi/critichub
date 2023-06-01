<?php

namespace App\Controllers;

use App\Core\View;

class Error
{
    public function error404(): void
    {
        $view = new View("Error/404", "error");
        $view->assign("errorType", "404");
    }

    public function error500(): void
    {
        $view = new View("Error/500", "error");
        $view->assign("errorType", "500");    }

    public function error401(): void
    {
        $view = new View("Error/401", "error");
        $view->assign("errorType", "401");
    }

    public function error403(): void
    {
        $view = new View("Error/403", "error");
        $view->assign("errorType", "403");
    }

    public function error410(): void
    {
        $view = new View("Error/410", "error");
        $view->assign("errorType", "410");
    }
}