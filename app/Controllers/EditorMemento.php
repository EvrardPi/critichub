<?php 

namespace App\Controllers;

use App\Models\Memento as SendMemenToDb;
class EditorMemento extends Memento{
    protected $content;

    private $id;

    //Set Id
    public function setId($id)
    {
        $this->id = $id;
    }

    public function buildMemento(): EditorMemento
    {
        $sendMemento = new SendMemenToDb();

        try {
            $sendMemento->getContentFromMemento($this->id);
        } catch (\Throwable $th) {
            if (isset($th)){
            $sendMemento->setNewMemento('O:29:"App\Controllers\EditorMemento":1:{s:7:"content";s:4:"None";}',$this->id);
        }
        }
        $mementoContent = new EditorMemento();
        $mementoContent->setContent($sendMemento->getContentFromMemento($this->id));
        $mementoArray = $mementoContent->getContent();
        return unserialize($mementoArray["content"]);
    }

    public function getContent() {
        return $this->content;
    }

    public function setContent($content) {
    	$this->content = $content;
    }

    public function pop(): array
    {
        return array_slice($this->content,0, -1);
    }
}