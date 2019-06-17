<?php

function get_item($id)
{
    if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/files/clothes.csv", "r")) !== FALSE) {
        $data = array();
        $i = 0;
        while (($tmp = fgetcsv($handle, 1000, ",")) != FALSE)
            $data[] = $tmp;
        fclose($handle);
        while ($data[$i])
        {
            if ($data[$i][3] == $id )
                return($data[$i]);
            $i++;
        }
    }
    return (NULL);
}
?>
