<?php

namespace App\Models;

use App\Core\SQL;
use App\Core\View;

class Elementard extends SQL
{
    private int $id = 0;
    protected string $background_color;
    protected string $categories;
    protected string $categories_color;
    protected string $critique;
    protected string $critique_background_color;
    protected int $date_sortie;
    protected string $director_name;
    protected string $font;
    protected string $font_color;
    protected string $font_textarea_color;
    protected string $image_url;
    protected string $movie_name;
    protected int $movie_time;
    protected int $note;
    protected string $slogan_movie;
    protected string $template;
    protected int $nb_vue;
    protected int $id_user;



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
     * Get the value of background_color
     */ 
    public function getBackground_color()
    {
        return $this->background_color;
    }

    /**
     * Set the value of background_color
     *
     * @return  self
     */ 
    public function setBackground_color($background_color)
    {
        $this->background_color = $background_color;

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
     * Get the value of categories_color
     */ 
    public function getCategories_color()
    {
        return $this->categories_color;
    }

    /**
     * Set the value of categories_color
     *
     * @return  self
     */ 
    public function setCategories_color($categories_color)
    {
        $this->categories_color = $categories_color;

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
     * Get the value of critique_background_color
     */ 
    public function getCritique_background_color()
    {
        return $this->critique_background_color;
    }

    /**
     * Set the value of critique_background_color
     *
     * @return  self
     */ 
    public function setCritique_background_color($critique_background_color)
    {
        $this->critique_background_color = $critique_background_color;

        return $this;
    }

    /**
     * Get the value of date_sortie
     */ 
    public function getDate_sortie()
    {
        return $this->date_sortie;
    }

    /**
     * Set the value of date_sortie
     *
     * @return  self
     */ 
    public function setDate_sortie($date_sortie)
    {
        $this->date_sortie = $date_sortie;

        return $this;
    }


    /**
     * Get the value of director_name
     */ 
    public function getDirector_name()
    {
        return $this->director_name;
    }

    /**
     * Set the value of director_name
     *
     * @return  self
     */ 
    public function setDirector_name($director_name)
    {
        $this->director_name = $director_name;

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
     * Get the value of font_color
     */ 
    public function getFont_color()
    {
        return $this->font_color;
    }

    /**
     * Set the value of font_color
     *
     * @return  self
     */ 
    public function setFont_color($font_color)
    {
        $this->font_color = $font_color;

        return $this;
    }

    /**
     * Get the value of font_textarea_color
     */ 
    public function getFont_textarea_color()
    {
        return $this->font_textarea_color;
    }

    /**
     * Set the value of font_textarea_color
     *
     * @return  self
     */ 
    public function setFont_textarea_color($font_textarea_color)
    {
        $this->font_textarea_color = $font_textarea_color;

        return $this;
    }

    /**
     * Get the value of image_url
     */ 
    public function getImage_url()
    {
        return $this->image_url;
    }

    /**
     * Set the value of image_url
     *
     * @return  self
     */ 
    public function setImage_url($image_url)
    {
        $this->image_url = $image_url;

        return $this;
    }

    /**
     * Get the value of movie_name
     */ 
    public function getMovie_name()
    {
        return $this->movie_name;
    }

    /**
     * Set the value of movie_name
     *
     * @return  self
     */ 
    public function setMovie_name($movie_name)
    {
        $this->movie_name = $movie_name;

        return $this;
    }

    /**
     * Get the value of movie_time
     */ 
    public function getMovie_time()
    {
        return $this->movie_time;
    }

    /**
     * Set the value of movie_time
     *
     * @return  self
     */ 
    public function setMovie_time($movie_time)
    {
        $this->movie_time = $movie_time;

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
     * Get the value of slogan_movie
     */ 
    public function getSlogan_movie()
    {
        return $this->slogan_movie;
    }

    /**
     * Set the value of slogan_movie
     *
     * @return  self
     */ 
    public function setSlogan_movie($slogan_movie)
    {
        $this->slogan_movie = $slogan_movie;

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
     * Get the value of nb_vue
     */ 
    public function getNb_vue()
    {
        return $this->nb_vue;
    }

    /**
     * Set the value of nb_vue
     *
     * @return  self
     */ 
    public function setNb_vue($nb_vue)
    {
        $this->nb_vue = $nb_vue;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}