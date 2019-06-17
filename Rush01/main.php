<?php
session_start();
include('Map.class.php');
include('Ork.class.php');
include('Meteo.class.php');

$map = new Map;
if (!isset($_SESSION['x1']))
{
    $_SESSION['x1'] = 10;
    $_SESSION['y1'] = 10;
    $_SESSION['dir'] = "r";
}

$ship = new Ork("OrkP1", $_SESSION['x1'],$_SESSION['y1'], 'r');
$ship2 = new Ork("OrkP2", 140,90, 'l');
$met1 = new Meteo(50,50);
$met2 = new Meteo(61,60);
$met3 = new Meteo(51,57);
$met4 = new Meteo(30,57);
$met5 = new Meteo(95,30);


$map->insert_ship($ship);
$map->insert_ship($ship2);
$map->insert_meteorites($met1);
$map->insert_meteorites($met2);
$map->insert_meteorites($met3);
$map->insert_meteorites($met4);
$map->insert_meteorites($met5);
// $map->move_ship($ship2, 10);
// $map->move_ship($ship, 30);
// $map->rotate_ship($ship2, "f");
if(isset($_GET['direction']))
{
    $map->rotate_ship($ship, $_GET['direction']);
    $map->tir($ship);
    $map->move_ship($ship, $_GET['nbcase']);
    $_SESSION['x1'] = $ship->x;
    $_SESSION['y1'] = $ship->y;
    $_SESSION['dir'] = $ship->dir;
}

?>

<html>
<link href="/resources/map.css" rel="stylesheet">
<head>
    <<div class="item">
      <img src="https://i0.wp.com/homido.com/wp-content/uploads/2015/12/DeepSpaceBattle_poster_1920x1080.jpg?fit=1500%2C750&ssl=1">
      <figcaption class="caption">Awesome Starships Battles II </figcaption>
    </div>  
</head>
<body>

    <?php if($_SESSION["loggued_on_user"]) :echo "Welcome, ".$_SESSION["loggued_on_user"];?>
    <form action="loginchat.php" method="POST">
    <input type="submit" name="submit" value="Aller au Lobby" />
            </form><?php
    ?>
    <div class="button_ship">
    <form method="get" action="main.php">
                <label for="nom_du_joueur">Player1: </label><br />
                <label for="direction">Direction :</label><input type="radio" name="direction" value="f" />haut <input type="radio" name="direction" value="b" />bas <input type="radio" name="direction" value="l" /> gauche <input type="radio" name="direction" value="r" /> droite <br />
                <label for="image">Nombre de cases: </label><input type="text" name="nbcase" value="nbcases 0/30"><br />
                <input type="submit" class="submit" name="submit" value="OK">
    </form>
    </div>
    <?php else:?>
        <form action="login.php" method="POST">
                Id Joueur: <input type="text" name="login" />
                <br />
                Mot de passe: <input type= "password" name="passwd"/>
                <br />
                <input type="submit" name="submit" value="OK" />
            </form>
            <a href="create.html">Créé un compte</a>
            <a href="modif.html">Modifier le mot de passe</a>
<?php endif;?>
<div style="display:inline-block">
<table>

<?php
foreach ($map->map as $y){
    echo "<tr>";
    foreach ($y as $x)
    {
       echo "<td class='".$x."'></td>";
    }
    echo "</tr>";
}
echo "</table></div>";
?>
</table>
</div>

<?php
foreach ($map->ships as $ship)
{
    $lifebar = $ship->pdc/$ship->pdcmax*100;
    $boucmax = $ship->bouc/$ship->boucmax*100;
    $maxpuiss = $ship->pp/$ship->ppmax*100;
    $maxman = $ship->man/$ship->manmax*100;
   
    echo "<div class='info'>";
    
    echo "<p>".$ship->name."</p>\n";
    echo "<p>Position : ".($ship->x+1).", ".(150 - $ship->y)."</p>\n";
    echo "<p>Points de coque: ".$ship->pdc."</p>\n";
    echo "<progress max='100' value='$lifebar'></progress>";
    echo "<p>Points de bouclier: ".$ship->bouc."</p>\n";
    echo "<progress max='100' value='$boucmax'></progress>";
    echo "<p>Points de puissance: ".$ship->pp."</p>\n";
    echo "<progress max='100' value='$maxpuiss'></progress>";
    echo "<p>Points de puissance: ".$ship->pp."</p>\n";
    echo "<progress max='100' value='$maxpuiss'></progress>";
    echo "<p>Manoeuvrabilité: ".$ship->pp."</p>\n";
    echo "<progress max='100' value='$maxman'></progress>";
    echo "</div>";
}
?>
</div>
</body>
</html>