<?php

namespace App\Core;

use App\Helper;
use App\Models\User;


class Validator
{
    public array $data = [];
    public array $errors = [];
    protected array $config = [];

    public function __construct()
    {
        $this->setData();
        $this->config = $this->getConfig();
    }

    /**
     * Set data for the Login form
     * @return void
     */
    public function setData(): void
    {
        $this->data = (Helper::methodUsed() === Helper::POST) ? $_POST : $_GET;
    }

    /**
     * Get data for the Login form
     * @return array The data for the Login form
     */
    public function getData(): array
    {
        return $this->data;
    }

    public function isValid(): bool
    {
        if (!hash_equals($_SESSION['csrf_token'], $this->data['csrf_token'])) {
        array_push($_SESSION['error_messages'], "Jeton CSRF invalide.");
        return false;
    }

        $this->config = $this->getConfig();

        if (count($this->config["inputs"]) != count($this->data) - 1) { // -1 pour le jeton CSRF
            array_push($_SESSION['error_messages'], "Une erreur est survenue");
            return false;
        }

        foreach ($this->config["inputs"] as $name => $configInput) {
            if (!isset($this->data[$name])) {
                array_push($_SESSION['error_messages'], "Erreur de validation du formulaire");
                continue;
            }

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
                        } elseif ($user->emailExists($value)) {
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
                }
            }
        }

        if (count($_SESSION['error_messages']) > 0) {
            return false;
        }

        // return empty($this->errors);
        return true;
    }

    public static function isEmpty(String $string): bool
    {
        return empty(trim($string));
    }
    public static function isMinLength(String $string, $length): bool
    {
        return strlen(trim($string)) >= $length;
    }
    public static function isMaxLength(String $string, $length): bool
    {
        return strlen(trim($string)) <= $length;
    }
}
