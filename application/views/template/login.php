 <?php
if($this->session->userdata('email')!=null){
header('Location:javascript:history.go(-1)');
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: "Noto Sans TC", sans-serif;
        }

        .formCont {
            background-color: #0C113E;
            margin: auto;
        }

        input {
            margin-top: 2em;
        }

        div.error {
            color: red;
        }

        a:hover {
            text-decoration: none;
        }

        .btn-warning {
            margin: auto !important;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="row">
            <div class="formCont col-lg-6 rounded-3 p-5 mt-5">
                <h3 class="title text-center text-white">Login page</h3>
                <form action="<?= base_url('MyApp/getLoginInfo'); ?>" autocomplete="off" method="post" class="mt-3 p-3">
                    <div class="social-input-containers px-5 py-2">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email') ?>" />
                        <?= form_error('email') ?>
                    </div>
                    <div class="social-input-containers px-5 py-2">
                        <input type="password" name="pswd" class="form-control" placeholder="Password" value="<?= set_value('pswd') ?>" />
                        <?= form_error('pswd') ?>
                    </div>
                    <input type="submit" value="Login" class="btn btn-primary px-5 mx-5" />
                    <?php
                    if(isset($error)){
                        echo $error;
                    }
                    ?>
                    <div class="">
                        <p class="py-3 px-5"><a href="<?= base_url('MyApp/passwordreset'); ?>" class="text-white">Password Reset</a></p>
                    </div>
                    <?php
                    echo $this->session->flashdata('error')
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>

</html>