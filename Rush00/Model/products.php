<?php

function get_products()
{
    $fd = fopen("../files/clothes.csv", "r");
    if ($fd != NULL)
    {
        $data = array();
        while (($tmp = fgetcsv($fd, 1000, ",")) != false)
            $data[] = $tmp;
        fclose($fd);
        return ($data);
    }
    return (NULL);
}

function put_product($new)
{
    if (($products = get_products()) != NULL)
    {
        $fd = fopen("../files/clothes.csv", "w");
        $products[] = $new;
        foreach ($products as $fields)
            fputcsv($fd, $fields, ",");
    }
    fclose($fd);
}

function del_product($id)
{
    $products = get_products();
    foreach ($products as $key => $value)
        if ($key > 0 && $value[3] == $id)
        {
            array_splice($products, $key, 1);
            if (($fd = fopen("../files/clothes.csv", "w")) == NULL)
                return (1);
            foreach ($products as $fields)
                fputcsv($fd, $fields, ",");
            fclose($fd);
            return (0);
        }
    return (1);
}

function disp_products($categorie)
{
    $products = get_products();
    echo '<div class="products-container">';
    foreach ($products as $item)
    {
        if ($item[4] == $categorie)
        {?>
            <div class="produit">
                <div class="image-container"><img src="../imgs/<?php echo $item[2];?>" slt="image produit"></div>
                <p><?php echo $item[0];?></p>
                <p class="price"><?php echo $item[1];?> €</p>
                <form method="post" action="../addtobasket/">
                    <select name="qty">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <button type="submit" name="id" value="<?php echo $item[3];?>">Ajouter au panier</button>
                </form>
            </div>
        <?php }
    }
    echo '</div>    <div class="home-button">
    <a href="../index">Menu principal</a>
  </div>';
}

?>