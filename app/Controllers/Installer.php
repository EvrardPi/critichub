<?php

namespace App\Controllers;

use App\Models\DatabaseInitializer;



class Installer
{


    public static function isStringValid($string)
    {
        if ($string === null || $string === "") {
            $response = array('success' => false, 'message' => 'Aucun caractère n\'a été entré');
            echo json_encode($response);
            exit();
        }
        $string = stripslashes($string);
        $string = htmlspecialchars($string);
        $string = addslashes($string);
        return $string;
    }

    public function getAjaxData()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $dbHost = self::isStringValid($data['DB_HOST']);
        $dbPort = self::isStringValid($data['DB_PORT']);
        $dbName = self::isStringValid($data['DB_NAME']);
        $dbUser = self::isStringValid($data['DB_USER']);
        $dbPassword = self::isStringValid($data['DB_PASSWORD']);


        // Répertoire cible où vous voulez créer le fichier
        $repertoire = '/var/www/html';

        // Contenu du fichier config.php
        $contenu = "<?php\n\n"
            . "define('DB_HOST', '$dbHost');\n"
            . "define('DB_PORT', '$dbPort');\n"
            . "define('DB_NAME', '$dbName');\n"
            . "define('DB_USER', '$dbUser');\n"
            . "define('DB_PASSWORD', '$dbPassword');\n";

        // Chemin complet du fichier config.php
        $cheminFichier = $repertoire . '/config.php';

        if (file_put_contents($cheminFichier, $contenu) !== false) {
            $response = array('success' => true, 'message' => 'Le fichier config.php a été créé avec succès dans le répertoire app.');
        } else {
            $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de la création du fichier config.php.');
        }




        // Renvoyer une réponse au format JSON
        echo json_encode($response);
    }

    public function getAjaxUser()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $dbHost = self::isStringValid($data['DB_HOST']);
        $dbPort = self::isStringValid($data['DB_PORT']);
        $dbName = self::isStringValid($data['DB_NAME']);
        $dbUser = self::isStringValid($data['DB_USER']);
        $dbPassword = self::isStringValid($data['DB_PASSWORD']);

        //utliser la meme connexion que pour config.php
    }

    public function initDataBase()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if ($data['init'] = true) {
            $initializer = new DatabaseInitializer(); // Créez une instance de la classe DatabaseInitializer
            $initializer->initializeDatabase('/var/www/html/initDB.sql'); //le fichier de configuration de la base de données
            $response = array('success' => true, 'message' => 'La base de données a été créée avec succès.');
        } else {
            $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de la création de la base de données.');
        }

        echo json_encode($response);
    }

    public function createAdminAccount()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $user = new User();
        $user->setFirstname($data['firstname']);
        $user->setLastname($data['lastname']);
        $user->setEmail($data['email']);
        $user->setPassword($data['password']);
        $user->setBirthDate($data['birth_date']);
        $user->setRole(3);
        $user->setConfirmKey(bin2hex(random_bytes(32)));
        $user->setConfirm(0);
        $user->save();
    }
}