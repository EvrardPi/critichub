<?php

namespace App\Models;
use App\Core\SQL;
class User extends SQL
{
    private int $id = 0;
    public string $firstname;
    public string $lastname;
    public string $email;
    protected string $password;
    public int $role = 0;
    protected string $birth_date;
    private ?string $date_inserted;
    private ?string $date_updated;
    private string $confirm_key;
    private int $confirm;


    public function __construct(){
        parent::__construct();
    }


    /**
     * @return Int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param Int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return String
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param String $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return String
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param String $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }



    /**
     * @return String
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param String $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return String
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param String $password
     */
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }





    /**
     * @return Int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param Int $role
     */
    public function setRole(int $role): void
    {
        $this->role = $role;
    }

    public function setBirthDate($birthDate)
    {
        $this->birth_date = $birthDate;
    }

    public function getBirthDate()
    {
        return $this->birth_date;
    }

    /**
     * @return \DateTime
     */
    public function getDateInserted(): \DateTime
    {
        return $this->date_inserted;
    }

    /**
     * @param \DateTime $date_inserted
     */
    public function setDateInserted(\DateTime $date_inserted): void
    {
        $this->date_inserted = $date_inserted;
    }

    /**
     * @return \DateTime
     */
    public function getDateUpdated(): \DateTime
    {
        return $this->date_updated;
    }

    /**
     * @param \DateTime $date_updated
     */
    public function setDateUpdated(\DateTime $date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    /**
     * @return Int
     */
    public function getConfirmKey(): int
    {
        return $this->confirm_key;
    }

    /**
     * @param String $confirm_key
     */
    public function setConfirmKey(string $confirm_key): void
    {
        $this->confirm_key = $confirm_key;
    }

    /**
     * @return Int
     */
    public function getConfirm(): int
    {
        return $this->confirm;
    }

    /**
     * @param Int $confirm
     */
    public function setConfirm(int $confirm): void
    {
        $this->confirm = $confirm;
    }



}
