<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

// init
$client = new Client();
// requst
$response = $client->request('GET', 'http://www.omdbapi.com/', [
    'query' => [
        'apikey' => '93670083',
        's'      => 'transformers'
    ]
]);

$result =  json_decode($response->getBody()->getContents(), true);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php foreach ($result['Search'] as $row) : ?>
        <ul>
            <li>Title : <?= $row['Title'] ?></li>
            <li>Years : <?= $row['Year'] ?> </li>
            <li>Poster: <img src="<?= $row['Poster'] ?>" alt=""></li>
        </ul>
    <?php endforeach; ?>

</body>

</html>