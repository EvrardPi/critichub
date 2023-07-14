<?php

namespace App\Core;

use App\Helper;
use App\Models\User;
use App\Models\Category;

class Validator
{
    public array $data = [];
    protected array $config = [];

    public function __construct()
    {
        $this->setData();
        $this->config = $this->getConfig();
    }

    /**
     * Set data for the current form
     * @return void
     */
    public function setData(): void
    {
        if (Helper::methodUsed() === Helper::POST) {
            $this->data = array_merge($_POST, $_FILES);
        } else {
            $this->data = $_GET;
        }
    }

    /**
     * Get data for the current form
     * @return array The data for the Login form
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function isValid(): bool
    {
        if (isset($this->data['csrf_token'])) {
            if (!in_array($this->data['csrf_token'], $_SESSION['csrf_tokens'])) {
                array_push($_SESSION['error_messages'], "Une erreur est survenue");
                return false;
            } else {
                unset($_SESSION['csrf_tokens'][array_search($this->data['csrf_token'], $_SESSION['csrf_tokens'])]);
            }
        } 

        if (count($this->config["inputs"]) != count($this->data) - 1) { // -1 pour le jeton CSRF
            array_push($_SESSION['error_messages'], "Une erreur est survenue");
            return false;
        }

        foreach ($this->config["inputs"] as $name => $configInput) {
            if (!isset($this->data[$name])) {
                array_push($_SESSION['error_messages'], "Erreur de validation du formulaire ici");
                continue;
            }

            // On récupère la valeur du champ pour factoriser le code
            $value = $this->data[$name];

            if (isset($configInput["required"]) && self::isEmpty($value)) {
                array_push($_SESSION['error_messages'], "Le champ '{$name}' est requis.");
                continue;
            }

            if (isset($configInput["min"]) && $configInput["min"] > $value) {
                array_push($_SESSION['error_messages'], "La valeur du champ '{$name}' doit être supérieure à {$configInput['min']}");
                continue;
            }

            if (isset($configInput["max"]) && $configInput["max"] < $value) {
                array_push($_SESSION['error_messages'], "La valeur du champ '{$name}' doit être inférieure à {$configInput['max']}");
                continue;
            }

            if (isset($configInput["minlength"]) && !self::isMinLength($value, $configInput["minlength"])) {
                array_push($_SESSION['error_messages'], "Le champ '{$name}' doit avoir au moins {$configInput['minlength']} caractères");
                continue;
            }

            if (isset($configInput["maxlength"]) && !self::isMaxLength($value, $configInput["maxlength"])) {
                array_push($_SESSION['error_messages'], "Le champ '{$name}' doit avoir au plus {$configInput['maxlength']} caractères");
                continue;
            }

            if (isset($configInput["type"])) {
                switch ($configInput["type"]) {
                    case "email":
                        $user = new User();
                        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                            array_push($_SESSION['error_messages'], "Adresse mail non valide");
                        } elseif (isset($this->config["inputs"]["email"]) && $user->emailExists($value) && $this->config["inputs"]["email"]["id"] === "register-form-email") {
                            array_push($_SESSION['error_messages'], "Le mail existe déjà, veuillez rentrer un autre mail");
                        }
                        break;

                    case "date":
                        if (!strtotime($value)) {
                            array_push($_SESSION['error_messages'], "Date non valide");
                        } elseif (new \DateTime($value) > new \DateTime()) {
                            array_push($_SESSION['error_messages'], "La date de naissance ne peut pas être dans le futur");
                        }
                        break;

                    case "password":
                        $passwordRegex = '/^(?=.*\d)(?=.*[&\-é_èçà^ù:!ù#~@°%§+.])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z&\-é_èçà^ù*:!ù#~@°%§+.]{4,50}$/';
                        if ($name === "password" && !preg_match($passwordRegex, $value)) {
                            array_push($_SESSION['error_messages'], "Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi: &-é_èçà^ù:!ù#~@°%§+.");
                        }
                        if (isset($this->data["passwordConfirm"]) && $this->data["passwordConfirm"] != $value) {
                            array_push($_SESSION['error_messages'], "Les mots de passe sont différents");
                        }
                        break;

                    case "file":

                        //Vérification de l'extension du fichier
                        $allowedExtensions = ["png", "jpg", "jpeg"];
                            $fileExtension = strtolower(pathinfo($value["name"], PATHINFO_EXTENSION));
                        if (!in_array($fileExtension, $allowedExtensions)) {
                            $allowedExtensionsString = implode(", ", $allowedExtensions);
                            array_push($_SESSION['error_messages'], "Le fichier doit être de type $allowedExtensionsString");
                        }
                        //Vérification de la taille du fichier
                        $maxFileSize = 5 * 1024 * 1024;
                        // Taille maximale du fichier en octets (ici     5 Mo)
                        if ($value["size"] > $maxFileSize) {
                            array_push($_SESSION['error_messages'], "Le fichier ne doit pas dépasser 5 Mo");
                        }
                        // Vérification supplémentaire de l'image
                        if (isset($value["tmp_name"]) && !empty($value["tmp_name"])) {
                            $imageData = file_get_contents($value["tmp_name"]);
                            $imageSize = getimagesizefromstring($imageData);
                            if ($imageSize === false || !in_array($imageSize['mime'], ['image/png', 'image/jpeg'])) {
                                array_push($_SESSION['error_messages'], "Le fichier n'est pas une image valide (PNG ou JPEG).");
                            }
                        } else {
                            array_push($_SESSION['error_messages'], "Une erreur est survenue lors du téléchargement du fichier.");
                        }

                        //Permet de vérifier si la photo de la catégorie existe deja

                        break;
                }
            }

        }

        if (count($_SESSION['error_messages']) > 0) {
            return false;
        }

        return true;
    }

    public function checkCategoryCreate(): bool
    {
        $value = $this->data;
        $category = new Category();
        $pictureExists = $category->namePictureExists(['picture' => $value['picture']['name']]);
        if ($pictureExists) {
            array_push($_SESSION['error_messages'], "L'image que vous utilisez est déjà utilisée pour une autre catégorie.");
            return false;
        }

        $categoryExists = $category->nameExists(['name' => $value['name']]);
        if ($categoryExists) {
            array_push($_SESSION['error_messages'], "Le nom de la catégorie existe déjà.");
            return false;
        }

        return true;
    }

    public function checkCategoryUpdate(): bool
    {
        $value = $this->data;
        $categoryId = $value['id']; // Supposons que l'ID de la catégorie soit présent dans le formulaire
        $category = new Category();

        // Vérifier si le nouveau nom de catégorie est différent de l'ancien nom
        if ($value['name'] !== $category->getCategoryNameById($categoryId)) {
            $categoryExists = $category->nameExists(['name' => $value['name']]);
            if ($categoryExists) {
                array_push($_SESSION['error_messages'], "Le nom de la catégorie existe déjà.");
                return false;
            }
        }

        // Vérifier si l'image a été modifiée
        if ($value['picture']['name'] !== $category->getCategoryImageNameById($categoryId)) {
            $pictureExists = $category->namePictureExists(['picture' => $value['picture']['name']]);
            if ($pictureExists) {
                array_push($_SESSION['error_messages'], "L'image que vous utilisez est déjà utilisée pour une autre catégorie.");
                return false;
            }
        }

        return true;
    }




    public static function isEmpty($value): bool
    {
        if (is_string($value)) {
            return empty(trim($value));
        }
        if (is_array($value)) {
            return empty(array_filter($value)); // Vérifie si tous les éléments du tableau sont vides
        }
        return true; // Autre type de données, considéré comme vide
    }

    public static function isMinLength(String $string, $length): bool
    {
        return strlen(trim($string)) >= $length;
    }
    public static function isMaxLength(String $string, $length): bool
    {
        return strlen(trim($string)) <= $length;
    }


    public function isStringValide($string)
        {
            if ($string === null || $string === "") {
                $response = array('success' => false, 'message' => 'Aucune caractère n\'a été entré');
                echo json_encode($response);
                exit();
            }
            $string = stripslashes($string); // Supprime les antislashs d'une chaîne
            $string = htmlspecialchars($string); // Convertit les caractères spéciaux en entités HTML
            $string = addslashes($string); // Ajoute des antislashes (\) devant les guillemets simples et doubles, aidant ainsi à prévenir les injections SQL.
            return $string;
        }

    public static function loginVerify(Mixed $user, Mixed $password): bool
    {
        if (!$user) {
            // Pas de user trouvé
            array_push($_SESSION['error_messages'], "Connexion échouée.");
            return false;
        }

        if (!password_verify($password, $user->getPassword())) {
            // Mauvais mot de passe
            array_push($_SESSION['error_messages'], "Connexion échouée.");
            return false;
        }

        if ($user->getConfirm() == 0) {
            // Compte non confirmé
            array_push($_SESSION['error_messages'], "Compte non confirmé.");
            return false;
        }
        return true;
    }
}
