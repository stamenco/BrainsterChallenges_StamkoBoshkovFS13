<?php

// require_once("./interface/Printable.php"); 
require_once("Furniture.php");

class Sofa extends Furniture implements Printable
{
    private $seats;
    private $armrests;
    private $length_opened;

    public function __construct($width, $length, $height)
    {
        parent::__construct($width, $length, $height);
    }

    public function setSeats($seats)
    {
        $this->seats = $seats;
    }

    public function getSeats()
    {
        return $this->seats;
    }

    public function setArmrests($armrests)
    {
        $this->armrests = $armrests;
    }

    public function getArmrests()
    {
        return $this->armrests;
    }

    public function setLengthOpened($length_opened)
    {
        $this->length_opened = $length_opened;
    }

    public function getLengthOpened()
    {
        return $this->length_opened;
    }

    public function area_opened()
    {
        if ($this->getIsForSleeping()) {
            $result = $this->getWidth() * $this->getLengthOpened();
            return  $result . " cm2";
        } else {
            return "This sofa is for sitting only, it has {$this->getArmrests()} armrests and {$this->getSeats()} seats.";
        }
    }

    public function print()
    {
        echo get_class($this) . ", " . ($this->getIsForSleeping() ? 'is for sleeping, ' : 'for sitting only, ') . ($this->area()) . "cm2";
    }
    public function sneakpeek()
    {
        echo get_class($this);
    }
    public function fullinfo()
    {
        echo get_class($this) . ", " . ($this->getIsForSleeping() ? " is for sleeping" : " for sitting only") . ", {$this->area()}cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm<br>";
    }
}
