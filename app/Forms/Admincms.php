<?php
namespace App\Forms;
use App\Core\Validator;

class Admincms extends Validator
{
    protected array $config = [];
    public function getConfig(): array
    {
        $this->config = [
            "config"=>[
                "method"=>"GET",
                "action"=>"admin-preview",
                "id"=>"admin-cms-form",
                "class"=>"new-admin-form",
                "enctype"=>"",
                "submit"=>"Voir la preview de la review",

            ],
            "inputs"=>[
                "titleMedia"=>[
                    "id"=>"admin-cms-form-titleMedia",
                    "class"=>"new-admin-form-input",
                    "placeholder"=>"Titre",
                    "type"=>"text",
                    "error"=>"Le titre du film ne doit pas être vide ou dépasser 80 caractères",
                    "min"=>1,
                    "max"=>80,
                    "required"=>true,
                    "value"=>""
                ],

                "slogan"=>[
                    "id"=>"admin-cms-form-slogan",
                    "class"=>"new-admin-form-input",
                    "placeholder"=>"Slogan",
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
                    "class" => "new-admin-form-input",
                    "placeholder" => "Description",
                    "type" => "text",
                    "error" => "il faut une description au média que vous souhaitez rajouter",
                    "required" => true,
                    "value" => ""
                ],
            ],
            "select"=>[
                "category"=>[
                    "id"=>"admin-cms-form-category",
                    "class"=>"new-admin-form-input",
                    "placeholder"=>"Catégorie",
                    "type"=>"select",
                    "error"=>"Une catégorie doit être sélectionnée",
                    "required"=>true,
                    "options" => [
                        "0" => "Selectionnez une catégorie",
                        "Horreur" => "Horreur",
                        "Comédie" => "Comédie",
                        "Drama" => "Drama",
                        "Action" => "Action"
                    ],
                    "value"=>""
                ],
                "stars"=>[
                    "id"=>"admin-cms-form-stars",
                    "class"=>"new-admin-form-input",
                    "placeholder"=>"Notation",
                    "type"=>"select",
                    "error"=>"Une notation doit être sélectionnée",
                    "required"=>true,
                    "options" => [
                        "0" => "Sélectionnez une notation",
                        "1" => "1",
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                        "5" => "5"
                    ],
                    "value"=>""
                ],
            ]

        ];
        return $this->config;
    }
}