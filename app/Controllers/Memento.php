<?php

namespace App\Controllers;

use App\Core\View;

class Memento
{
    protected $state;

    // Set State of Memento
    public function setState($state) {
    	$this->state = $state;
    }

    public function getState()
    {
        return $this->state;
    }

    //PARTIE VUE
    public function mementoView()
    {
        $view = new View("Memento/memento", "front");
        $view->assign("pageName", "Memento Page");
    
    }
}