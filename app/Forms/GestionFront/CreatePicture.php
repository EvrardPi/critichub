<?php
namespace App\Forms\GestionFront;
use App\Core\Validator;

class CreatePicture extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"back-gestion-picture",
                "id"=>"create-form-gestion-front",
                "class"=>"create-gestion-front",
                "enctype"=>"multipart/form-data",
                "submit"=>"Modifier",

            ],
            "inputs"=>[
                "picture"=>[
                    "id"=>"create-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Mettre l'image de la catégorie",
                    "type"=>"file",
                    "accept"=>"image/png",
                    "required"=>true,
                    "value"=>"",

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