<?php

session_start();
include_once($_SERVER['DOCUMENT_ROOT']."/Model/account_csv.php");

if (isset($_SESSION['login']))
    header('Location: index');
if ($_POST['submit'] == "OK" && isset($_POST['login']) && $_POST['login'] != "" && isset($_POST['passwd']) && $_POST['passwd'] != "") 
{
    if ((auth($_POST['login'], $_POST['passwd'])) == true)
    {
        $_SESSION['login'] = $_POST['login'];
        header('Location: index');
    }
    else
        $erreur = true;
}

$title = "Connexion ";
include_once("../View/head.php");
?>
    <div class="login-form">
       <?php if (isset($erreur) && $erreur == true) {echo '<p class="error-login">Mot de passe ou nom d\'utilisateur incorrect</p>';unset($erreur);}?>
        <form method="post" action="login">
            <label for="identifiant">Identifiant: </label><input type="text" name="login"><br />
            <label for="mot de passe">Mot de passe: </label><input type="password" name="passwd"><br />
            <input type="submit" class="submit" name="submit" value="OK">
        </form>
    </div>
    <div class="home-button">
      <a href="../index">Menu principal</a>
    </div>
</body>
</html>