<?php

namespace App\Middlewares;

use App\Controllers\Error;
use App\Models\User;

class CheckIsAdmin
{
    static public function isAdmin()
    {
        $user = new user();
        if (isset($_SESSION['userId'])) {
            $role = $user->getUserInfo(['email' => $_SESSION['email']]);
            if ($role['role'] === 1) {

                return;

            }
        }

        $uri = $_SERVER["REQUEST_URI"];
        $uriExploded = explode("?", $uri);
        $uri = strtolower(trim($uriExploded[0], "/"));

        if (empty($uri)) {
            $uri = "default";
        }

        if (strpos($uri, "back") !== false) {
            $error = new Error();

            $error->error404(); // Afficher une erreur 404
            return;
        }
    }
}
