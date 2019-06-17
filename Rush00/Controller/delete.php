<?php
session_start();
include_once("../Model/account_csv.php");
include_once("../Model/orders_csv.php");
include_once("../Model/products.php");
include_once("../Model/basket.php");

$title = "Suppression ";

if (isset($_SESSION['login']))
    $admin = isadmin($_SESSION['login']);
if (isset($_SESSION['basket']) && isset($_GET['c']) && $_GET['c'] == "basket")
{
    $ret = del_basket($_GET['id']);
    header('Location: ../mon-panier');
}
include_once("../View/head.php");
if ($admin == true && isset($_GET['c']) && isset($_GET['id']))
{
    if ($_GET['c'] == "order")
    {
        $ret = del_order($_GET['id']);
        if ($ret == 0)
            echo '<div class="action success">La commande a bien été supprimée. ';
        else
            echo '<div class="action error">Une erreur est survenue lors de la suppression de la commande. ';
    }
    else if ($_GET['c'] == "user")
    {
        $ret = del_account($_GET['id']);
        if ($ret == 0)
            echo '<div class="action success">L\'utilisateur a bien été supprimée. ';
        else
            echo '<div class="action error">Une erreur est survenue lors de la suppression de l\'utilisateur. ';
    }
    else if ($_GET['c'] == "item")
    {
        $ret = del_item($_GET['id']);
        if ($ret == 0)
            echo '<div class="action success">Le produit a bien été supprimée. ';
        else
            echo '<div class="action error">Une erreur est survenue lors de la suppression du produit. ';
    }
    else
        header('Location: ../index');

}
else
    echo '<div class="action error">Vous n\'avez pas la permission d\'effectuer cette action. ';

?>
<a href="../index">Revenir au menu principal</a></div></body></html>