<?php

namespace App\Controllers;

use App\Core\View;
use App\Models\Memento as SendMemenToDb;

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