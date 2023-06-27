<?php

namespace App\Middlewares;

class CheckAuth
{

    static public function isLoggedIn()
    {
        if (isset($_SESSION['isAuth'])) {
            return $_SESSION['isAuth'] ? true : false;
        }
        return false; // or handle the case when 'isAuth' is not set
    }
}
