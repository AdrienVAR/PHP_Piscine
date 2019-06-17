<?php
session_start();
include_once("../Model/account_csv.php");
include_once("../Model/orders_csv.php");
include_once("../Model/basket.php");

$title = "Ajout au panier ";

if (isset($_POST['id']) && isset($_POST['qty']))
{
    include_once("../Model/basket.php");
    $_SESSION['basket'][] = array($_POST['id'], $_POST['qty']);
}
header('Location: ../mon-panier');