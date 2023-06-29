<?php

namespace App\Core;

abstract class SQL
{
    private static $instance;
    private $pdo;
    private $table;

    public function __construct()
    {
        //Connexion à la bdd
        //SINGLETON à réaliser
        try {
            $this->pdo = new \PDO("pgsql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'] . ";port=" . $_ENV['DB_PORT'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        } catch (\Exception $e) {
            die("Erreur SQL : " . $e->getMessage());
        }

        //$this->table = static::class;
        $classExploded = explode("\\", get_called_class());
        $this->table = "paya4_" . end($classExploded);
    }
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function populate(Int $id): object
    {
        $class = get_called_class();
        $objet = new $class();
        return $objet->getOneWhere(["id" => $id]);
    }

    public function getOneWhere(array $where): mixed
    {
        $sqlWhere = [];
        foreach ($where as $column => $value) {
            $sqlWhere[] = $column . "=:" . $column;
        }
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE " . implode(" AND ", $sqlWhere));
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute($where);
        return $queryPrepared->fetch();
    }

    public function emailExists(string $email): bool
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email]);
        $result = $queryPrepared->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserInfo(array $email): array {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function updateUserPwd(array $email, array $pwd): array {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET password = :password  WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email'], 'password' => $pwd['password']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function updateForgotToken(array $email, array $tokenForgot): array {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET forgot_token = :forgot_token  WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email'], 'forgot_token' => $tokenForgot['forgot_token']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function isTokenValid(array $email, array $tokenForgotToVerify): bool {
        $queryPrepared = $this->pdo->prepare("SELECT forgot_token FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email']]);
        $result = $queryPrepared->fetch();
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        if ($result['forgot_token'] === $tokenForgotToVerify['forgot_token']) {
            return true;
        } else {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
    }


    public function save(): void
    {
        $columns = get_object_vars($this);
        $columnsToExclude = get_class_vars(get_class());
        $columns = array_diff_key($columns, $columnsToExclude);

        if (is_numeric($this->getId()) && $this->getId() > 0) {
            $sqlUpdate = [];
            foreach ($columns as $column => $value) {
                $sqlUpdate[] = $column . "=:" . $column;
            }
            $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table .
                " SET " . implode(",", $sqlUpdate) . " WHERE id=" . $this->getId());
        } else {
            $queryPrepared = $this->pdo->prepare("INSERT INTO " . $this->table .
                " (" . implode(",", array_keys($columns)) . ") 
            VALUES
             (:" . implode(",:", array_keys($columns)) . ") ");
        }

        $queryPrepared->execute($columns);
    }

    public function delete(Int $id): void
    {

        if (is_numeric($id) && $id > 0) {
            $queryPrepared = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id=" . $id);
            $queryPrepared->execute();
        }
    }

    public function getAll(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

    public function getToken(String $email, String $confirm_key): array
    {
        $reqConfirm = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE email = ?");
        $reqConfirm->execute(array($email));
        $userExist = $reqConfirm->rowCount();
        $user = $reqConfirm->fetch();
        $response = [
            "user" => $userExist,
            "confirm" => $user['confirm'],
            "confirm_key" => $user['confirm_key']
        ];
        return $response;

        //retourn d'abord si le compte est validé (si confirm est deja égale a 1) 
        // mais aussi return le userexist si il existe plusieurs fois (donc vérifier si il y a plusieurs confirm_key donc si supérieur a 1 erreur si c'est 0 le mail n'existe pas en bdd donc il doit se connecter)
        //return array d'un confirl key et user exist
    }

    public function confirmAccount(String $email): void
    {
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table .
            " SET confirm = ? WHERE email = ? ");
        $queryPrepared->execute(array(1, $email));
    }
}
