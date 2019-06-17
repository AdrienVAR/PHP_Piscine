<?php

if (!isset($_GET['categorie']) || ($_GET['categorie'] != "femme" && $_GET['categorie'] != "homme" && $_GET['categorie'] != "promotions"))
{ 
    include("../View/perdu.html");
    exit(0);
}
include("../View/head.php");
include("../Model/products.php");
disp_products($_GET['categorie']);
?>
</body></html>