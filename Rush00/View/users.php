<?php

    $accounts = get_accounts();
    ?>
    <div class="orders"><table class="order"> <?php
    foreach ($accounts as $user)
    {?>
        <tr class="order-iterm">
            <td class="user"><?php echo $user[0]?></td>
            <td class="del"><a href="../delete-user/<?php echo $user[0];?>" alt="supprimer utilisateur">Supprimer l'utilisateur</td>
        </tr>
    <?php }
    echo '</table></div>'
?>