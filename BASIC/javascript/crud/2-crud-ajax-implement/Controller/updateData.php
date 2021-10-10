<?php 

include 'connect.php';



    $id     = $_POST['id'];
    $name   = $_POST['name'];
    $nim    = $_POST['nim'];
    $email  = $_POST['email'];
    $phone  = $_POST['phone'];
    $image  = $_POST['image'];
    $about  = $_POST['about'];


$result['message'] = '';

if($name == '') {
    $result['message'] = 'Name is required';
}elseif($nim == '') {
    $result['message'] = 'Nim is required';
}elseif($email == '') {
    $result['message'] = 'Email is required';
}elseif($image == '') {
    $result['message'] = 'Image is required';
}elseif($about == '') {
    $result['message'] = 'About is required';
}else{
    $query = $conn->query("UPDATE personal SET name='{$name}', nim='{$nim}' , email='{$email}', phone='{$phone}' , image='{$phone}' ,  about='{$about}' WHERE id={$id}");
    
    if($query) {
        $result['message'] = 'success update data';
    }else{
        $result['message'] = 'failed update data ' . $conn->error;
    }
}

echo json_encode($result);






?>