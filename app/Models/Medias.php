<?php

namespace App\Models;
use App\Core\SQL;
class Medias extends SQL {
    private int $id = 0;
    public string $titleMedia;
    public string $category;
    public int $stars;
    protected string $slogan;
    public string $description;
    private ?string $created_at;
    private ?string $updated_at;


    public function __construct(){
        parent::__construct();
    }

    /**
    * @return int
    */
    public function getId(): int {
    	return $this->id;
    }

    /**
    * @param int $id
    */
    public function setId(int $id): void {
    	$this->id = $id;
    }

    /**
    * @return string
    */
    public function getTitleMedia(): string {
    	return $this->titleMedia;
    }

    /**
    * @param string $titleMedia
    */
    public function setTitleMedia(string $titleMedia): void {
    	$this->titleMedia = $titleMedia;
    }

    /**
    * @return string
    */
    public function getCategory(): string {
    	return $this->category;
    }

    /**
    * @param string $category
    */
    public function setCategory(string $category): void {
    	$this->category = $category;
    }

    /**
    * @return int
    */
    public function getStars(): int {
    	return $this->stars;
    }

    /**
    * @param int $stars
    */
    public function setStars(int $stars): void {
    	$this->stars = $stars;
    }

    /**
    * @return string
    */
    public function getSlogan(): string {
    	return $this->slogan;
    }

    /**
    * @param string $slogan
    */
    public function setSlogan(string $slogan): void {
    	$this->slogan = $slogan;
    }

    /**
    * @return string
    */
    public function getDescription(): string {
    	return $this->description;
    }

    /**
    * @param string $description
    */
    public function setDescription(string $description): void {
    	$this->description = $description;
    }

    /**
    * @return string
    */
    public function getCreated_at(): string {
    	return $this->created_at;
    }

    /**
    * @param string $created_at
    */
    public function setCreated_at(string $created_at): void {
    	$this->created_at = $created_at;
    }

    /**
    * @return string
    */
    public function getUpdated_at(): string {
    	return $this->updated_at;
    }

    /**
    * @param string $updated_at
    */
    public function setUpdated_at(string $updated_at): void {
    	$this->updated_at = $updated_at;
    }
}
