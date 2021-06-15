<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>reset password</title>
</head>
<style>

</style>

<body>

    <form class="col-lg-5 mx-auto my-5 p-5 shadow-sm bg-white" action="<?= base_url('MyApp/ValidateEmail'); ?>" method="post">
        <h2 class="my-4">Password Reset</h2>
        <p class='fs-6 pt-1 pb-4'>inorder to continue to password reset,we would need to verify some credentials.Please enter your email to verify your email address</p>
        <!-- Email input -->
        <div class="form-outline mb-4">
            <label class="form-label fs-5" for="form1Example1">Email address</label>
            <input type="email" name="email" value="<?= set_value('email') ?>" class="form-control" placeholder="your email."  required />
            <?= form_error('email') ?>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block">Verify Email</button>
    </form>
</body>

</html>

<?php

?>