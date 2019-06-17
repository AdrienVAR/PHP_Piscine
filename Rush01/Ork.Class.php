<?php
class Ork
{
    public $name;
    public $x;
    public $y;
    public $dir;
    public $length;
    public $pdc;
    public $pp;
    public $man;
    public $pdcmax;
    public $ppmax;
    public $manmax;
    public $bouc;
    public $boucmax;
    public function __construct($name, $x, $y, $dir)
    {
        $this->name = $name;
        $this->x = $x;
        $this->y = $y;
        $this->dir = $dir;
        $this->length = 2;
        $this->pdcmax = 4;
        // $this->pdc = $this->pdcmax;
        $this->pdc = 4;
        $this->pp = 2;
        $this->ppmax = 3;
        $this->man = 2;
        $this->manmax = 5;
        $this->bouc = 1;
        $this->boucmax = 5;
    }
	public static function doc()
    {
        return(file_get_contents('Ork.doc.txt'));
	}

}
