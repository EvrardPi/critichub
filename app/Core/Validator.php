<?php

namespace App\Core;
use App\Helper;

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
        // echo $_SESSION['csrf_token'];
        // echo "<br>";
        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        
        // Vérification du jeton CSRF
        if (!hash_equals($_SESSION['csrf_token'], $this->data['csrf_token'])) {
            return false;
        }
        
        $this->config = $this->getConfig();

        // Le nb de inputs
        // echo "CONFIG<br>";
        // echo "<pre>";
        // print_r($this->config["inputs"]);
        // echo "</pre>";

        // echo "DATA<br>";
        // echo "<pre>";
        // print_r($this->data);
        // echo "</pre>";
        
        
        if (count($this->config["inputs"]) != count($this->data) - 1) { // -1 pour le jeton CSRF
            die("Tentative de Hack valentin");
        }

        foreach ($this->config["inputs"] as $name => $configInput) {
            if (!isset($this->data[$name])) {
                // die("Données manquantes");
                // erreurs
            }

            if (isset($configInput["required"]) && self::isEmpty($this->data[$name])) {
                // erreurs
                die("Champs requis vide");
            }

            if (isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])) {
                $this->errors[] = $configInput["error"];
            }

            if (isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])) {
                $this->errors[] = $configInput["error"];
            }
        }

        return empty($this->errors);
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
