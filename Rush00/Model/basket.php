<?php

function disp_basket($basket)
{
    ?>
        <div class="orders"><table class="order">
        <tr class="basket-title">
            <td colspan="3">Panier</td>
            <td class="basket-total"> <?php echo get_total($basket);?> €</td>
        </tr>
        <?php
        if ($basket[0] != NULL)
            foreach ($basket as $item)
            {
                $info = get_item($item[0]);
                ?>
                <tr class="">
                    <td class="basket-image"><img src="../imgs/<?php echo $info[2].'" alt="'.$info[0]; ?>"></td>
                    <td><?php echo $info[0]; ?></td>
                    <td><?php echo $item[1]?></td>
                    <td><a href="../delete-basket/<?php echo $item[0]?>" alt="Supprimer l'article">Supprimer</a></td>
                </tr>

            <?php }
            ?>
            <tr><td colspan="4"><a <?php if ($basket[0] != NULL) echo 'href="../place_order"';?> alt="valider panier">Valider le panier</a></td></tr>
        </table></div><?php
}

function get_total($basket)
{
    include_once("../Model/get_item.php");
    $total = 0;
    foreach ($basket as $value)
    {
        $tmp = get_item($value[0]);
        $total = $total + (intval($tmp[1]) * intval($value[1]));
    }
    return ($total);
}

function del_basket($id)
{
    $basket = $_SESSION['basket'];
    foreach ($basket as $key => $value)
    {
        if ($value[0] == $id)
        {
            array_splice($basket, $key, 1);
            $_SESSION['basket'] = $basket;
            return (0);
        }
    }
    return (1);
}

function place_order()
{
    $new = array();
    $new[0] = count(get_orders());
    $new[1] = $_SESSION['login'];
    $new[2] = time();
    $new[3] = get_total($_SESSION['basket']);
    $basket = $_SESSION['basket'];
    foreach ($basket as $value)
        $new[] = $value[0].":".$value[1];
    put_order($new);
    unset($_SESSION['basket']);
    header('Location: ../commandes');
}
?>