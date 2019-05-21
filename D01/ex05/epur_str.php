#!/usr/bin/php
<?php
if($argc == 2)
{
$words_array = array_filter(explode(" ", trim($argv[1])));
$i = 0;
foreach($words_array as $value)
    {
        echo"$value";
        if($i < count($words_array) - 1)
            echo" ";
        else
            echo"\n";
        $i++;
    }
}
?>