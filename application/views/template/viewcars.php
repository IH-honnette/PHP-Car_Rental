<?php

// if(empty($_SESSION['userId'])){
//     header('location: ./login.php');   
//   }

// if($_SESSION['role'] !== "Administrator"){
// 	header('location: ./home.php');
// }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>View cars</title>
    <style>
        thead {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container">
        <table class="table-responsive table-bordered table-hover table-striped table-inverse table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Model</th>
                    <th>No of seats</th>
                    <th>Hire price</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cars_info as $car) : ?>
                    <tr>
                        <td><?= $car->name ?></td>
                        <td><?= $car->model ?></td>
                        <td><?= $car->seats ?></td>
                        <td><?= $car->price ?></td>
                        <td><a href="<?= base_url('MyApp/edit_car/' . $car->carId); ?>">Edit</a></td>
                        <td><a onclick="return confirm('Confirm the deletion of this car?')" href="<?= base_url('MyApp/delete_car/' . $car->carId); ?>">Remove</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
    </div>
</body>

</html>