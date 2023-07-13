<?php

namespace App\Controllers;

use App\Controllers\EditorMemento;

class History {

    private $mementos = [];

    public function __construct()
    {
        $this->mementos = [];
    }
    
    public function push(Memento $memento) {
        $this->mementos[] = $memento;
    }

    public function pop() {
        if (empty($this->mementos)) {
            return null;
        }

        return array_pop($this->mementos);
    }

    public function getMementos() {
    	return $this->mementos;
    }

    public function getMementosContents()
    {
        $contents = [];
        foreach ($this->mementos as $memento) {
            $contents[] = $memento->getContent();
        }
        return $contents;
    }
}