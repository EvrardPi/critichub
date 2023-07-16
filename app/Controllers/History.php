<?php

namespace App\Controllers;

use App\Models\Memento as SendMemenToDb;

class History extends EditorMemento
{
    
    protected $mementos = [];

    public function pushObj(EditorMemento $memento){
        if (count($this->mementos) > 0) {
            $contentTest = $this->mementos[0]->getContent();
            array_push($contentTest, $memento->getContent());
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
        header("Location: /memento?id=".$id);
    }

    public function getMementos() {
    	return $this->mementos;
    }
}