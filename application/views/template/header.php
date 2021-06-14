<style>
  * {
    font-family: "Noto Sans TC", sans-serif;
  }

  nav {
    height: 80px;
  }
</style>
<nav class="navbar nav bg-white">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-dark fw-bolder" href="<?= base_url('MyApp/index'); ?>">CAR RENTAL</a>
    </div>
    <ul class="nav navbar-nav d-inline-block">
      <li>
        <a href="<?= base_url('MyApp/dashboard'); ?>">Dashboard</a>
      </li>
      <li><a href="<?= base_url('MyApp/users'); ?>">Users</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars</a>
        <ul class="dropdown-menu position-absolute">
          <li><a href="<?= base_url('MyApp/viewcars'); ?>">view Cars</a></li>
          <li><a href="<?= base_url('MyApp/hirecar'); ?>" >Hire a Car</a></li>
          <li><a href="<?= base_url('MyApp/regcar'); ?>">Register new Cars</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right d-inline-block">
      <li><a href="<?= base_url('MyApp/signup'); ?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="<?= base_url('MyApp/logout'); ?>">Logout</a></li>
    </ul>
  </div>
</nav>