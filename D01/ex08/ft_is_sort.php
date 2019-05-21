<?php
function ft_is_sort($tab)
{
    $sorted_tab = $tab;
    sort($sorted_tab);
    $entries = count($tab);
    $i = 0;
    while ($i < $entries)
    {
        if ($sorted_tab[$i] != $tab[$i])
            return (FALSE);
        $i++;
    }
    return (TRUE);
}
?>