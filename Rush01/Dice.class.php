<?php
class Dice
{
    public $val;
    public function __construct()
    {
        $this->val = rand(1, 6);
        echo "Throwed a dice: ".$this->val."\n";
        return($this->val);
    }
    public function throw_dice()
    {
        $this->val = rand(1, 6);
        return($this->val);
    }
    public function __toString()
    {
        if ($this->val <3)
            return(sprintf("Dice value is: %d\n", $this->val));
        else
            return(sprintf("Dice value is: 3+\n"));
    }
	public static function doc()
    {
        return(file_get_contents('Dice.doc.txt'));
	}

}
?>
