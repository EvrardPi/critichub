<?php

namespace App\Forms;

use App\Core\Validator;
use App\Helper;

class Login extends Validator
{
    protected array $config = [];
    protected $csrfToken;

    public function __construct()
    {
        $this->setData();
        $this->data = $this->getData();
    }


    /**
     * Set data for the Login form
     *
     * @return void
     */
    public function setData(): void
    {
        $this->data = (Helper::methodUsed() === Helper::POST) ? $_POST : $_GET;
    }


    /**
     * Get data for the Login form
     * @return array The data for the Login form
     */
    public function getData(): array
    {
        return $this->data;
    }


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
                "csrf_token" => $this->csrfToken,
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
            ]
        ];
    }

    /**
     * Get configuration for the Login form
     * @return array The configuration for the Login form
     */
    public function getConfig(): array
    {
        $this->csrfToken = $this->generateCSRFToken();
        $this->setConfig();
        return $this->config;
    }
}
