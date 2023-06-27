<?php
namespace App\Forms;
use App\Core\Validator;

class Register extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"register",
                "id"=>"register-form",
                "class"=>"register",
                "enctype"=>"",
                "submit"=>"Créer",
            ],
            "inputs"=>[
                "firstname"=>[
                    "id"=>"register-form-firstname",
                    "class"=>"form-input",
                    "placeholder"=>"Prénom",
                    "type"=>"text",
                    "error"=>"Le prénom doit faire entre 2 et 60 caractères",
                    "min"=>2,
                    "max"=>60,
                    "required"=>true,
                    "value"=>""
                ],
                "lastname"=>[
                    "id"=>"register-form-lastname",
                    "class"=>"form-input",
                    "placeholder"=>"Nom",
                    "type"=>"text",
                    "error"=>"Le nom doit faire entre 2 et 120 caractères",
                    "min"=>2,
                    "max"=>120,
                    "required"=>true,
                    "value"=>""
                ],
                "email"=>[
                    "id"=>"register-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Email",
                    "type"=>"email",
                    "error"=>"L'email est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
                "birth_date" => [
                    "id" => "register-form-birthdate",
                    "class" => "form-input",
                    "placeholder" => "Sa date de naissance",
                    "type" => "date",
                    "required" => true,
                    "value" => ""
                ],
                "password"=>[
                    "id"=>"register-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Le mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                    "required"=>true,
                    "value"=>""
                ],
                "passwordConfirm"=>[
                    "id"=>"register-form-pwd-confirm",
                    "class"=>"form-input",
                    "placeholder"=>"Confirmer votre mot de passe",
                    "type"=>"password",
                    "error"=>"Le mot de passe de confirmation ne correspond pas",
                    "required"=>true,
                    "confirm"=>"pwd",
                    "value"=>""
                ],
            ]
        ];
        return $this->config;
    }
}