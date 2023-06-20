<?php

namespace App\Middlewares;

class CheckAuth
{

    static public function isLoggedIn() 
    {
        return $_SESSION['isAuth'] ? true : false;
    }
    
}
