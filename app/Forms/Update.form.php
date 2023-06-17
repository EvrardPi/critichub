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
                    "required"=>true,
                    "value"=>""

                ],
                "lastname"=>[
                    "id"=>"update-form-lastname",
                    "class"=>"form-input",
                    "placeholder"=>"Votre nom",
                    "type"=>"text",
                    "error"=>"Votre nom doit faire entre 2 et 120 caractères",
                    "min"=>2,
                    "max"=>120,
                    "required"=>true,
                    "value"=>""
                ],
                "email"=>[
                    "id"=>"update-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Votre email",
                    "type"=>"email",
                    "error"=>"Votre email est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
                "country"=>[
                    "id"=>"update-form-country",
                    "class"=>"form-input",
                    "placeholder"=>"Votre pays",
                    "type"=>"text",
                    "error"=>"Votre pays est incorrect",
                    "required"=>true,
                    "value"=>""
                ],

            ]
        ];
        return $this->config;
    }
}