<table class="order">
    <tr class="summary">
        <td class="date" colspan="<?php if ($admin == true) echo '1'; else echo '2';?>"><?php echo date("d/m/Y \à G\hi",$order[2]);?></td>
        <td class="price" colspan="<?php if ($admin == true) echo '1'; else echo '2';?>"><?php echo $order[3];?></td>
        <?php if ($admin == true)
        {?>
        <td class="user-tab"><?php echo $order[1];?></td>
        <td class="del-button"><a href="delete-order/<?php echo $order[0]?>" alt="Supprimer cet article">Supprimer</a></td>
        <?php } ?>
    </tr>
    <?php
    for ($i = 4; $order[$i]; $i++)
    {
        $info = explode(':', $order[$i]);
        $item = get_item($info[0]);?>
        <tr class="order-iterm">
            <td class="picture-tab"><img src="../imgs/<?php echo $item[2].'" alt="'.$item[0];?>"></td>
            <td class="tab-title"><?php echo $item[0]?></td>
            <td class="tab-qtty"><?php echo $info[1];?></td>
            <td class="tab-qtty"><?php echo $item[1];?></td>
        </tr>
    <?php }
    ?>
</table>