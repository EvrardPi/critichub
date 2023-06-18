<?php

namespace App\Core;

class Validator
{
    public array $data = [];
    public array $errors = [];

    public function __construct()
    {
        $this->method = $_SERVER["REQUEST_METHOD"];

        $this->data = ($this->method == "POST") ? $_POST : $_GET;
    }

    public function isValid(): bool
    {
        $this->config = $this->getConfig();
        //La bonne method ?
        if ($_SERVER["REQUEST_METHOD"] != $this->method) {
            die("Tentative de Hack youri");
        }
        //Le nb de inputs
        if (count($this->config["inputs"]) + 1 != count($this->data)) {
            die("Tentative de Hack valentin");
        }

        foreach ($this->config["inputs"] as $name => $configInput) {
            if (!isset($this->data[$name])) {
                die("Tentative de Hack sperme");
            }
            if (isset($configInput["required"]) && self::isEmpty($this->data[$name])) {
                die("Tentative de Hack pierre");
            }
            if (isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])) {
                $this->errors[] = $configInput["error"];
            }
            if (isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])) {
                $this->errors[] = $configInput["error"];
            }
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }

    public static function isEmpty(string $string): bool
    {
        return empty(trim($string));
    }
    public static function isMinLength(string $string, $length): bool
    {
        return strlen(trim($string)) >= $length;
    }
    public static function isMaxLength(string $string, $length): bool
    {
        return strlen(trim($string)) <= $length;
    }

}