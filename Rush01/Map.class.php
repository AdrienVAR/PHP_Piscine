<?php
class Map
{
    public $map;
    public $ships;
    public function __construct()
    {
        $this->map = array();
        $this->ships = array();
        $map[0] = array();
        for ($y = 0; $y < 100; $y++)
        {
            for ($x = 0; $x < 150; $x++)
            {
                $this->map[$y][$x] = "black";
            }
        }
        
    }
    public function insert_ship($ship)
    {
        $this->ships[$ship->name] = $ship;
        // print_r($this->ships);
        $this->map[$ship->y][$ship->x] = "OrkHead".$ship->dir;
        
        if ($ship->dir == 'f')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y+$i][$ship->x] = "red";
            }
        }
        if ($ship->dir == 'b')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y-$i][$ship->x] = "red";
            }
        }
        if ($ship->dir == 'r')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y][$ship->x-$i] = "red";
            }
        }
        if ($ship->dir == 'l')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y][$ship->x+$i] = "red";
            }
        }
    }
    public function remove_ship($ship)
    {
        $this->map[$ship->y][$ship->x] = "black";
        
        if ($ship->dir == 'f')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y+$i][$ship->x] = "black";
            }
        }
        if ($ship->dir == 'b')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y-$i][$ship->x] = "black";
            }
        }
        if ($ship->dir == 'r')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y][$ship->x-$i] = "black";
            }
        }
        if ($ship->dir == 'l')
        {
            for ($i = 1; $i <  $ship->length; $i++)
            {
                $this->map[$ship->y][$ship->x+$i] = "black";
            }
        }
        unset($this->ships[$ship->name]);
    }
    public function rotate_ship($ship, $dir)
    {
        $this->remove_ship($ship);
            $ship->dir = $dir;
        $this->insert_ship($ship);
    }
    public function insert_meteorites($met)
    {
        $this->met[$met->name] = $met;
        $this->map[$met->y][$met->x] = "Meteor";
        for ($i = 1; $i <  $met->length; $i++)
            {
                $this->map[$met->y+$i][$met->x] = "MeteorEdge";
            }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y-$i][$met->x] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y][$met->x-$i] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y][$met->x+$i] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y+$i][$met->x+$i] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y+$i][$met->x-$i] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y-$i][$met->x-$i] = "MeteorEdge";
        }
        for ($i = 1; $i <  $met->length; $i++)
        {
            $this->map[$met->y-$i][$met->x+$i] = "MeteorEdge";
        }
        
    }
    public function move_ship($ship, $dist)
    {
        $this->remove_ship($ship);
        if ($ship->dir == 'f')
            $ship->y = $ship->y - $dist;
        if ($ship->dir == 'b')
            $ship->y = $ship->y + $dist;
        if ($ship->dir == 'r')
            $ship->x = $ship->x + $dist;
        if ($ship->dir == 'l')
            $ship->x = $ship->x - $dist;
        $this->insert_ship($ship);
    }

    // public function display()
    // {
    //     print_r ($this->map);
    // }
    public function tir($ship)
    {
        $this->ships[$ship->name] = $ship;
        $this->map[$ship->y][$ship->x] = "OrkHead".$ship->dir;
        
        if ($ship->dir == 'f')
        {
            for ($i = 1; $ship->y - $i >  1; $i--)
            {
                if ($this->map[$ship->y+$i][$ship->x] == "red")
                {
                    echo "YOU WON!!!\n";
                    unset($_SESSION['x1']);
                    unset($_SESSION['y1']);
                    unset($_SESSION['dir']);
                    exit();
                }
            }
        }
       if ($ship->dir == 'b')
        {
            for ($i = 1; $ship->y + $i <  98; $i++)
            {
                if ($this->map[$ship->y+$i][$ship->x] == "red")
                {
                    echo "YOU WON!!!\n";
                    unset($_SESSION['x1']);
                    unset($_SESSION['y1']);
                    unset($_SESSION['dir']);
                    exit();
                }
            }
        }
        if ($ship->dir == 'r')
        {
            for ($i = 1; $ship->y + $i <  149 ; $i++)
            {
                if ($this->map[$ship->y][$ship->x+$i] == "red")
                {
                    echo "YOU WON!!!\n";
                    unset($_SESSION['x1']);
                    unset($_SESSION['y1']);
                    unset($_SESSION['dir']);
                    exit();
                }
            }
        }
        if ($ship->dir == 'l')
        {
            for ($i = 3; $ship->y + $i >  1 ; $i--)
            {
                
            }
        }
    }
	public static function doc()
    {
        return(file_get_contents('Map.doc.txt'));
	}
    
}
?>
