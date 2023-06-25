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
                "method"=>"POST",
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
                    "type"=>"text",
                    "error"=>"Il faut un slogan pour le film",
                    "required"=>true,
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
                "banner" => [
                    "id" => "admin-cms-form-banner",
                    "class" => "new-admin-form-input image-input new-admin-hidden",
                    "placeholder" => "",
                    "type" => "file",
                    "error" => "Une image de bannière est requise",
                    "required" => true,
                    "value" => ""
                ],
                "logo" => [
                    "id" => "admin-cms-form-logo",
                    "class" => "new-admin-form-input image-input new-admin-hidden",
                    "placeholder" => "",
                    "type" => "file",
                    "error" => "Une image de logo est requis",
                    "required" => true,
                    "value" => ""
                ],
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
                "actors"=>[
                    "id"=>"admin-cms-form-actors",
                    "class"=>"new-admin-form-input",
                    "placeholder"=>"Notation",
                    "type"=>"select",
                    "error"=>"Un nombre d'acteurs doit être sélectionné",
                    "required"=>true,
                    "options" => [
                        "0" => "Nombre d'acteurs à montrer",
                        "1" => "1",
                        "2" => "2",
                        "3" => "3",
                        "4" => "4",
                        "5" => "5",
                        "6" => "6"
                    ],
                    "value"=>""
                ],
            ],
            "button"=>[
                "banner-preview" => [
                    "id" => "button-banner",
                    "type" => "button",
                    "class" => "new-admin-form-input white-text button button-form-banner",
                    "textToDisplay" => "Banner",
                    "onclick" => "document.getElementById('admin-cms-form-banner').click()",
                    "error" => "Une image de bannière est requise",
                    "required" => true,
                ],
                "logo-preview" => [
                    "id" => "button-logo",
                    "type" => "button",
                    "class" => "new-admin-form-input white-text button button-form-logo",
                    "textToDisplay" => "Logo",
                    "onclick" => "document.getElementById('admin-cms-form-logo').click()",
                    "error" => "Une image de logo est requise",
                    "required" => true,
                ],
            ],
        ];
        return $this->config;
    }
}