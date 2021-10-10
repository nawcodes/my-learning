<?php 

include 'connect.php';

$result = [
    'message' => '',
    'data'    => [],
];


$query = $conn->query("SELECT * FROM personal");

while($fetch = $query->fetch_assoc() ) {
    if($fetch != '') {
        $result['message'] = '200 ok!';
        $result['data'][] = $fetch;
    }
}


echo json_encode($result);




?>