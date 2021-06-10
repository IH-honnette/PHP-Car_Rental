<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
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
            <th>Email</th>
            <th>Phone Number</th>
            <th colspan="2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user):
            $encrypt =$this->encryption->encrypt($user->userId);
                 $encrypted=base64_encode($encrypt );?>
        <tr>
            <td><?= $user->name ?></td>
            <td><?= $user->email ?></td>
            <td><?= $user->phone ?></td>
            <td><a href="<?= base_url('MyApp/edit_user/'.$encrypted);?>">Edit</a></td>
            <td><a onclick="return confirm('Are you sure you want to delete this user?')" href="<?= base_url('MyApp/delete_user/'.$encrypted);?>">Remove</a></td>
        </tr>
        <?php endforeach;?>
    </tbody>
    
    </table>
    </div>
</body>
</html>