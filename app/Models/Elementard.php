<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\View;

class Elementard extends SQL
{
    private int $id = 0;
    protected string $backgroundColor;
    protected string $categories;
    protected string $categoriesColor;
    protected string $critique;
    protected string $critiqueBackgroundColor;
    protected int $dateSortie;
    protected string $critiqueTitle;
    protected string $directorName;
    protected string $font;
    protected string $fontColor;
    protected string $fontTextAreaColor;
    protected string $imageUrl;
    protected string $movieName;
    protected int $movieTime;
    protected int $note;
    protected string $sloganMovie;
    protected string $template;
    protected int $idUser;

    public function view_elementard() {
        $view = new View("UserCms/test", "back");
        $view->assign("newPage", $this);
    }


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of backgroundColor
     */ 
    public function getBackgroundColor()
    {
        return $this->backgroundColor;
    }

    /**
     * Set the value of backgroundColor
     *
     * @return  self
     */ 
    public function setBackgroundColor($backgroundColor)
    {
        $this->backgroundColor = $backgroundColor;

        return $this;
    }

    /**
     * Get the value of categories
     */ 
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set the value of categories
     *
     * @return  self
     */ 
    public function setCategories($categories)
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * Get the value of critique
     */ 
    public function getCritique()
    {
        return $this->critique;
    }

    /**
     * Set the value of critique
     *
     * @return  self
     */ 
    public function setCritique($critique)
    {
        $this->critique = $critique;

        return $this;
    }

    /**
     * Get the value of critiqueBackgroundColor
     */ 
    public function getCritiqueBackgroundColor()
    {
        return $this->critiqueBackgroundColor;
    }

    /**
     * Set the value of critiqueBackgroundColor
     *
     * @return  self
     */ 
    public function setCritiqueBackgroundColor($critiqueBackgroundColor)
    {
        $this->critiqueBackgroundColor = $critiqueBackgroundColor;

        return $this;
    }

    /**
     * Get the value of dateSortie
     */ 
    public function getDateSortie()
    {
        return $this->dateSortie;
    }

    /**
     * Set the value of dateSortie
     *
     * @return  self
     */ 
    public function setDateSortie($dateSortie)
    {
        $this->dateSortie = $dateSortie;

        return $this;
    }

    /**
     * Get the value of critiqueTitle
     */ 
    public function getCritiqueTitle()
    {
        return $this->critiqueTitle;
    }

    /**
     * Set the value of critiqueTitle
     *
     * @return  self
     */ 
    public function setCritiqueTitle($critiqueTitle)
    {
        $this->critiqueTitle = $critiqueTitle;

        return $this;
    }

    /**
     * Get the value of directorName
     */ 
    public function getDirectorName()
    {
        return $this->directorName;
    }

    /**
     * Set the value of directorName
     *
     * @return  self
     */ 
    public function setDirectorName($directorName)
    {
        $this->directorName = $directorName;

        return $this;
    }

    /**
     * Get the value of font
     */ 
    public function getFont()
    {
        return $this->font;
    }

    /**
     * Set the value of font
     *
     * @return  self
     */ 
    public function setFont($font)
    {
        $this->font = $font;

        return $this;
    }

    /**
     * Get the value of fontColor
     */ 
    public function getFontColor()
    {
        return $this->fontColor;
    }

    /**
     * Set the value of fontColor
     *
     * @return  self
     */ 
    public function setFontColor($fontColor)
    {
        $this->fontColor = $fontColor;

        return $this;
    }

    /**
     * Get the value of fontTextAreaColor
     */ 
    public function getFontTextAreaColor()
    {
        return $this->fontTextAreaColor;
    }

    /**
     * Set the value of fontTextAreaColor
     *
     * @return  self
     */ 
    public function setFontTextAreaColor($fontTextAreaColor)
    {
        $this->fontTextAreaColor = $fontTextAreaColor;

        return $this;
    }

    /**
     * Get the value of imageUrl
     */ 
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set the value of imageUrl
     *
     * @return  self
     */ 
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get the value of movieName
     */ 
    public function getMovieName()
    {
        return $this->movieName;
    }

    /**
     * Set the value of movieName
     *
     * @return  self
     */ 
    public function setMovieName($movieName)
    {
        $this->movieName = $movieName;

        return $this;
    }

    /**
     * Get the value of movieTime
     */ 
    public function getMovieTime()
    {
        return $this->movieTime;
    }

    /**
     * Set the value of movieTime
     *
     * @return  self
     */ 
    public function setMovieTime($movieTime)
    {
        $this->movieTime = $movieTime;

        return $this;
    }

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get the value of sloganMovie
     */ 
    public function getSloganMovie()
    {
        return $this->sloganMovie;
    }

    /**
     * Set the value of sloganMovie
     *
     * @return  self
     */ 
    public function setSloganMovie($sloganMovie)
    {
        $this->sloganMovie = $sloganMovie;

        return $this;
    }

    /**
     * Get the value of template
     */ 
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * Set the value of template
     *
     * @return  self
     */ 
    public function setTemplate($template)
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }
}