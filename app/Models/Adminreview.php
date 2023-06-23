<?php

namespace App\Models;
use App\Core\SQL;
class Adminreview extends SQL {
    private int $id = 0;
    public string $titleMedia;
    public string $category;
    public int $stars;
    protected string $slogan;
    public string $description;

    public string $banner;

    public string $logo;

    public string $actors;

    public string $actor1;
    public ?string $actor2;
    public ?string $actor3;
    public ?string $actor4;
    public ?string $actor5;
    public ?string $actor6;

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

    /**
    * @return string
    */
    public function getBanner(): string {
    	return $this->banner;
    }

    /**
    * @param string $banner
    */
    public function setBanner(string $banner): void {
    	$this->banner = $banner;
    }

    /**
    * @return string
    */
    public function getLogo(): string {
    	return $this->logo;
    }

    /**
    * @param string $logo
    */
    public function setLogo(string $logo): void {
    	$this->logo = $logo;
    }

    /**
    * @return string
    */
    public function getActors(): string {
    	return $this->actors;
    }

    /**
    * @param string $actors
    */
    public function setActors(string $actors): void {
    	$this->actors = $actors;
    }

    /**
    * @return string
    */
    public function getActor1(): string {
    	return $this->actor1;
    }

    /**
    * @param string $actor1
    */
    public function setActor1(string $actor1): void {
    	$this->actor1 = $actor1;
    }

    /**
    * @return string
    */
    public function getActor2(): string {
    	return $this->actor2;
    }

    /**
    * @param string $actor2
    */
    public function setActor2(string $actor2): void {
    	$this->actor2 = $actor2;
    }

    /**
    * @return string
    */
    public function getActor3(): string {
    	return $this->actor3;
    }

    /**
    * @param string $actor3
    */
    public function setActor3(string $actor3): void {
    	$this->actor3 = $actor3;
    }

    /**
    * @return string
    */
    public function getActor4(): string {
    	return $this->actor4;
    }

    /**
    * @param string $actor4
    */
    public function setActor4(string $actor4): void {
    	$this->actor4 = $actor4;
    }

    /**
    * @return string
    */
    public function getActor5(): string {
    	return $this->actor5;
    }

    /**
    * @param string $actor5
    */
    public function setActor5(string $actor5): void {
    	$this->actor5 = $actor5;
    }

    /**
    * @return string
    */
    public function getActor6(): string {
    	return $this->actor6;
    }

    /**
    * @param string $actor6
    */
    public function setActor6(string $actor6): void {
    	$this->actor6 = $actor6;
    }
}
