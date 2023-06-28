<?php

namespace App\Forms;

use App\Core\Validator;

class ResetPwd extends Validator
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
                "action" => "confirm-reset-password?mail=".$_GET['mail'],
                "id" => "login-form",
                "class" => "login-form",
                "enctype" => "",
                "submit" => "Se connecter",
                "reset" => "Annuler",
            ],
            "inputs" => [
                "newPwd" => [
                    "id" => "reset-new-password",
                    "class" => "form-input",
                    "placeholder" => "Nouveau Mot de passe",
                    "type" => "password",
                    "error" => "Vous ne pouvez pas utiliser un ancien mot de passe",
                    "required" => true
                ],
                "confirmNewPwd" => [
                    "id" => "confirm-new-password",
                    "class" => "form-input",
                    "placeholder" => "Confirmation Nv. Mot de passe",
                    "type" => "password",
                    "error" => "Le mots de passe de confirmation diffère du nouveau mot de passe",
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
