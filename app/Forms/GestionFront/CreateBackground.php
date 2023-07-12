<?php
namespace App\Forms\GestionFront;
use App\Core\Validator;

class CreateBackground extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"gestion-background",
                "id"=>"create-form-gestion-front",
                "class"=>"create-gestion-front",
                "enctype"=>"multipart/form-data",
                "submit"=>"Modifier",

            ],
            "inputs"=>[
                "color"=>[
                    "id"=>"create-form-gestion-front-color",
                    "class"=>"form-input",
                    "placeholder"=>"Son nom",
                    "type"=>"color",
                    "error"=>"Le nom doit faire entre 2 et 60 caractères",
                    "required"=>true,
                    "value"=>""
                ],
                "selected_tab" => [
                    "id"=>"create-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Séléctionner le titre",
                    "type"=>"hidden",
                    "required"=>true,
                    "value"=>""
                ]

            ]
        ];
        return $this->config;
    }
}