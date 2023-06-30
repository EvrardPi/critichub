<?php
namespace App\Forms\User;
use App\Core\Validator;

class Create extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"create",
                "id"=>"create-form",
                "class"=>"create",
                "enctype"=>"",
                "submit"=>"Créer",

            ],
            "inputs"=>[
                "firstname"=>[
                    "id"=>"create-form-firstname",
                    "class"=>"form-input",
                    "placeholder"=>"Son prénom",
                    "type"=>"text",
                    "maxlength"=>60,
                    "accept"=>"",
                    "error"=>"Le prénom doit faire entre 2 et 60 caractères",
                    "required"=>true,
                    "value"=>""
                ],
                "lastname"=>[
                    "id"=>"create-form-lastname",
                    "class"=>"form-input",
                    "placeholder"=>"Son nom",
                    "type"=>"text",
                    "accept"=>"",
                    "error"=>"Le nom doit faire entre 2 et 120 caractères",
                    "maxlength"=>120,
                    "required"=>true,
                    "value"=>""
                ],
                "email"=>[
                    "id"=>"create-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Son email",
                    "type"=>"email",
                    "accept"=>"",
                    "maxlength"=>320,
                    "error"=>"L'email est incorrect",
                    "required"=>true,
                    "value"=>""
                ],

                "role"=>[
                    "id"=>"create-form-role",
                    "class"=>"form-input",
                    "placeholder"=>"Son statut",
                    "type"=>"select",
                    "accept"=>"",
                    "error"=>"Le statut est incorrect",
                    "required"=>true,
                    "options" => [
                        "1" => "Administrateur",
                        "2" => "Utilisateur"
                    ],
                    "value"=>""
                ],
                "birth_date" => [
                    "id" => "create-form-birthdate",
                    "class" => "form-input",
                    "placeholder" => "Sa date de naissance",
                    "type" => "date",
                    "accept"=>"",
                    "required" => true,
                    "value" => ""
                ],
                "password"=>[
                    "id"=>"create-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Son mot de passe",
                    "type"=>"password",
                    "accept"=>"",
                    "minlength"=>4,
                    "error"=>"Le mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                    "required"=>true,
                    "value"=>""
                ],
                "passwordConfirm"=>[
                    "id"=>"create-form-pwd-confirm",
                    "class"=>"form-input",
                    "placeholder"=>"Confirmation",
                    "type"=>"password",
                    "accept"=>"",
                    "minlength"=>4,
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