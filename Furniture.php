<?php

class Furniture
{
    private $width;
    private $length;
    private $height;
    private $is_for_seating;
    private $is_for_sleeping;

    public function __construct($width, $length, $height)
    {
        $this->width = $width;
        $this->length = $length;
        $this->height = $height;
    }

    public function getWidth()
    {
        return $this->width;
    }
    public function getLength()
    {
        return $this->length;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setIsForSeating(bool $isForSeating)
    {
        $this->is_for_seating = $isForSeating;
    }

    public function getIsForSeating()
    {
        return $this->is_for_seating;
    }

    public function setIsForSleeping(bool $isForSleeping)
    {
        $this->is_for_sleeping = $isForSleeping;
    }

    public function getIsForSleeping()
    {
        return $this->is_for_sleeping;
    }

    public function area()
    {
        return $this->width * $this->length;
    }

    public function volume()
    {
        return $this->area() * $this->height;
    }

    public function printIt()
    {
        echo "Area is: {$this->area()} cm2, Volume is: {$this->volume()} cm3";
    }
}
