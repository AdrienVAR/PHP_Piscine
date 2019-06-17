<?php
$path = "../files/clothes.csv";
$folder_path = "../files/";
$data = array();
$data[0] = "name,price,img,ID,categorie";

if(file_exists($folder_path))
{
    file_put_contents("../files/clothes.csv", $data);
}
else
{
    if(!file_exists($folder_path))
        mkdir($folder_path, 0755);
    file_put_contents($path, $data);
}

$path = "../files/orders.csv";
$folder_path = "../files/";
$data = array();
$data[0] = "id,login,time,price,item:quantity,...";

if(file_exists($folder_path))
{
    file_put_contents("../files/orders.csv", $data);
}
else
{
    if(!file_exists($folder_path))
        mkdir($folder_path, 0755);
    file_put_contents($path, $data);
}

$path = "../files/accounts.csv";
$folder_path = "../files/";
$data = array();
$data[0] = "admin:f45129cf05a17b10f5edd115af3b81e6fc1fb4b16fc9437ad1a632a3182426e330641073d6813c00bd056d7954ecb0c1004e267926cc64b307ff58fc365de758:admin";

if(file_exists($folder_path))
{
    file_put_contents("../files/accounts.csv", $data);
}
else
{
    if(!file_exists($folder_path))
        mkdir($folder_path, 0755);
    file_put_contents($path, $data);
}

?>