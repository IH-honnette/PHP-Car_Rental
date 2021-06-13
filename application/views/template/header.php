<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-white " href="<?= base_url('MyApp/index'); ?>">CAR RENTAL</a>
    </div>
    <ul class="nav navbar-nav ml-auto">
      <li><a href="<?= base_url('MyApp/index'); ?>">Home</a></li>
      <li><a href="<?= base_url('MyApp/users'); ?>">Users</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('MyApp/viewcars'); ?>">view Cars</a></li>
          <li><a href="<?= base_url('MyApp/hirecar'); ?>" class="btn btn-white">Hire a Car</a></li>
          <li><a href="<?= base_url('MyApp/regcar'); ?>">Register new Cars</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('MyApp/passwordreset'); ?>">Password Reset</a>
      </li>
      <li>
        <a href="<?= base_url('MyApp/dashboard'); ?>">Dashboard</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?= base_url('MyApp/signup'); ?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>