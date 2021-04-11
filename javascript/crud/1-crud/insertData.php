<?php 

include 'connect.php';


$name = $_POST['name'];
$nim = $_POST['nim'];
$phone = $_POST['phone'];



$result['message'] = '';

if($name == '') {
    $result['message'] = 'Name is required!';
}elseif($nim == '') {
    $result['message'] = 'Nim is required!';
}elseif($phone == '') {
    $result['message'] = 'Phone is required!';
}else{
    $insert = $connect->query("INSERT INTO personal (name,nim,number) VALUES ('".$name."','".$nim."','".$phone."')");
    
    if($insert) {
        $result['message'] = 'Success insert data';
    }else{
        $result['message'] = 'Failed insert data ' . $connect->error;
    }
}


echo json_encode($result);




?>