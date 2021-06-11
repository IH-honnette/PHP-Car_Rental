<!DOCTYPE html>
<html lang="en">

<head>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    img {
      float: right;
      top: 0;
    }

    div.container div {
      float: left;
    }

    div.image {
      position: absolute;
      right: 0;
      /* background: blue; */
      top: 40px;
    }
  </style>
  <title>Home page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
  <div class="container col-9 m-auto bg-white p-4 my-5 relative">
    <h1 class="fs-1 p-4 m-3">Car Rental App Online</h1>
    <div class="container">
      <div class="col-6 fs-4 py-5 px-4">
        This is an Online car Renting application that is used by more than one million customers today.
        our vehicles are of different types, over 50+ models are available just for you.
        Our pricing options are well documented, online support is available for 24/7 service.
        create account and get started for just a few.
        <br>
        <a href="<?= base_url('MyApp/login'); ?>" class="btn btn-primary my-5 mx-2 p-4 col-5">Get Started</a>
      </div>
    </div>
    <div class="image">
      <img src="<?= base_url() ?>../images/index.png" alt="image" class="" draggable='false'>
    </div>
    <div class="footer footnote text-center">
      <p class="text-center">car-rental-online &copy; 2021</p>
    </div>
  </div>
</body>

</html>