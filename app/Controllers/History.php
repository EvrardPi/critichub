<?php

namespace App\Controllers;

use App\Models\Memento as SendMemenToDb;

class History extends EditorMemento
{
    
    private $mementos = [];

    public function pop() {
        if (empty($this->mementos)) {
            return null;
        }

        return array_pop($this->mementos);
    }

    public function pushObj(EditorMemento $memento){
        if (count($this->mementos) > 0) {
            $contentTest = $this->mementos[0]->getContent();
            array_push($contentTest[0], $memento->getContent());
            $this->mementos[0]->setContent($contentTest);
        } else {
            array_push($this->mementos, $memento);
        }
    }

    public function getObj() {
        $content = [];
        foreach ($this->mementos as $memento) {
            if ($memento instanceof EditorMemento) {
                $content[] = $memento->getContent();
            }
        }
        return $content;
    }

    public function pushToDB($memento, $id) {
        $sendMemento = new SendMemenToDb();
        $sendMemento->setContentIntoMemento($memento,$id);
    }

    public function getMementos() {
    	return $this->mementos;
    }
}