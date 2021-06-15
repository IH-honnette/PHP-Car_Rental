<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
        .float-right{float:right;
        margin-right: 10%;margin-top: 2%;
        }
        .users{
            text-align:center;
        }
    </style>
</head>
<body>
    
    <?php
    if ($this->session->userdata('email')==null) {
   redirect(base_url("MyApp/login"));
    }
    ?>
     
     <div class="container table-responsive">
    
    <table data-toggle="table" class="table table-striped table-hover table-bordered table-sm text-nowrap" id="myTable">
    <h3 class="users">List Of Users</h3>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Update</th>
            <th>Delete</th>
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
    <a href="<?=base_url('MyApp/get_pdf');?>" class="btn btn-primary p-4  float-right">Get Users PDF</a>
</body>
</html>