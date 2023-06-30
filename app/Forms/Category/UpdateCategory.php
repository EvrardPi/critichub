<?php
namespace App\Forms\Category;
use App\Core\Validator;

class UpdateCategory extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"updatetam",
                "id"=>"category-update-form",
                "class"=>"update",
                "enctype"=>"multipart/form-data",
                "submit"=>"Modifier",

            ],
            "inputs"=>[
                "id"=>[
                    "id"=>"update-form-id",
                    "class"=>"form-input",
                    "placeholder"=>"Son id",
                    "type"=>"hidden",
                    "accept"=>"",
                    "error"=>"L'id est incorrect",
                    "required"=>true,
                    "value"=>""
                ],
                "name"=>[
                    "id"=>"update-form-category-name",
                    "class"=>"form-input",
                    "placeholder"=>"Son nom",
                    "type"=>"text",
                    "error"=>"Le nom doit faire entre 2 et 60 caractères",
                    "accept"=>"",
                    "required"=>true,
                    "value"=>""
                ],
                "picture"=>[
                    "id"=>"update-form-category-picture",
                    "class"=>"form-input",
                    "placeholder"=>"Mettre l'image de la catégorie",
                    "type"=>"file",
                    "accept"=>"image/png",
                    "required"=>true,
                    "value"=>""
                ],

            ]
        ];
        return $this->config;
    }
}