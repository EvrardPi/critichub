<?php

namespace App\Forms;

use App\Core\Validator;

class ForgotPwd extends Validator
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
                "action" => "forgot-confirmation",
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
            ],
            "links" => []
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
