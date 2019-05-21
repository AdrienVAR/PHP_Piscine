#!/usr/bin/php
<?php
if ($argc > 1)
{
    $output = array_filter(explode(" ", trim($argv[1])));
    $output = array_merge($output);
    $words = count($output);
    $i = 1;
    while ($i < $words)
    {
        echo"$output[$i] ";
        $i++;
    }
    echo"$output[0]\n";
}
?>