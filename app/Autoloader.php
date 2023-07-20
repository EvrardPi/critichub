<?php

namespace App;

use App\Middlewares\Error;

class Autoloader
{

    public static function registerAutoload()
    {
        spl_autoload_register(function ($class) {
            //$class = App\Core\View
            $class = str_replace("App\\", "", $class);
            //$class = Core\View
            $class = str_replace("\\", "/", $class);
            //$class = Core/View
            $classForm = $class . ".form.php";
            $class = $class . ".php";
            //$class = Core/View.php
            if (file_exists(__DIR__ . "/" . $class)) {
                include __DIR__ . "/" . $class;
            } else if (file_exists($classForm)) {
                include __DIR__ . "/" . $classForm;
            }
        });

        //Afficher le controller et l'action correspondant à l'URI

        $uri = $_SERVER["REQUEST_URI"];
        $uriExploded = explode("?", $uri);
        $uri = strtolower(trim($uriExploded[0], "/"));


        if (empty($uri)) {
            $uri = "default";
        }


        if (!file_exists(__DIR__ ."/routes.yml")) {
            $error = new Error();
            $error->error410();
            exit;
        }

        $routes = yaml_parse_file(__DIR__ . "/routes.yml");

        if (!file_exists(__DIR__ . "/config.php") && !str_contains($uri, "installer")) {
             $uri = "setup"; // Redirection vers l'URL de l'installer
        }



        if (empty($routes[$uri])) {
            $error = new Error();
            $error->error404();
            exit;
            // die("Page 404");
        }

        if (empty($routes[$uri]["controller"]) || empty($routes[$uri]["action"])) {
            $error = new Error();
            $error->error403();
            exit;
        }

        $controller = $routes[$uri]["controller"];
        $action = $routes[$uri]["action"];

        $controllerPath = str_replace("-", "/", $controller); // converti - en /

        if (!file_exists(__DIR__ ."/Controllers/" . $controllerPath . ".php")) {
            $error = new Error();
            $error->error500();
            exit;
            // die("Le fichier Controllers/".$controller.".php n'existe pas");
        }
        include __DIR__ ."/Controllers/" . $controllerPath . ".php";

        $controller = "\\App\\Controllers\\" . str_replace("/", "\\", $controllerPath); // convert / to \ for namespace

        if (!class_exists($controller)) {
            $error = new Error();
            $error->error500();
            exit;
            // die("La classe ".$controller." n'existe pas");
        }
        $objController = new $controller();

        if (!method_exists($objController, $action)) {
            $error = new Error();
            $error->error500();
            exit;
            // die("L'action ".$action." n'existe pas");
        }

        $objController->$action();


    }


}