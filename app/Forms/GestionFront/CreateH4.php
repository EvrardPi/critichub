<?php
namespace App\Forms\GestionFront;
use App\Core\Validator;

class CreateH4 extends Validator
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
                "color"=>[
                    "id"=>"create-form-category-name",
                    "class"=>"form-input",
                    "placeholder"=>"Son nom",
                    "type"=>"color",
                    "error"=>"Le nom doit faire entre 2 et 60 caractères",
                    "required"=>true,
                    "value"=>""
                ],
                "police"=>[
                    "id"=>"create-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Séléctionner la police",
                    "type"=>"text",
                    "required"=>true,
                    "value"=>"",

                ],
                "size"=>[
                    "id"=>"create-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Séléctionner la taille",
                    "type"=>"number",
                    "required"=>true,
                    "value"=>"",

                ],

            ]
        ];
        return $this->config;
    }
}