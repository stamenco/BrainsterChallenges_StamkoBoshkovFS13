<?php


class Chair extends Furniture implements Printable
{
    public function __construct($height, $width, $length)
    {
        parent::__construct($height, $width, $length);
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
        echo get_class($this) . ", " . ($this->getIsForSleeping() ? " is for sleeping," : " for sitting only") . ", {$this->area()}cm2, width: {$this->getWidth()}cm, length: {$this->getLength()}cm, height: {$this->getHeight()}cm<br>";
    }
}
