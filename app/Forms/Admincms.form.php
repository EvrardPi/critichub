<?php
namespace App\Forms;
use App\Core\Validator;

class Admincms extends Validator
{
    public $method = "POST";
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"publish",
                "id"=>"admin-cms-form",
                "class"=>"publish",
                "enctype"=>"",
                "submit"=>"Publier",

            ],
            "inputs"=>[
                "titleMedia"=>[
                    "id"=>"admin-cms-form-titleMedia",
                    "class"=>"form-input",
                    "placeholder"=>"Title",
                    "type"=>"text",
                    "error"=>"Le titre du film ne doit pas être vide ou dépasser 80 caractères",
                    "min"=>1,
                    "max"=>80,
                    "required"=>true,
                    "value"=>""
                ],
                "category"=>[
                    "id"=>"admin-cms-form-category",
                    "class"=>"form-input",
                    "placeholder"=>"Sa catégorie",
                    "type"=>"select",
                    "error"=>"Une catégorie doit être sélectionnée",
                    "required"=>true,
                    "options" => [
                        "0" => "Category",
                        "Horreur" => "Horreur",
                        "Comédie" => "Comédie",
                        "Drama" => "Drama",
                        "Action" => "Action"
                    ],
                    "value"=>""
                ],
                "stars"=>[
                    "id"=>"admin-cms-form-stars",
                    "class"=>"form-input",
                    "placeholder"=>"Sa notation",
                    "type"=>"select",
                    "error"=>"Il faut un nombre d'étoiles par défaut",
                    "required"=>true,
                    "options" => [
                        "0" => "Stars",
                        "1" => "1",
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                        "5" => "5"
                    ],
                    "value"=>""
                ],

                "slogan"=>[
                    "id"=>"admin-cms-form-slogan",
                    "class"=>"form-input",
                    "placeholder"=>"Son slogan",
                    "type"=>"select",
                    "error"=>"Il faut un slogan pour le film",
                    "required"=>true,
                    "options" => [
                        "1" => "Administrateur",
                        "2" => "Utilisateur"
                    ],
                    "value"=>""
                ],
                "description" => [
                    "id" => "admin-cms-form-description",
                    "class" => "form-input",
                    "placeholder" => "Sa description",
                    "type" => "text",
                    "error" => "il faut une description au média que vous souhaitez rajouter",
                    "required" => true,
                    "value" => ""
                ],
            ]
        ];
        return $this->config;
    }
}