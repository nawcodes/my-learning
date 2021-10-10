<?php 

include 'connect.php';

$id = $_POST['id'];
$name = $_POST['name'];
$nim = $_POST['nim'];
$phone = $_POST['phone'];



$result['message'] = '';

if($name == '') {
    $result['message'] = 'Name is required! to update';
}elseif($nim == '') {
    $result['message'] = 'Nim is required! to update';
}elseif($phone == '') {
    $result['message'] = 'Phone is required! to update';
}else{
    $update = $connect->query("UPDATE personal SET name='{$name}', nim='{$nim}' , number='{$phone}' WHERE id={$id}");
    
    if($update) {
        $result['message'] = 'Success update data';
    }else{
        $result['message'] = 'Failed update data ' . $connect->error;
    }
}


echo json_encode($result);




?>