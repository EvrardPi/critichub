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
                "action"=>"gestion-front",
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
                "police"=>[
                    "id"=>"create-form-gestion-front-police",
                    "class"=>"form-input",
                    "placeholder"=>"Séléctionner la police",
                    "type"=>"select",
                    "required"=>true,
                    "options" => [
                        "Arial" => "Arial",
                        "Times New Roman" => "Times New Roman",
                        "Courier New" => "Courier New",
                        "Verdana" => "Verdana",
                        "Georgia" => "Georgia",
                        "Comic Sans MS" => "Comic Sans MS",
                        "Impact" => "Impact",
                        "Lucida Console" => "Lucida Console",
                    ],
                    "value"=>"",
                ],
                "size"=>[
                    "id"=>"create-form-gestion-front-size",
                    "class"=>"form-input",
                    "placeholder"=>"Séléctionner la taille",
                    "type"=>"number",
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