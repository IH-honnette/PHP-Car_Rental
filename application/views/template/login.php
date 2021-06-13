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
body{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    background-color: gray;
}
.formCont{
background-color:#0C113E;
margin:10em 20em ;
height:20em;
}
input{
    margin-top: 2em;
}
div.error{
    color: red;
}
  </style>
</head>
<body>
<div class="container">
    <div class="row">
    <div class="formCont col-lg-6">
            <form action="<?=base_url('MyApp/getLoginInfo');?>"  autocomplete="off" method="post" class="mt-3">
                <h3 class="title text-center text-primary">Login page</h3>
                <div class="social-input-containers"> 
                <input type="email" name="email" class="form-control" placeholder="Email" value="<?= set_value('email')?>"  />
                <?= form_error('email')?>
               </div>
                <div class="social-input-containers"> 
                <input type="password" name="pswd" class="form-control" placeholder="Password" value="<?= set_value('pswd')?>" />
                <?= form_error('pswd')?>
                </div>
                <div class="bg-success">
                <?php
                if(isset($error)){
                    echo $error;
                }
                ?>
                </div>
                <input type="submit" value="Login" class="btn btn-primary" />
            </form>
        </div>
    </div>
</div>
</body>
</html>