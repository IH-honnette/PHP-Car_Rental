<?php

if ($this->session->userdata('email') == null) {
    redirect(base_url('MyApp/login'));
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <title>View cars</title>
    <style>
        thead {
            background-color: #000;
            color: #fff;
        }
    </style>
</head>

<body>
    <div class="container table-responsive">
        <?php if ($this->session->userdata('roleId') != 2) : ?>
            <table data-toggle="table" class="table table-striped table-hover table-bordered table-sm text-nowrap" id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Model</th>
                        <th>No of seats</th>
                        <th>Hire price</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cars_info as $car) : ?>
                        <tr>
                            <td><?= $car->name ?></td>
                            <td><?= $car->model ?></td>
                            <td><?= $car->seats ?></td>
                            <td><?= $car->price ?></td>
                            <td><a href="<?= base_url('MyCars/edit_car/' . $car->carId); ?>">Edit</a></td>
                            <td><a onclick="return confirm('Confirm the deletion of this car?')" href="<?= base_url('MyCars/delete_car/' . $car->carId); ?>">Remove</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php else : ?>
            <table data-toggle="table" class="table table-striped table-hover table-bordered table-sm text-nowrap" id="myTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Model</th>
                        <th>No of seats</th>
                        <th>Hire price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cars_info as $car) : ?>
                        <tr>
                            <td><?= $car->name ?></td>
                            <td><?= $car->model ?></td>
                            <td><?= $car->seats ?></td>
                            <td><?= $car->price ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>

            </table>
        <?php endif; ?>

    </div>
</body>

</html>