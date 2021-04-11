<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Hello Crud</title>
  </head>
  <body>
    <div class="container mb-5">
      <h1 class="">Javascript Crud</h1>
      <small class="bg-primary rounded text-white p-2">With Ajax</small>
    </div>


    <div class="container">
      <div class="row">
      <div id="message"></div>
        <input type="hidden" name="id">
        <div class="col">
          <label for="">Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="col">
          <label for="">Nim</label>
          <input type="number" class="form-control" name="nim">
        </div>
        <div class="col">
          <label for="">Phone</label>
          <input type="number" class="form-control" name="phone">
        </div>

        <div class="col mt-4">
          <button id="btn-add" class="btn btn-primary form-control" onclick="insertData()">Add data</button>
          <button id="btn-update" class="btn btn-primary form-control" onclick="updateData()">Update</button>

        </div>
      </div>
    </div>

    <div class="container mt-5">
      <table class="table">
        <thead>
          <tr>
            <th>id</th>
            <th>Nim</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Options</th>

          </tr>
        </thead>
        <tbody id="data">
          
        </tbody>
      </table>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script
			  src="https://code.jquery.com/jquery-3.6.0.min.js"
			  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
			  crossorigin="anonymous"></script>
    <!-- jquery ajax -->
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>
    

    <script src="js/script.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
