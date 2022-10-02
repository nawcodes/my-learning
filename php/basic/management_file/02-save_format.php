<?php 

$user = [
    [
        'nama' => 'Tony',
        'nrp' => '101516049'
    ],
    [
        'nama' => 'Rifal',
        'nrp' => '1015160129'
    ],
    [
        'nama' => 'Tony',
        'nrp' => '101516021'
    ],
    [
        'nama' => 'Tony',
        'nrp' => '101516031'
    ],
    [
        'nama' => 'Tony',
        'nrp' => '101516051'
    ]
];


// 1 . Using serialize
// echo serialize($user);
// convert string
// var_dump(serialize($user));
// $data = serialize($user);
// save
// file_put_contents('file/02-content.txt', $data);
// get data origin
// $data = file_get_contents('file/02-content.txt');

// echo $data ;

// convert serialize($user) to array

// $dataArr = unserialize($data, );

// var_dump($dataArr);


// 2 . using json_encode($)

$arrJson = json_encode($user);
// file_put_contents('file/02-save-format.json', $arrJson);

// $stringToObject = json_decode($arrJson);
$getJson = file_get_contents('file/02-save-format.json');
$convert = json_decode($getJson);

var_dump($convert);

?>