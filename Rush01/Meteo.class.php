<?php
class Meteo
{
    public $name;
    public $x;
    public $y;
    public $length;
    public function __construct($x, $y)
    {
        $this->name = "Meteorite";
        $this->x = $x;
        $this->y = $y;
        $this->length = 4;
    }

}