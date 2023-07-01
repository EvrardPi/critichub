<?php
namespace App\Forms\Category;
use App\Core\Validator;

class CreateCategory extends Validator
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
                "class"=>"create",
                "enctype"=>"multipart/form-data",
                "submit"=>"Créer",

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