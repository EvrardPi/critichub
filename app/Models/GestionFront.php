<?php

namespace App\Models;
use App\Core\SQL;
class GestionFront extends SQL {
    public string $h1;
    public string $h2;
    public string $h3;
    public string $h4;
    public string $h5;
    public string $h6;
    public string $text;
    public string $background;
    public string $link;

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function getBackground(): string
    {
        return $this->background;
    }

    /**
     * @param string $background
     */
    public function setBackground(string $background): void
    {
        $this->background = $background;
    }

    /**
     * @return string
     */
    public function getH1(): string
    {
        return $this->h1;
    }

    /**
     * @param string $h1
     */
    public function setH1(string $h1): void
    {
        $this->h1 = $h1;
    }

    /**
     * @return string
     */
    public function getH2(): string
    {
        return $this->h2;
    }

    /**
     * @param string $h2
     */
    public function setH2(string $h2): void
    {
        $this->h2 = $h2;
    }


    /**
     * @return string
     */
    public function getH3(): string
    {
        return $this->h3;
    }

    /**
     * @param string $h3
     */
    public function setH3(string $h3): void
    {
        $this->h3 = $h3;
    }


    /**
     * @return string
     */
    public function getH4(): string
    {
        return $this->h4;
    }

    /**
     * @param string $h4
     */
    public function setH4(string $h4): void
    {
        $this->h4 = $h4;
    }

    /**
     * @return string
     */
    public function getH5(): string
    {
        return $this->h5;
    }

    /**
     * @param string $h5
     */
    public function setH5(string $h5): void
    {
        $this->h5 = $h5;
    }


    /**
     * @return string
     */
    public function getH6(): string
    {
        return $this->h6;
    }

    /**
     * @param string $h6
     */
    public function setH6(string $h6): void
    {
        $this->h6 = $h6;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }



}
