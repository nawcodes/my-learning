<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List All</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        * {
            font-family: 'Poppins', 'Helvetica Neue', Helvetica, Arial, sans-serif;
        }

        table {
            width: 100%;
        }

        .gray {
            background-color: lightgray;
        }

        .center {
            text-align: center;
            font-size: 0.8rem;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <td>
                <strong>Management C R U D App</strong>
                <br>
                Find: list all data
            </td>
            <td align="right">
                <br>
                <strong>2022, 22 mei</strong>
            </td>
        </tr>
    </table>
    <table>
        <thead class="gray">
            <tr>
                <th scope="col">#</th>
                <th scope="col">UUID</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </thead>
        <tbody class="center">
            <?php $numb = 1;
            foreach ($data as $d) :  ?>
                <tr>
                    <th scope="row"><?= $numb++ ?></th>
                    <td scope="row"><?= $d['uuid'] ?></td>
                    <?php if (file_exists(FCPATH . '/assets/image/' . $d['image'])) :  ?>
                        <?php 
                            $type = pathinfo(FCPATH . '/assets/image/' . $d['image'], PATHINFO_EXTENSION);    
                        ?>
                        <td scope="row"><img src="data:image/<?= $type ?>;base64,<?php echo base64_encode(file_get_contents(FCPATH . "/assets/image/" . $d['image'])) ?>" width='50' /></td>
                    <?php else : ?>
                        <td scope="row">no image</td>
                    <?php endif; ?>
                    <td scope="row"><?= $d['name'] ?></td>
                    <td scope="row"><?= $d['email'] ?></td>
                    <td scope="row"><?= $d['phone'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot class="gray">
            <tr>
                <th scope="col">#</th>
                <th scope="col">UUID</th>
                <th scope="col">Photo</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
            </tr>
        </tfoot>
    </table>

</body>

</html>