<?php
function ft_split($str)
{
    $output = array_filter(explode(" ", $str));
    sort($output);
    return ($output);
}
?>