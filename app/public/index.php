<?php
namespace App;
// On définit une constante contenant le dossier racine
define('ROOT', dirname(__DIR__));

// On importe l'Autoloader
require_once ROOT.'/Autoloader.php';

Autoloader::registerAutoload();


