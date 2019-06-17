<?php

//INDEX
if (!isset($_GET['page']) || $_GET['page'] == "index" || $_GET['page'] == "index.php")
{
    session_start();
    $title = "Accueil ";
    include("../View/head.php");
    include("../View/index.php");
    return (0);
}
//CONNECTION
if (isset($_GET['page']) && ($_GET['page'] == "connexion" || $_GET['page'] == "login"))
{
    include("../Model/login.php");
    return (0);
}
//INSTALL
if (isset($_GET['page']) && ($_GET['page'] == "install.php"))
{
    include("../install.php");
    exit(0);
}
//USER REGISTRATION
if (isset($_GET['page']) && ($_GET['page'] == "inscription" || $_GET['page'] == "register"))
{
    include("../Model/register.php");
    return (0);
}
if (isset($_GET['page']) && $_GET['page'] == "inscription-succes")
{
    session_start();
    if (isset($_SESSION['login']))
        header('Location: index');
    $title = "Bienvenue";
    include("../View/head.php");
    include("../View/success.html");
    return (0);
}
if (isset($_GET['page']) && ($_GET['page'] == "deconnexion" || $_GET['page'] == "disconnect"))
{
    session_start();
    session_destroy();
    header('Location: index');
    return (0);
}
//ORDERS
if (isset($_GET['page']) && ($_GET['page'] == "commandes" || $_GET['page'] == "orders"))
{
    session_start();
    if (isset($_SESSION['login']))
    {
        $title = "Commandes ";
        include("../View/head.php");
        include("../Model/account_csv.php");
        include("../Model/orders_csv.php");
        include("../Model/get_item.php");
        $orders = get_orders();
        $admin = isadmin($_SESSION['login']);
        disp_orders($orders, $_SESSION['login'], $admin);
    }
    else
        header('Location: connexion');
    return (0);
}
if (isset($_GET['page']) && $_GET['page'] == "mon-compte")
{
    session_start();
    if (!isset($_SESSION['login']))
        header('Location: connexion');
    $title = "Mon compte ";
    include_once("../View/head.php");
    include_once("../View/account.html");
    include_once("../Model/account_csv.php");
    if (isadmin($_SESSION['login']) == true)
        include("../View/admin.html");
    echo '<div class="home-button"><a href="../index">Menu principal</a></div>';
    return (0);
}
if (isset($_GET['page']) && $_GET['page'] == "change-password")
{
    session_start();
    if (!isset($_SESSION['login']))
        header('Location: connexion');
    $title = "Changer de mot de passe ";
    include_once("../Model/account_csv.php");
    include_once("../View/head.php");
    include_once("../Model/change-password.php");
    return (0);

}
if (isset($_GET['page']) && $_GET['page'] == "mon-panier")
{
    session_start();
    $title = "Panier ";
    include_once("../Model/basket.php");
    include_once("../Model/get_item.php");
    include_once("../View/head.php");
    disp_basket($_SESSION['basket']);
    echo '<div class="home-button">
<a href="../mon-compte">Mon compte</a>
</div></body></html>';
    return (0);

}
if (isset($_GET['page']) && $_GET['page'] == "place_order")
{
    session_start();
    if (!isset($_SESSION['login']))
        header('Location: ../connexion');
    else if ($_SESSION['basket'] == NULL)
        header('Location: ../mon-panier');
    else
    {
        include_once("../Model/orders_csv.php");
        include_once("../Model/basket.php");
        place_order();
    }
    return (0);
}
if (isset($_GET['page']) && $_GET['page'] == "add_item")
{
    $title = "Ajouter un article ";
    session_start();
    if (!isset($_SESSION['login']))
        header('Location: ../index');
    include("../Model/account_csv.php");
    if (isadmin($_SESSION['login']) != true)
        header('Location: ../index');
    include("../View/head.php");
    include("../Model/add_item.php");
    return (0);
}
if (isset($_GET['page']) && $_GET['page'] == "utilisateurs")
{
    $title = "Administration des utilisateurs ";
    session_start();
    include("../Model/account_csv.php");
    if (!isset($_SESSION['login']) || isadmin($_SESSION['login']) != true)
        header('Location: ../index');
    include("../View/head.php");
    include("../View/users.php");
    return (0);
}
include("../view/perdu.html");
?>