<?php 

include 'connect.php';


$data = [
    'name' => $_POST['name'],
    'nim' => $_POST['nim'],
    'email' => $_POST['email'],
    'phone' => $_POST['phone'],
    'image' => $_POST['image'],
    'about' => $_POST['about']
];

$result['message'] = '';

if($data['name'] == '') {
    $result['message'] = 'Name is required';
}elseif($data['nim'] == '') {
    $result['message'] = 'Nim is required';
}elseif($data['email'] == '') {
    $result['message'] = 'Email is required';
}elseif($data['image'] == '') {
    $result['message'] = 'Image is required';
}elseif($data['about'] == '') {
    $result['message'] = 'About is required';
}else{
    $query = $conn->query("INSERT INTO personal (name, nim, email, phone, image, about) VALUES ('".$data['name']."','".$data['nim']."','".$data['email']."','".$data['phone']."','".$data['image']."','".$data['about']."')");
    
    if($query) {
        $result['message'] = 'success insert data';
    }else{
        $result['message'] = 'failed insert data ' . $conn->error;
    }

}

echo json_encode($result);






?>