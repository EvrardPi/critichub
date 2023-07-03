<?php

namespace App;

class Helper
{
    const POST = "POST";
    const GET = "GET";
    const DELETE = "DELETE";

    static public function methodUsed() 
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    // Par defaut renvoie vers / s'il n'y a pas de parametre url
    static public function redirectTo(String $url = "/") {
        header('Location: ' . $url);
        die();
    }

    // Affiche une alerte success
    static public function successAlert(String $message) {
        echo "
        <div id=\"success-message\"class=\"success-message\">
            <div class=\"success-left-icon\"></div>
            <img src=\"assets/images/check-mark-valid.png\">
            <div class=\"success-navbar\">
                <div class=\"success-title\">Compte Créé</div>
                <div class=\"success-subtitle\">".$message."</div>
            </div>
            <button class=\"success-close\" onclick=\"document.getElementById('success-message').remove()\">FERMER</button>
        </div>
        ";
    }

    /**
     * Génère un jeton CSRF et le stocke en session
     *
     * @return string
     */
    static public function generateCSRFToken(): string
    {
        $token = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $token;
        return $token;
    }
    
}
