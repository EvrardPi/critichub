<?php
namespace App\Forms;
use App\Core\Validator;

class Update extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"update-form",
                "class"=>"updateForm",
                "enctype"=>"",
                "submit"=>"Mettre à jour",
                "reset"=>"Annuler"
            ],
            "inputs"=>[
                "firstname"=>[
                    "id"=>"update-form-firstname",
                    "class"=>"form-input",
                    "placeholder"=>"Votre prénom",
                    "type"=>"text",
                    "error"=>"Votre prénom doit faire entre 2 et 60 caractères",
                    "min"=>2,
                    "max"=>60,
                    "required"=>true
                ],
                "lastname"=>[
                    "id"=>"update-form-lastname",
                    "class"=>"form-input",
                    "placeholder"=>"Votre nom",
                    "type"=>"text",
                    "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                    "min"=>2,
                    "max"=>120,
                    "required"=>true
                ],
                "email"=>[
                    "id"=>"update-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Votre email",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "required"=>true
                ],
                "country"=>[
                    "id"=>"update-form-country",
                    "class"=>"form-input",
                    "placeholder"=>"Votre pays",
                    "type"=>"text",
                    "error"=>"Votre pays est incorrect",
                    "required"=>true
                ],
                "pwd"=>[
                    "id"=>"update-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Votre mot de passe",
                    "type"=>"password",
                    "error"=>"Votre mot de passe doit faire au minimum 8 caractères avec minuscules, majuscules et chiffres",
                    "required"=>true
                ],
                "pwdConfirm"=>[
                    "id"=>"update-form-pwd-confirm",
                    "class"=>"form-input",
                    "placeholder"=>"Confirmation",
                    "type"=>"password",
                    "error"=>"Votre mot de passe de confirmation ne correspond pas",
                    "required"=>true,
                    "confirm"=>"pwd"
                ],
            ]
        ];
        return $this->config;
    }
}