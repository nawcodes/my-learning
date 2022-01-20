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
    <div class="d-flex flex-row-reverse bd-highlight">
        <a href="<?php echo base_url('PrintOut/convertPdf') ?>" class="btn btn-primary">
            Download PDF
        </a>
    </div>

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
            <tr>
                <th scope="row">1</th>
                <td scope="row">20180050049</td>
                <td scope="row"><img src="https://via.placeholder.com/50" alt=""></td>
                <td scope="row">Rifal Nurjamil</td>
                <td scope="row">rifalnurjamil@gmail.com</td>
                <td scope="row">085940775599</td>
            </tr>
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