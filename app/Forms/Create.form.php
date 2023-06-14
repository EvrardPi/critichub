<?php
namespace App\Forms;
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
                "id"=>"register-form",
                "class"=>"create",
                "enctype"=>"",
                "submit"=>"Créer",

            ],
            "inputs"=>[
                "firstname"=>[
                    "id"=>"register-form-firstname",
                    "class"=>"form-input",
                    "placeholder"=>"Son prénom",
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
                    "placeholder"=>"Son nom",
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
                    "placeholder"=>"Son email",
                    "type"=>"email",
                    "error"=>"L'email est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
                "country"=>[
                    "id"=>"register-form-country",
                    "class"=>"form-input",
                    "placeholder"=>"Son pays",
                    "type"=>"texte",
                    "error"=>"Le pays est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
                "pwd"=>[
                    "id"=>"register-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Son mot de passe",
                    "type"=>"password",
                    "error"=>"Le mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                    "required"=>true,
                    "value"=>""
                ],
                "pwdConfirm"=>[
                    "id"=>"register-form-pwd-confirm",
                    "class"=>"form-input",
                    "placeholder"=>"Confirmation",
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