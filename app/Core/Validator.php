<?php

namespace App\Core;

class Validator
{
    protected array $data = [];
    public array $errors = [];
    protected string $method = "POST";
    protected array $config = [];

    public function setData() {
        $this->data = ($this->method == "POST") ? $_POST : $_GET;
    }

    public function getData() {
        return $this->data;
    }


    public function isSubmited(): bool
    {
        return (isset($this->data["submit"])) ? true : false;
    }
    public function isValid(): bool
    {
        //La bonne method ?
        if($_SERVER["REQUEST_METHOD"] != $this->method){
            die("Tentative de Hack");
        }
        //Le nb de inputs
        if(count($this->config["inputs"])+1 != count($this->data)){
            die("Tentative de Hack");
        }

        foreach ($this->config["inputs"] as $name=>$configInput){
            if(!isset($this->data[$name])){
                die("Tentative de Hack");
            }
            if(isset($configInput["required"]) && self::isEmpty($this->data[$name])){
                die("Tentative de Hack");
            }
            if(isset($configInput["min"]) && !self::isMinLength($this->data[$name], $configInput["min"])){
                $this->errors[]=$configInput["error"];
            }
            if(isset($configInput["max"]) && !self::isMaxLength($this->data[$name], $configInput["max"])){
                $this->errors[]=$configInput["error"];
            }
        }
        if(empty($this->errors)){
            return true;
        }
        return false;
    }

    public static function isEmpty(String $string): bool
    {
        return empty(trim($string));
    }
    public static function isMinLength(String $string, $length): bool
    {
        return strlen(trim($string))>=$length;
    }
    public static function isMaxLength(String $string, $length): bool
    {
        return strlen(trim($string))<=$length;
    }

}