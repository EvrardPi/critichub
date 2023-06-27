<?php

namespace App\Models;

use App\Core\SQL;

class UserReview extends SQL
{
    private int $id = 0;
    protected string $backgroundColor;
    protected string $critique;
    protected string $critiqueBackgroundColor;
    protected string $critiqueTitle;
    protected string $font;
    protected string $fontColor;
    protected string $movieAffiche;
    protected string $movieName;
    protected string $movieTopimg;
    protected string $sloganMovie;
    protected string $template;


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
     * Get the value of movieAffiche
     */ 
    public function getMovieAffiche()
    {
        return $this->movieAffiche;
    }

    /**
     * Set the value of movieAffiche
     *
     * @return  self
     */ 
    public function setMovieAffiche($movieAffiche)
    {
        $this->movieAffiche = $movieAffiche;

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
     * Get the value of movieTopimg
     */ 
    public function getMovieTopimg()
    {
        return $this->movieTopimg;
    }

    /**
     * Set the value of movieTopimg
     *
     * @return  self
     */ 
    public function setMovieTopimg($movieTopimg)
    {
        $this->movieTopimg = $movieTopimg;

        return $this;
    }
}