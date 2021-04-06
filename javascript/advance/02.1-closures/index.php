<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2.1 Closures</title>
</head>

<body>
    <h1>2.1 Closures</h1>
    <small><b>Closure merupakan sebuah function yang memiliki akses ke parent scopenya. meskipun parent scope-nya tersebut sudah di eksekusi.</b></small>

    <ul>
        <li>lexical scope
            <p><small>ketika function memiliki local variable dan memiliki function yang lainya (function tersebut akan di sebut inner function[closure]) ketika mereka mencari variable tersebut sampai ke global ketika tidak ada.</small></p>
            <p>alasan ?
            <ol>
                <li>untuk membuat function factories</li>
                <li>untuk membuat seolah olah kita membuat private method</li>
            </ol>
            </p>
        </li>
    </ul>

    <script src="script.js"></script>
</body>

</html>