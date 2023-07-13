<?php

namespace App\Forms;

use App\Core\Validator;

class Login extends Validator
{
    protected array $config = [];
    /**
     * Set configuration for the Login form
     */
    private function setConfig(): void
    {

        $this->config = [
            "config" => [
                "method" => "POST",
                "action" => "",
                "id" => "login-form",
                "class" => "login-form",
                "enctype" => "",
                "submit" => "Se connecter",
                "reset" => "Annuler",
            ],
            "inputs" => [
                "email" => [
                    "id" => "login-form-email",
                    "class" => "form-input",
                    "placeholder" => "Votre email",
                    "type" => "email",
                    "error" => "Connexion échouée",
                    "required" => true
                ],
                "pwd" => [
                    "id" => "login-form-pwd",
                    "class" => "form-input",
                    "placeholder" => "Votre mot de passe",
                    "type" => "password",
                    "error" => "Connexion échouée",
                    "required" => true
                ],
            ],
            "links" => [
                "forgot" => [
                    "class" => "button-link-forgot",
                    "href" => "/forgot",
                    "text" => "Mot de passe oublié ?",
                ],
                "register" => [
                    "class" => "button-link-register",
                    "href" => "/register",
                    "text" => "S'incrire",
                ]
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
