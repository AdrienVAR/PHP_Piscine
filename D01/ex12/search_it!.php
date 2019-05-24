#!/usr/bin/php
<?php
if($argc > 2)
{
    $i = 2;
    while ($i < $argc)
    {
        $array = explode(":", $argv[$i]);
        if(strcmp($array[0], $argv[1]) == 0)
            $value = $array[1];
        $i++;
    }
    if($value)
        echo"$value\n";
}
?>