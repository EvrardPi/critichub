<?php

namespace App\Core;

require_once '/var/www/html/config.php';

abstract class SQL
{
    private static $instance;
    protected $pdo;
    private $table;

    public function __construct()
    {
        //Connexion à la bdd
        //SINGLETON à réaliser
       
        try {
            $this->pdo = new \PDO("pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASSWORD);
        } catch (\Exception $e) {
            //die("Erreur SQL : " . $e->getMessage());
            // Laisser la gestion de l'erreur à l'appelant
            throw $e;
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

    public static function populate(int $id): object
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

    public function getUserInfo(array $email): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function getMediaInfo(array $id): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE id_movie = :id_movie");
        $queryPrepared->execute(['id_movie' => $id['id_movie']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function getAllMediaIDs(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT id_movie FROM " . $this->table);
        $queryPrepared->execute();
        $result = $queryPrepared->fetchAll();
        return $result;
    }

    public function updateUserPwd(array $email, array $pwd): array
    {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET password = :password  WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email'], 'password' => $pwd['password']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function updateForgotToken(array $email, array $tokenForgot): array
    {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET forgot_token = :forgot_token  WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email'], 'forgot_token' => $tokenForgot['forgot_token']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function setExpirationTime(array $email, array $expiration_time): array
    {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET expiration_time = :expiration_time  WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email'], 'expiration_time' => $expiration_time['expiration_time']]);
        $result = $queryPrepared->fetch();
        return $result;
    }

    public function isTokenExpired(array $email): bool
    {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("SELECT expiration_time FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email']]);
        $result = $queryPrepared->fetch();
        if (time() > $result['expiration_time']) {
            return true;
        } else {
            return false;
        }
    }

    public function isTokenValid(array $email, array $tokenForgotToVerify): bool
    {
        if ($this->emailExists($email['email']) === false) {
            array_push($_SESSION['error_messages'], "Un problème avec votre compte est survenu.");
            return false;
        }
        $queryPrepared = $this->pdo->prepare("SELECT forgot_token FROM " . $this->table . " WHERE email = :email");
        $queryPrepared->execute(['email' => $email['email']]);
        $result = $queryPrepared->fetch();

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

    public function delete(int $id): void
    {

        if (is_numeric($id) && $id > 0) {
            $queryPrepared = $this->pdo->prepare("DELETE FROM " . $this->table . " WHERE id=" . $id);
            $queryPrepared->execute();
        }
    }

    public function namePictureExists(array $name): bool
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE picture = :picture");
        $queryPrepared->execute(['picture' => $name['picture']]);
        $result = $queryPrepared->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function nameExists(array $name): bool
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE name = :name");
        $queryPrepared->execute(['name' => $name['name']]);
        $result = $queryPrepared->fetch();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function getAll(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table);
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

    public function getContentFromMemento($id_memento): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE id_memento = :id_memento");
        $queryPrepared->execute(['id_memento' => $id_memento]);
        return $queryPrepared->fetch();
    }

    public function setContentIntoMemento($content, $id_memento): array
    {
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET content = :content  WHERE id_memento = :id_memento");
        $queryPrepared->execute(['content' => $content, 'id_memento' => $id_memento]);
        return $queryPrepared->fetch();
    }


    public function setNewMemento($content, $id_memento): array
    {
        $queryPrepared = $this->pdo->prepare("INSERT INTO " . $this->table . " (id_memento, content) VALUES (:id_memento,:content)");
        $queryPrepared->execute(['content' => $content,'id_memento' => $id_memento]);
        return $queryPrepared->fetch();
    }

    public function getUserToConfirm(String $token): mixed
    {
        $reqConfirm = $this->pdo->prepare("SELECT id, confirm FROM " . $this->table . " WHERE confirm_key = ? LIMIT 1");
        $reqConfirm->execute(array($token));
        return $reqConfirm->fetch();
    }

    public function confirmAccount(int $idUser): void
    {
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table .
            " SET confirm = ? WHERE id = ? ");
        $queryPrepared->execute(array(1, $idUser));
    }

    public function getCategoryNameById($categoryId): string
    {
        $queryPrepared = $this->pdo->prepare("SELECT name FROM " . $this->table . " WHERE id = :id");
        $queryPrepared->execute(['id' => $categoryId]);
        $result = $queryPrepared->fetch();
        if ($result) {
            return $result['name'];
        } else {
            return '';
        }
    }

    public function getCategoryImageNameById($categoryId): string
    {
        $queryPrepared = $this->pdo->prepare("SELECT picture FROM " . $this->table . " WHERE id = :id");
        $queryPrepared->execute(['id' => $categoryId]);
        $result = $queryPrepared->fetch();
        if ($result) {
            return $result['picture'];
        } else {
            return '';
        }
    }

    public function getCount(string $tableName): int
    {
        $queryPrepared = $this->pdo->prepare("SELECT COUNT(*) FROM " . $tableName);

        $queryPrepared->execute();
        $result = $queryPrepared->fetchColumn();

        return (int) $result;
    }
  
    public function changeFront($selectedTab,$formdata): void
    {
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET $selectedTab = :value");
        $queryPrepared->bindParam(':value', $formdata);
        $queryPrepared->execute();
    }

    public function getLastSix(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " ORDER BY id DESC LIMIT 10");
        $queryPrepared->execute();
        return $queryPrepared->fetchAll();
    }

    public function getById($id): mixed
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE id = :id");
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute(['id' => $id]);
        return $queryPrepared->fetch();
    }

    public function getByIdMedia($id): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE id_review = :id AND status = 2");
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute(['id' => $id]);
        return $queryPrepared->fetchAll();
    }

    public function getAllCommentsToVerify(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE status = 1");
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();

        return $queryPrepared->fetchAll();
    }

    public function getValidComments(): array
    {
        $queryPrepared = $this->pdo->prepare("SELECT * FROM " . $this->table . " WHERE status = 2");
        $queryPrepared->setFetchMode(\PDO::FETCH_CLASS, get_called_class());
        $queryPrepared->execute();

        return $queryPrepared->fetchAll();
    }

        public function publish(int $id): void
    {
        $queryPrepared = $this->pdo->prepare("UPDATE " . $this->table . " SET status = 2 WHERE id = :id");
        $queryPrepared->bindValue(':id', $id, \PDO::PARAM_INT);
        $queryPrepared->execute();
    }



}