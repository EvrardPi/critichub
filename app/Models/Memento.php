<?php

namespace App\Models;
use App\Core\SQL;
class Memento extends SQL {

    private int $id = 0;
    public string $content;
    

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
    public function getContent(): string {
    	return $this->content;
    }

    /**
    * @param string $content
    */
    public function setContent(string $content): void {
    	$this->content = $content;
    }
}