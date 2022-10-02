<?php 
$todo = [];
// get data if(exist)
if(file_exists('file/todo.json')) {
    $getData = file_get_contents('file/todo.json');
    $todo = json_decode($getData, true);
}

var_dump($todo);

if(isset($_POST['name'])) {
        $name = $_POST['name'];
        $todo[] = [
            'name' => $name,
            'status' => 0
        ];
        $dataJson = json_encode($todo);
        file_put_contents('file/todo.json', $dataJson);
        header('Location:index.php');
}


if(isset($_GET['status'])) {
    $todo[$_GET['key']]['status'] = $_GET['status'];

    $updateJson = json_encode($todo);

    file_put_contents('file/todo.json', $updateJson);
    header('Location:index.php');
}

if(isset($_GET['hapus'])) {
    unset($todo[$_GET['key']]);
    $updateJson = json_encode($todo);
    file_put_contents('file/todo.json', $updateJson);
    header('Location:index.php');
}

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

    <h1>Todo Management App</h1>

    <form method="post">
        <input type="text" name="name">
        <button type="submit">Save</button>
    </form>

    <ul>
        <?php foreach($todo as $key => $row) :  ?>
        <li>
            <input type="checkbox" name="check" onclick="window.location.href = 'index.php?status=<?= $row['status'] == 1 ? 0 : 1 ?>&key=<?= $key ?>'" <?= $row['status'] == 1 ? 'checked' : '' ?>>
            <label for=""><?= $row['name'] ?></label>
            <a href="index.php?hapus=1&key=<?= $key ?>" onclick="return confirm('Yakin mau di hapus?')">Delete</a>
        </li>
        <?php endforeach; ?>
    </ul>

</body>

</html>