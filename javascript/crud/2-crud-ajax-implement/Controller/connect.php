<?php 

$host     = 'localhost';
$username = 'root';
$password = '';
$db       = 'js-crud';


$conn = new mysqli($host, $username , $password , $db);

if(! $conn) {
    echo 'error' . $conn->error;
}

?>
