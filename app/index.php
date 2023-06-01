<?php

namespace App;

use App\Controllers\Error;

//require "Core/View.php";

spl_autoload_register(function ($class) {

    //$class = App\Core\View
    $class = str_replace("App\\","", $class);
    //$class = Core\View
    $class = str_replace("\\","/", $class);
    //$class = Core/View
    $classForm = $class.".form.php";
    $class = $class.".php";
    //$class = Core/View.php
    if(file_exists($class)){
        include $class;
    }else if(file_exists($classForm)){
        include $classForm;
    }
});




//Afficher le controller et l'action correspondant à l'URI

$uri = $_SERVER["REQUEST_URI"];
$uriExploded = explode("?", $uri);
$uri = strtolower(trim( $uriExploded[0], "/"));

if(empty($uri)){
    $uri = "default";
}

if(!file_exists("routes.yml")){
    $error = new Error();
    $error->error410();
    exit;
    die("Le fichier routes.yml n'existe pas");
}

$routes = yaml_parse_file("routes.yml");

if(empty($routes[$uri])){
    $error = new Error();
    $error->error404();
    exit;
    // die("Page 404");
}

if(empty($routes[$uri]["controller"]) || empty($routes[$uri]["action"]) ){
    $error = new Error();
    $error->error403();
    exit;
    die("Cette route ne possède pas de controller ou d'action dans le fichier de routing");
}

$controller = $routes[$uri]["controller"];
$action = $routes[$uri]["action"];

if(!file_exists("Controllers/".$controller.".php")){
    $error = new Controllers\Error();
    $error->error500();
    exit;
    // die("Le fichier Controllers/".$controller.".php n'existe pas");
}
include "Controllers/".$controller.".php";

$controller = "\\App\\Controllers\\".$controller;

if(!class_exists($controller)){
    $error = new Error();
    $error->error500();
    exit;
    // die("La classe ".$controller." n'existe pas");
}
$objController = new $controller();

if(!method_exists($objController, $action)){
    $error = new Error();
    $error->error500();
    exit;
    // die("L'action ".$action." n'existe pas");
}

$objController->$action();
