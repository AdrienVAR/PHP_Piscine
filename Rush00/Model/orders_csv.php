<?php

function get_orders()
{
    if (($handle = fopen("../files/orders.csv", "r")) !== FALSE) {
        $data = array();
        while (($tmp = fgetcsv($handle, 1000, ",")) != false)
            $data[] = $tmp;
        fclose($handle);
        return ($data);
    }
    return (NULL);
}

function put_order($new)
{
    if (($orders = get_orders()) != NULL)
    {
        $fd = fopen("../files/orders.csv", "w");
        $orders[] = $new;
        foreach ($orders as $fields)
            fputcsv($fd, $fields, ",");
    }
    fclose($fd);
}

function disp_orders($orders, $login, $admin)
{
    $my_orders = array();
    foreach ($orders as $k => $value)
    {
        if ($k > 0 && ($admin == true || $login == $value[1]))
            $my_orders[] = $value;
    }
    ?><div class="orders"><?php
    if (($len = count($my_orders)) > 0)
    {
        echo '<p>Vous avez '.$len.' commande disponible(s)</p>';
        foreach ($my_orders as $order)
            include("../Model/orders_table.php");
    }
    else
        echo '<p>Il n\'y a aucune commande en cours disponnible.</p>';
    ?><div class="home-button"><a href="../mon-compte">Mon compte</a></div></div></body></html><?php
}

function del_order($id)
{
    $orders = get_orders();
    foreach ($orders as $key => $value)
        if ($key > 0 && $value[0] == $id)
        {
            array_splice($orders, $key, 1);
            if (($fd = fopen("../files/orders.csv", "w")) == NULL)
                return (1);
            foreach ($orders as $fields)
                fputcsv($fd, $fields, ",");
            fclose($fd);
            return (0);
        }
    return (1);
}

?>