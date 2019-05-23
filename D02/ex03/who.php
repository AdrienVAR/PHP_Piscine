#!/usr/bin/php
<?php
    date_default_timezone_set("Europe/paris");
    $fp = fopen("/var/run/utmpx", "r");
    $usr = get_current_user();
    while($line = fread($fp, 628))
        $arr[] = unpack("A256user/A4id/A32line/Ipid/Itype/Ltime", $line);
    foreach($arr as $value)
    {
        if($value[type] == 7 && strcmp(trim($value[user]), $usr) == 0)
            echo $value[user]." ".$value[line]."  ".date("M j H:i", $value[time])." \n";
    }
?>