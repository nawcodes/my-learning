<?php 

include 'connect.php';

$id = $_POST['id'];

$result['message'] = '';

$delete = $connect->query("DELETE FROM personal WHERE id=${id}");

if($delete) {
    $result['message'] = 'Data deleted'; 
}else {
    $result['message'] = 'Failed Delete Data'; 
}


echo json_encode($result['message']);  


?>