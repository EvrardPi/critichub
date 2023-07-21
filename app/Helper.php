<?php

namespace App;
require_once '/var/www/html/config.php';

class Helper
{
    const POST = "POST";
    const GET = "GET";
    const DELETE = "DELETE";


    /**
     * Retourne la méthode utilisée pour la requête HTTP (POST, GET, DELETE)
     *
     * @return void
     */
    static public function methodUsed()
    {
        return $_SERVER['REQUEST_METHOD'];
    }


    /**
     * Redirige vers une page spécifiée
     *
     * @param string $url
     * @return void
     */
    static public function redirectTo(String $url = "/") // renvoie vers la page d'accueil si aucune page n'est spécifiée
    {
        header('Location: ' . $url);
        die();
    }


    /**
     * Affiche une alerte success
     *
     * @param string $message
     * @return void
     */
    static public function successAlert(String $message)
    {
        echo "
        <div id=\"success-message\"class=\"success-message\">
            <div class=\"success-left-icon\"></div>
            <img src=\"assets/images/check-mark-valid.png\">
            <div class=\"success-navbar\">
                <div class=\"success-title\">Compte Créé</div>
                <div class=\"success-subtitle\">" . $message . "</div>
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


    /**
     * Vérifie le captcha de Google reCAPTCHA v2
     *
     * @param string $token
     * @return boolean
     */
    static public function checkCaptcha(String $token): bool
    {
        $ch = curl_init(); // Permet de communiquer avec l'API
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Pour que curl_exec() retourne une chaîne de caractères au lieu de l'afficher 
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
            // Construction de la requête POST à envoyer à l'API  
            'secret' => CAPTCHA_SECRET,
            'response' => $token, // La réponse du reCAPTCHA
            'remoteip' => $_SERVER['REMOTE_ADDR'] // Adresse IP de l'utilisateur qui remplit le formulaire (pour que Google puisse vérifier que ce n'est pas un robot)
        ]));

        $recaptcha = curl_exec($ch); // Récupération de la réponse du serveur (au format JSON)
        curl_close($ch);
        $recaptcha = json_decode($recaptcha); // Décodage du JSON en objet PHP utilisable (ici un objet contenant un booléen)

        // On vérifie que la propriété "success" existe et qu'elle vaut true (et non pas null ou false)
        return isset($recaptcha->success) && $recaptcha->success;
    }
}
