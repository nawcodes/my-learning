<?php 

include 'connect.php';

$id = $_POST['id'];

$rowResult = [];

$query = $conn->query("SELECT * FROM personal WHERE id={$id}");

$fetchRow = $query->fetch_assoc();

$rowResult = $fetchRow;

echo json_encode($rowResult);

?>