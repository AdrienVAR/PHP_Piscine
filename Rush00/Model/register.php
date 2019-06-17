<?php

session_start();
if (isset($_SESSION['login']))
    header('Location: index');
include("../Model/account_csv.php");

if (isset($_POST['submit']) && $_POST['submit'] == "OK" && isset($_POST['login']) && isset($_POST['passwd']) && isset($_POST['confpasswd']))
{
    $ret = reg_user($_POST['login'], $_POST['passwd'], $_POST['confpasswd']);
    if ($ret == 0)
        header('Location: inscription-succes');
}
else if (isset($_POST['submit']) && $_POST['submit'] == "OK")
    $ret = 3;

$title = "Inscription ";
include_once("../View/head.php");
?>
    <div class="login-form">
        <?php if (isset($ret) && $ret == 1)
                echo '<p class="error-login">Les deux mot de passe ne correspondent pas</p>';
            else if (isset($ret) && $ret == 2)
                echo '<p class="error-login">Cet utilisateur possède déjà un compte</p>';
            else if (isset($ret) && $ret != 0)
                echo '<p>Veuillez remplir tous les champs</p>';?>
        <form method="post" action="register">
            <label for="identifiant">Identifiant: </label><input type="text" name="login"><br />
            <label for="mot de passe">Mot de passe: </label><input type="password" name="passwd"><br />
            <label for="Confirmation MDP">Confirmation MDP: </label> <input type="password" name="confpasswd"><br />
            <input type="submit" name="submit" value="OK">
        </form>
    </div>
    <div class="home-button">
    <a href="../index">Menu principal</a>
    </div>
</body>
</html>