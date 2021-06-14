<!DOCTYPE html>
<html lang="en">
<title>Car Rental:-dashboard</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style>
    * {
        font-family: "Noto Sans TC", sans-serif;
    }

    .cardimage {
        border-radius: 10%;
        background-image: linear-gradient(120deg, rgba(246, 212, 101, 0.9) 0%, rgba(253, 160, 133, 0.9) 100%);
    }

    .capitalize {
        text-transform: capitalize;
    }
</style>

<body class="bg-light">
    <div class="card-group container-fluid">
        <div class="w-100 d-flex flex-wrap">
            <?php foreach ($cars as $car) : ?>
                <div class="card col-5 m-5 p-5 rounded-3 border-0 shadow-sm">
                    <div class="cardimage">
                        <img src="<?php echo base_url() . "uploads/" . $car->carimage ?>" draggable='false' alt="<?= $car->name ?>" class="img-responsive">
                    </div>
                    <h2 class="card-title text-center capitalize"> <?= $car->name ?></h2>
                    <div class="card-body m-3 p-2">
                        <h4 class="card-title text-center capitalize"><?= $car->model ?></h4>
                        <p class="card-text text-center"><span class="card-title text-center fs-2 mx-2 fw-bold capitalize"> $<?= $car->price ?></span> <?= $car->seats ?> Seats
                        </p>
                        <p class="card-text text-center"> <?php
                                                            if ($car->hired) {
                                                                echo "<span class='p-2 m-1 btn btn-primary w-50'>Hired</span>";
                                                            } else {
                                                                echo  "<span class='p-2 m-1 btn btn-warning w-50'>Hire</span>";
                                                            } ?></p>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>