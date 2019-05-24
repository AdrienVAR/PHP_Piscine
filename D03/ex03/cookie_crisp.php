<?php
$action = $_GET["action"];
$cookie_name = $_GET["name"];
$value = $_GET["value"];
switch($action)
{
    case "set":
        setcookie($cookie_name, $value, time() + 86400);
        break;
    case "get":
        if($_COOKIE[$cookie_name])
            echo $_COOKIE[$cookie_name]."\n";
        break;
    case "del":
        setcookie($cookie_name, "", time() - 3600);
        break;
}
?>