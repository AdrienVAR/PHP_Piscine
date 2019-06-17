<?php
    if (isset($_SESSION['login']))
    {?>
    <div class="login">
        <a href="../mon-compte" alt="mon_compte">Mon compte</a>
        <a href="../deconnexion" alt="deconnexion">Déconnexion</a>
        <a href="../mon-panier" class="mon-panier" alt="mon-panier">Mon panier</a>
    </div>
    <?php }
    else
    {?>
        <div class="login">
            <a href="../inscription" alt="inscription">Inscription</a>
            <a href="../connexion" alt="connexion">Connexion</a>
            <a href="../mon-panier" class="mon-panier" alt="mon-panier">Mon panier</a>
        </div>
<?php } ?>
    <ul class="level0">
        <li class="dropdown">
            <button class="dropbtn"><a href="produits/femme">FEMME</a>
        </li>
        <li class="dropdown">
            <button class="dropbtn"><a href="produits/homme">HOMME</a>
        </li>
        <li class="dropdown">
            <button class="dropbtn"><a href="produits/promotions">PROMOTIONS</a>
        </li>
    </ul>

    <?php
    include("../Model/products.php");
    disp_products("promotions");
    ?>
    </body></html>


