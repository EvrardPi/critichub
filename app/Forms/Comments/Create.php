<?php
namespace App\Forms\Comments;
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
                "action"=>"back-create-comments",
                "id"=>"create-form-comment",
                "class"=>"create",
                "enctype"=>"multipart/form-data",
                "submit"=>"Créer",

            ],
            "inputs"=>[
                "content"=>[
                    "id"=>"create-form-comment-content",
                    "class"=>"form-input",
                    "placeholder"=>"Votre commentaire",
                    "type"=>"text",
                    "error"=>"Le commentaire ne doit pas etre vide",
                    "required"=>true,
                    "value"=>""
                ],
                "id-media"=>[
                    "id"=>"create-form-comment-id-media",
                    "class"=>"form-input",
                    "placeholder"=>"id-media",
                    "type"=>"hidden",
                    "error"=>"",
                    "required"=>true,
                    "value" => $_GET['id'],
                ],
            ]
        ];
        return $this->config;
    }
}
?>



