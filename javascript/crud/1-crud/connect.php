<?php 

$host   = 'localhost';
$user   = 'root';
$pass   = '';
$db     = 'js-crud';

$connect = new mysqli($host, $user, $pass, $db);

if(!$connect) {
    echo 'db not connected';
}


?>