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
    protected string $passwordConfirm;
    public int $role = 0;
    protected string $birth_date;
    private ?string $date_inserted;
    private ?string $date_updated;
    protected ?string $confirm_key;
    public int $confirm;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = strtoupper(trim($lastname));
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = ucwords(strtolower(trim($firstname)));
    }



    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = strtolower(trim($email));
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @return string
     */
    public function getPasswordConfirm(): ?string
    {
        return $this->passwordConfirm;
    }

    /**
     * @param string $passwordConfirm
     */
    public function setPasswordConfirm(?string $passwordConfirm): void
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return int
     */
    public function getRole(): int
    {
        return $this->role;
    }

    /**
     * @param int $role
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
        if (empty($this->date_inserted)) {
            return new \DateTime();
        } else {
            return new \DateTime($this->date_inserted);
        }
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
        if (empty($this->date_updated)) {
            return new \DateTime();
        } else {
            return new \DateTime($this->date_updated);
        }
    }

    /**
     * @param \DateTime $date_updated
     */
    public function setDateUpdated(\DateTime $date_updated): void
    {
        $this->date_updated = $date_updated;
    }

    /**
     * @return string
     */
    public function getConfirmKey(): string
    {
        return $this->confirm_key;
    }

    /**
     * @param string $confirm_key
     */
    public function setConfirmKey(string $confirm_key): void
    {
        $this->confirm_key = $confirm_key;
    }

    /**
     * @return int
     */
    public function getConfirm(): int
    {
        return $this->confirm;
    }

    /**
     * @param int $confirm
     */
    public function setConfirm(int $confirm): void
    {
        $this->confirm = $confirm;
    }
}
