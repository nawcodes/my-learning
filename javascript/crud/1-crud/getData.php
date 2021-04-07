<?php 

    include 'connect.php';

    $queryResult = $connect->query('SELECT * FROM personal');
   
    $result = [];
    while( $fetch = $queryResult->fetch_assoc()) {
        $result[] = $fetch;
    }

    var_dump(json_encode($result));


?>