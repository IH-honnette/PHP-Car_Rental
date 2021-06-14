<?php
//add sessions here 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>  
      welcome 
  </title> 
  <style type="text/css">
body {
    background-color: #fff;
    margin: 40px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
}

a {
    color: #003399;
    background-color: transparent;
    font-weight: normal;
}

h1 {
    color: #444;
    background-color: transparent;
    border-bottom: 1px solid #D0D0D0;
    font-size: 19px;
    font-weight: normal;
    margin: 0 0 14px 0;
    padding: 14px 15px 10px 15px;
}

#body {
    margin: 0 15px 0 15px;
}
.header{
    background-color: #000;
    text-align: center;color: #fff;
    font-size: 22px;
    font-weight: 600;
    padding: 1em;
}
#container {
    margin: 10px;
    border: 1px solid #D0D0D0;
    box-shadow: 0 0 8px #D0D0D0;
}
</style>
</head>
<body>
<div class="bg-dark header">Car Rental System</div>
<div id="container">
<h1>Your Application is well received!</h1>
<div id="body">

    <p><a href="<?= base_url('MyApp/login')?>">login here</a> to continue</p>
</div>
</div> 
</body>  
</html>