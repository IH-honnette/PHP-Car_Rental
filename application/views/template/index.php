<?php

// if ($this->session->userdata('email') == null){
//     redirect(base_url('MyApp/login'));
// }

?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <style>
      img {
        float: right;
      }

      div.container div {
        float: left;
      }

      div.image {
        position: absolute;
        right: 0;
        bottom: 1%;
        /* background: blue; */
      }

      @media only screen and (max-width:780px) {
        div.image {
          position: static;
        }
      }

      html {
        background: linear-gradient(120deg, rgba(246, 212, 101, 0.5) 0%, rgba(253, 160, 133, 0.4) 100%);
      }
    </style>
    <title>Car Rental:-landing page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?= base_url() ?>../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>

  <body class="bg-white">
    <div class="container col-9  m-auto bg-white p-4 my-5 relative">
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
      <div class="image ">
        <img src="<?= base_url() ?>images/index.png" alt="image" class="" draggable='false'>
      </div>
      <div class="footer footnote text-center">
        <p class="text-center">car-rental-online &copy; 2021</p>
      </div>
    </div>
  </body>

  </html>