<?php

namespace App\Controllers;

use App\Core\View;

class Memento {
    private $content;

    public function setContent($content) {
        $this->content = $content;
    }

    public function getContent() {
        return $this->content;
    }



    //PARTIE VUE
    public function mementoView(){
        $view = new View("Memento/memento", "front");
        $view->assign("pageName", "Memento Page");
    }
}