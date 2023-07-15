<?php

namespace App\Models;
use App\Core\SQL;
class UserReview extends SQL {
    private int $id = 0;
    public string $title;
    public string $description;
    public int $rating;
    protected int $id_movie;
    public int $id_user;
    public int $upvotes;

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
    public function getTitle(): string {
    	return $this->title;
    }

    /**
    * @param string $title
    */
    public function setTitle(string $title): void {
    	$this->title = $title;
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
    * @return int
    */
    public function getRating(): int {
    	return $this->rating;
    }

    /**
    * @param int $rating
    */
    public function setRating(int $rating): void {
    	$this->rating = $rating;
    }

    /**
    * @return int
    */
    public function getId_movie(): int {
    	return $this->id_movie;
    }

    /**
    * @param int $id_movie
    */
    public function setId_movie(int $id_movie): void {
    	$this->id_movie = $id_movie;
    }

    /**
    * @return int
    */
    public function getId_user(): int {
    	return $this->id_user;
    }

    /**
    * @param int $id_user
    */
    public function setId_user(int $id_user): void {
    	$this->id_user = $id_user;
    }

    /**
    * @return int
    */
    public function getUpvotes(): int {
    	return $this->upvotes;
    }

    /**
    * @param int $upvotes
    */
    public function setUpvotes(int $upvotes): void {
    	$this->upvotes = $upvotes;
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