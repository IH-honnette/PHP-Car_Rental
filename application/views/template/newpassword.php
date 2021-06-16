<?php
if (empty($_GET['auth']) || empty($_GET['token'])) {
    header("Location:" . base_url('MyApp/index') . "");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>reset password</title>
</head>
<style>

</style>

<body>

    <form class="col-lg-5 mx-auto my-5 p-5 shadow-sm bg-white" action="<?= base_url("usersController/newpassword?auth=" . $_GET['auth'] . "&token=" . $_GET['token'] . "") ?>" method="post">
        <h2 class="my-4">Change Password</h2>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label fs-5" for="id1">New Password</label>
            <input type="text" name="password" id="id1" value="<?= set_value('password') ?>" class="form-control" placeholder="new password." />
            <?= form_error('password') ?>
            <label class="form-label fs-5" for="id2">Confirm Password</label>
            <input type="text" name="password-confirm" id="id2" value="<?= set_value('password-confirm') ?>" class="form-control" placeholder="confirm new password." />
            <?= form_error('password-confirm') ?>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Change Password</button>
    </form>
</body>

</html>