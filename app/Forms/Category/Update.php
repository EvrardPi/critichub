<?php
namespace App\Forms\Category;
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
                "action"=>"update",
                "id"=>"update-form",
                "class"=>"updateForm",
                "enctype"=>"",
                "submit"=>"Mettre à jour",
                "reset"=>"Annuler"
            ],
            "inputs"=>[
                "id"=>[
                    "id"=>"update-form-id",
                    "class"=>"form-input",
                    "placeholder"=>"Son id",
                    "type"=>"hidden",
                    "error"=>"L'id est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
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
                "role"=>[
                    "id"=>"update-form-role",
                    "class"=>"form-input",
                    "placeholder"=>"Son statut",
                    "type"=>"select",
                    "error"=>"Le statut est incorrect",
                    "required"=>true,
                    "options" => [
                        "1" => "Administrateur",
                        "2" => "Utilisateur"
                    ],
                    "value"=>""
                ],
                "birth_date" => [
                    "id" => "update-form-birth_date",
                    "class" => "form-input",
                    "placeholder" => "Sa date de naissance",
                    "type" => "date",
                    "required" => true,
                    "value" => ""
                ],



            ]
        ];
        return $this->config;
    }
}