<?php 

namespace App\Controllers;
class EditorMemento {
    private $content;

    public function __construct($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }

    /**
    * @param $content
    */
    public function setContent($content) {
    	$this->content = $content;
    }
}