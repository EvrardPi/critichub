<?php

namespace App\Controllers;

use App\Models\Memento as SendMemenToDb;

class History extends EditorMemento
{
    protected $mementos = [];

    public function pushObj(EditorMemento $memento){
        // Si le memento est vide, on en initialise un nouveau, sinon on push les données dans l'array existant
        if (count($this->mementos) > 0) {
            $content = $this->mementos[0]->getContent();

            // On vérifie la présence de balises html dans le contenu envoyé, et on les supprime si trouvées
            if (preg_match('/<[^>]*>/', $memento->getContent())) { //Regex HTML
                array_push($content, strip_tags($memento->getContent()));
            } else {
                array_push($content, $memento->getContent());
            }
            $this->mementos[0]->setContent($content);
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