<?php

namespace App\Models;
use App\Core\SQL;
class Category extends SQL {
    private int $id = 0;
    public string $name;
    public string $picture;
    public string $base64;

    /**
     * @return string
     */
    public function getBase64(): string
    {
        return $this->base64;
    }

    /**
     * @param string $base64
     */
    public function setBase64(string $base64): void
    {
        $this->base64 = $base64;
    }
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPicture(): string
    {
        return $this->picture;
    }

    /**
     * @param string $picture
     */
    public function setPicture(string $picture): void
    {
        $this->picture = $picture;
    }
}
