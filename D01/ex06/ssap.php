#!/usr/bin/php
<?php
function ft_split($str)
{
    $output = array_filter(explode(" ", $str));
    sort($output);
    return ($output);
}
if ($argc > 1)
{
    $output = array();
    $i = 1;
    while ($i < $argc)
    {
        $tmp = ft_split($argv[$i]);
        $output = array_merge($output, $tmp);
        $i++;
    }
    sort($output);
    foreach($output as $value)
    {
        echo"$value\n";
    }
}
?>