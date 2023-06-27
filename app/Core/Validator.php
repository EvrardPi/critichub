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
        if (!hash_equals($_SESSION['csrf_token'], $this->data['csrf_token'])) return false;
        
        $this->config = $this->getConfig();
        
        if (count($this->config["inputs"]) != count($this->data) - 1) return false; // -1 pour le jeton CSRF

        foreach ($this->config["inputs"] as $name => $configInput) {

            if (!isset($this->data[$name])) return false;

            if (isset($configInput["required"]) && self::isEmpty($this->data[$name])) return false;

            if (isset($configInput["min"]) && ($configInput["min"] > $this->data[$name])) return false;
            if (isset($configInput["max"]) && ($configInput["max"] < $this->data[$name])) return false;

            if (isset($configInput["minlength"]) && !self::isMinLength($this->data[$name], $configInput["minlength"])) return false;
            if (isset($configInput["maxlength"]) && !self::isMaxLength($this->data[$name], $configInput["maxlength"])) return false;
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
