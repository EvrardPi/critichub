<?php
namespace App;
// On définit une constante contenant le dossier racine
define('ROOT', dirname(__DIR__));

session_start();
$_SESSION['error_messages'] = [];

// On importe l'Autoloader
require_once ROOT.'/Autoloader.php';

Autoloader::registerAutoload();


