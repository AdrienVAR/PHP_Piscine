<?php
    $login =  $_POST["login"];
    $passwd = $_POST["passwd"];
    $submit = $_POST["submit"];
    $path = "../private/passwd";
    $folder_path = "../private";
    if(!$login || !$passwd || $submit != "OK")
    {
        echo "ERROR\n";
        exit();
    } 
    if(file_exists($path))
    {
        $file = file_get_contents($path);
        $data = unserialize($file);
    }
    else
    {
        if(!file_exists($folder_path))
            mkdir($folder_path, 0755);
        $data = array();
    }
    if($data)
    {
        foreach($data as $key => $value)
        {
            if($value["login"] == $login)
            {
                echo "ERROR\n";
                exit();
            }
        }
    }
    $data[$key + 1]["login"] = $login;
    $data[$key + 1]["passwd"] = hash("sha256", $passwd);
    file_put_contents($path, serialize($data));
    echo "OK\n";
?>