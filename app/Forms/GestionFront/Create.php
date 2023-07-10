<?php
namespace App\Forms\GestionFront;
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
                "action"=>"tam",
                "id"=>"create-form",
                "class"=>"create-gestion-front",
                "enctype"=>"multipart/form-data",
                "submit"=>"Modifier",

            ],
            "inputs"=>[
                "name"=>[
                    "id"=>"create-form-category-name",
                    "class"=>"form-input",
                    "placeholder"=>"Son nom",
                    "type"=>"text",
                    "error"=>"Le nom doit faire entre 2 et 60 caractères",
                    "required"=>true,
                    "value"=>""
                ],
                "picture"=>[
                    "id"=>"create-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Mettre l'image de la catégorie",
                    "type"=>"file",
                    "accept"=>"image/png",
                    "required"=>true,
                    "value"=>"",

                ],

            ]
        ];
        return $this->config;
    }
}