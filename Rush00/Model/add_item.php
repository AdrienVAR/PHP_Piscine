
<?php
if (isset($_POST['submit']) && $_POST['submit'] == "OK" && isset($_POST['nom']) && $_POST['nom'] != "" && isset($_POST['prix']) && $_POST['prix'] != "" && isset($_POST['image']) && $_POST['image'] != "") 
{
    include("../Model/products.php");
    $products = get_products();
    $new = array();
    $new[0] = $_POST['nom'];
    $new[1] = $_POST['prix'];
    $new[2] = $_POST['image'];
    $new[3] = count($products);
    $new[4] = $_POST['categorie'];
    put_product($new);
}

?>
<div class="add_clothes">
    <form method="post" action="add_item">
                <label for="nom_du_vetement">Nom du vêtement: </label><input type="text" name="nom"><br />
                <label for="prix">Prix: </label><input type="text" name="prix"><br />
                <label for="image">Image: </label><input type="text" name="image"><br />
                <label for="categorie">Catégorie :</label><input type="radio" name="categorie" value="homme" />homme <input type="radio" name="categorie" value="femme" />femme <input type="radio" name="categorie" value="promotion" /> promotion <br />
                <input type="submit" class="submit" name="submit" value="OK">
    </form>
</div>
<?php
?>