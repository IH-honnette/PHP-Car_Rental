<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-white " href="<?= base_url('index.php/MyApp/index');?>">Car Rental System</a>
    </div>
    <ul class="nav navbar-nav ml-auto">
      <li class="active"><a href="<?= base_url('MyApp/index');?>">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Users<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('MyApp/users');?>">view Users</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Services</a></li>
      <li><a href="<?= base_url('MyApp/contact');?>">Contact</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= base_url('MyApp/signup');?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  