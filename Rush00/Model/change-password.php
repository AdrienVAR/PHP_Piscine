<div class="login-form"><?php

if (isset($_POST['submit']) && $_POST['submit'] == "OK" && isset($_POST['oldpw']) && $_POST['oldpw'] != "" && isset($_POST['newpw']) && $_POST['newpw'] != "")
{
    $accounts = get_accounts();
    foreach ($accounts as $k => $value)
    {
        if ($value[0] == $_SESSION['login'])
        {
            if ($value[1] == hash('whirlpool', $_POST['oldpw']))
            {
                $accounts[$k][1] = hash('whirlpool', $_POST['newpw']);
                put_accounts($accounts);
                ?>
                <div class="action success">Mot de passe changé. <a href="../index">Menu principal</a></div>
                <?php
                $status = 0;
                break;
            }
            else
            {
                ?>
                <div class="action error">Ancien mot de passe erroné.</div>
                <?php
                $status = 1;
                break;
            }
        }
    }
}
else if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
    $status == 1;
?>
    <div class="action error">Merci de remplir tous les champs.</div>
<?php
}
?>
        <form method="post" action="change-password" <?php if (isset($status) && $status == 0) echo 'style="display: none;"';?>>
            <label for="Ancien_MDP">Ancien MDP: </label><input type="password" name="oldpw"><br />
            <label for="Nouveau_MDP">Nouveau MDP: </label><input type="password" name="newpw"><br />
            <input type="submit" class="submit" name="submit" value="OK">
        </form>
    </div>
    <div class="home-button">
    <a href="../index">Menu principal</a>
</div>
</body>
</html>
</body></html>