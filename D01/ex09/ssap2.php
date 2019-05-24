#!/usr/bin/php
<?php
function ft_split($str)
{
    $array = array_filter(explode(" ", $str));
    sort($array);
    return ($array);
}
if ($argc > 1)
{
    $array = array();
    $i = 1;
    while ($i < $argc)
    {
        $tmp = ft_split($argv[$i]);
        $array = array_merge($array, $tmp);
        $i++;
    }
    foreach($array as $value)
    {
        if(ctype_alpha($value[0]) == TRUE)
            $alpha[] = $value;
    }
    sort($alpha, SORT_NATURAL | SORT_FLAG_CASE);
    foreach($array as $value)
    {
        if(is_numeric($value[0]) == TRUE)
            $number[] = $value;
    }
    sort($number, SORT_STRING);
    foreach($array as $value)
    {
        if(ctype_alpha($value[0]) == FALSE && is_numeric($value[0]) == FALSE)
            $special[] = $value;
    }
    sort($special, SORT_REGULAR);
    foreach($alpha as $value)
        echo"$value\n";
    foreach($number as $value)
        echo"$value\n";
    foreach($special as $value)
        echo"$value\n";
}
?>