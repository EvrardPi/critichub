<?php
namespace App;
// On définit une constante contenant le dossier racine
define('ROOT', dirname(__DIR__));

session_start();
$_SESSION['error_messages'] = [];

// On importe l'Autoloader
require_once ROOT.'/Autoloader.php';

Autoloader::registerAutoload();

$_SESSION['csrf_token_next'] = Helper::generateCSRFToken();

if (isset($_SESSION['csrf_tokens'])) {
    array_push($_SESSION['csrf_tokens'], $_SESSION['csrf_token_next']);
} else {
    $_SESSION['csrf_tokens'] = [$_SESSION['csrf_token_next']];
}