<?php

function get_accounts()
{
    $row = 1;
    if (($handle = fopen($_SERVER['DOCUMENT_ROOT']."/files/accounts.csv", "r")) !== FALSE) {
        $data = array();
        while (($tmp = fgetcsv($handle, 1000, ":")) != false)
            $data[] = $tmp;
        fclose($handle);
        return ($data);
    }
    return (NULL);
}

function put_accounts($accounts)
{
    $fd = fopen($_SERVER['DOCUMENT_ROOT']."/files/accounts.csv", "w");

    foreach ($accounts as $fields) {
        fputcsv($fd, $fields, ":");
    }
    fclose($fd);
}

function add_user($login, $passwd)
{
    if (($accounts = get_accounts()) != NULL)
    {
        $count = count($accounts);
        $accounts[$count] = array($login, $passwd);
        put_accounts($accounts);
    }
}

function auth($login, $passwd)
{
    $accounts = get_accounts();
    foreach ($accounts as $value)
        if ($value[0] == $login)
        {
            if (hash('whirlpool', $passwd) == $value[1])
                return (true);
            return (false);
        }
    return (false);
}

function reg_user($login, $passwd, $confpasswd)
{
    $accounts = get_accounts();
    foreach ($accounts as $value)
        if ($value[0] == $login)
        {
            return (2);
        }
    if ($passwd != $confpasswd)
        return (1);
    add_user($login, hash('whirlpool', $passwd));
    auth($login, $passwd);
    return (0);
}

function isadmin($login)
{
    $accounts = get_accounts();
    foreach ($accounts as $value)
        if ($value[0] == $login)
        {
            if (isset($value[2]) && $value[2] == "admin")
                return (true);
            else
                return (false);
        }
    return (false);
}

function del_account($login)
{   
    $accounts = get_accounts();
    foreach ($accounts as $key => $value)
        if ($value[0] == $login)
        {
            array_splice($accounts, $key, 1);
            if (($fd = fopen("../files/accounts.csv", "w")) == NULL)
                return (1);
            foreach ($accounts as $fields)
                fputcsv($fd, $fields, ":");
            fclose($fd);
            return (0);
        }
    return (1);
}
?>