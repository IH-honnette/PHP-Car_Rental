<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <title>View users</title>
    <style>
        thead {
            background-color: #000;
            color: #fff;
        }
        .float-right{float:right;
        margin-right: 10%;margin-bottom: 2%;
        }
        .users{
            text-align:center;
        }
    </style>
</head>

<body>
    <?php
    if ($this->session->userdata('email') == null) {
        redirect(base_url("MyApp/login"));
    }
    ?>
     <a href="<?=base_url('MyApp/get_pdf');?>" class="btn btn-primary p-4  float-right">Get Users PDF</a>
     
    <div class="container">
    <h3 class="users">List Of Users</h3>
    <table class="table-responsive table-bordered table-hover table-striped table-inverse table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user):?>
        <tr>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->phone ?></td>
            <td><a href="<?= base_url('MyApp/edit_user/'.$user->userId);?>">Edit</a></td>
            <td><a onclick="return confirm('Are you sure you want to delete this user?')" href="<?= base_url('MyApp/delete_user/'.$user->userId);?>">Remove</a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    </table>
    </div>
     
</body>

</html>