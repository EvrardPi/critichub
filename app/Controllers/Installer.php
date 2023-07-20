<?php

namespace App\Controllers;

use App\Models\DatabaseInitializer;
use App\Models\User;



class Installer
{


    public function setup(): void
    {
        $script = '
        <script type="module" src="/assets/js/frameworkJs/Frame.js" defer></script>
        ';
        echo $script;
    }


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

    public function initDataBase()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        if ($data['init'] = true) {
            try {
                $initializer = new DatabaseInitializer(); // Créez une instance de la classe DatabaseInitializer
                $initializer->initializeDatabase('/var/www/html/initDB.sql'); //le fichier de configuration de la base de données
                $response = array('success' => true, 'message' => 'La base de données a été créée avec succès.');
            } catch (\PDOException $e) {
                echo "Erreur SQL : " . $e->getMessage() . "<br/>";
                $response = array('success' => false, 'message' => 'Erreur de connexion à la base de données. Veuillez vérifier les informations de connexion.');
            }catch (\Exception $e) {
                echo "Erreur SQL : " . $e->getMessage() . "<br/>";
                $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de la création de la base de données.');
            }
        } else {
            $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de la création de la base de données.');
        }

        echo json_encode($response);
    }


    public function mailerConfig()
    {
        $data = json_decode(file_get_contents('php://input'), true);
    
        $mail = self::isStringValid($data['mailer_mail']);

        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            // L'adresse e-mail est considérée comme valide.
        } else {
            $response = array('success' => false, 'message' => 'L\'adresse e-mail n\'est pas valide.');
            echo json_encode($response);
            exit();
        }

        $password = self::isStringValid($data['mailer_password']);
    
        // Répertoire cible où vous voulez créer le fichier
        $repertoire = '/var/www/html';
    
        // Chemin complet du fichier config.php
        $cheminFichier = $repertoire . '/config.php';
    
        // Contenu à ajouter au fichier config.php
        $contenu = "\n\n"
            . "// Configuration du mailer\n"
            . "define('MAILER_MAIL', '$mail');\n"
            . "define('MAILER_PASSWORD', '$password');\n";
    
        // Ajouter le contenu au fichier config.php
        if (file_put_contents($cheminFichier, $contenu, FILE_APPEND | LOCK_EX) !== false) {
            $response = array('success' => true, 'message' => 'Les informations du mailer ont été ajoutées avec succès dans le fichier config.php.');
        } else {
            $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de l\'écriture des informations du mailer dans le fichier config.php.');
        }
    
        // Renvoyer une réponse au format JSON
        echo json_encode($response);
    }

    public function createAdminAccount()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $email = self::isStringValid($data['E-Mail']);

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // L'adresse e-mail est considérée comme valide.
        } else {
            $response = array('success' => false, 'message' => 'L\'adresse e-mail n\'est pas valide.');
            echo json_encode($response);
            exit();
        }

        $password = self::isStringValid($data['Mot de passe']);
        $firstname = self::isStringValid($data['Prénom']);
        $lastname = self::isStringValid($data['Nom']);
        $birth_date = self::isStringValid($data['Date de naissance']);

        $user = new User();
        $user->setFirstname($firstname);
        $user->setLastname($lastname);
        $user->setEmail($email);
        $user->setPassword($password);
        $user->setBirthDate($birth_date);
        $user->setRole(1);
        $user->setConfirm(1);

        try {
            $user->save();
            $response = array('success' => true, 'message' => 'Le compte administrateur a été créé avec succès.'); 
        } catch (\PDOException $e) {
            $response = array('success' => false, 'message' => 'Erreur de connexion à la base de données. Veuillez vérifier les informations de connexion.');
        } catch (\Exception $e) {
            $response = array('success' => false, 'message' => 'Une erreur s\'est produite lors de la création du compte administrateur.');
        }

        // Renvoyer une réponse au format JSON
        echo json_encode($response);
    }
}