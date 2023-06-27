<?php
namespace App\Forms;
use App\Core\Validator;

class Register extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $today = date("Y-m-d");

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
                    "error"=>"Le prénom doit faire entre 1 et 60 caractères",
                    "maxlength"=>60,
                    "required"=>true,
                    "value"=>""
                ],
                "lastname"=>[
                    "id"=>"register-form-lastname",
                    "class"=>"form-input",
                    "placeholder"=>"Nom",
                    "type"=>"text",
                    "error"=>"Le nom doit faire entre 1 et 120 caractères",
                    "maxlength"=>120,
                    "required"=>true,
                    "value"=>""
                ],
                "email"=>[
                    "id"=>"register-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Email",
                    "type"=>"email",
                    "error"=>"L'email est incorrect",
                    "maxlength"=>320,
                    "required"=>true,
                    "value"=>""
                ],
                "birth_date" => [
                    "id" => "register-form-birthdate",
                    "class" => "form-input",
                    "placeholder" => "Sa date de naissance",
                    "type" => "date",
                    "error"=>"La date de naissance doit être au format jj/mm/aaaa et être antérieure à aujourd'hui",
                    "min" => $today,
                    "required" => true,
                    "value" => ""
                ],
                "password"=>[
                    "id"=>"register-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Mot de passe",
                    "type"=>"password",
                    "error"=>"Le mot de passe doit contenir au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmi: &-é_èçà^ù:!ù#~@°%§+.",
                    "minlength"=>8,
                    "required"=>true,
                    "value"=>""
                ],
                "passwordConfirm"=>[
                    "id"=>"register-form-pwd-confirm",
                    "class"=>"form-input",
                    "placeholder"=>"Confirmer votre mot de passe",
                    "type"=>"password",
                    "error"=>"Le mot de passe de confirmation ne correspond pas",
                    "minlength"=>8,
                    "required"=>true,
                    "value"=>"",
                    "confirm"=>"pwd"
                ],
            ]
        ];
        return $this->config;
    }
}