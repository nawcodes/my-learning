<?php 

include 'connect.php';

$id = $_POST['id'];

$result = [];

$get = $connect->query("SELECT * FROM personal WHERE id={$id}");
$fetch = $get->fetch_assoc();
$result = $fetch;


echo json_encode($result);

?>