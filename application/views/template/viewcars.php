<!DOCTYPE html>
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
   
    <!-- <link rel="stylesheet" href="  https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
 
    <script>
     $(document).ready( function () {
    $('#myTable').DataTable();
     });
    </script>
    <style>
        thead {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container table-responsive">
    <table data-toggle="table" class="table table-striped table-hover table-bordered table-sm text-nowrap" id="myTable">
    <thead>
        <tr>
            <th class="th-sm">name</th>
            <th class="th-sm">model</th>
            <th class="th-sm">seats</th>
            <th class="th-sm">price</th>
           
            <!-- <th class="th-sm" colspan="2">action</th> -->
        </tr>
    </thead>
    <tbody>
    <?php foreach ($cars as $car):?>
        <tr>
            <td><?= $car->name ?></td>
            <td><?= $car->model ?></td>
            <td><?= $car->seats ?></td>
            <td><?= $car->price ?></td>
            <!-- <td><a href="">Edit</a></td>
            <td><a onclick="return confirm('Are you sure you want to delete this car?')" href="">Remove</a></td> -->
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>
</div>
</body>
</html>

<?php

/***
 * fore editing
 * <?= base_url('MyApp/edit_car/'.$car->carId);?>
 * for deleting a car
 * <?= base_url('MyApp/delete_car/'.$car->carId);?>
 */
?>