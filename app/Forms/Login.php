<?php

namespace App\Forms;

use App\Core\Validator;

class Login extends Validator
{
    public const METHOD_POST = "POST";
    protected string $method = self::METHOD_POST;
    protected array $config = [];

    public function __construct() {
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->setData();
        $this->data = $this->getData();
    }

    /**
     * Set configuration for the Login form
     */
    private function setConfig(): void
    {
        $this->config = [
            "config"=>[
                "method"=>$this->method,
                "action"=>"",
                "id"=>"login-form",
                "class"=>"form",
                "enctype"=>"",
                "submit"=>"Se connecter",
                "reset"=>"Annuler"
            ],
            "inputs"=>[
                "email"=>[
                    "id"=>"login-form-email",
                    "class"=>"form-input",
                    "placeholder"=>"Votre email",
                    "type"=>"email",
                    "error"=>"Connexion échouée",
                    "required"=>true
                ],
                "pwd"=>[
                    "id"=>"login-form-pwd",
                    "class"=>"form-input",
                    "placeholder"=>"Votre mot de passe",
                    "type"=>"password",
                    "error"=>"Connexion échouée",
                    "required"=>true
                ],
            ]
        ];
    }

    /**
     * Get configuration for the Login form
     * @return array The configuration for the Login form
     */
    public function getConfig(): array
    {
        $this->setConfig();
        return $this->config;
    }
}
