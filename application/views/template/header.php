<style>
  * {
    font-family: "Noto Sans TC", sans-serif;
  }

  nav {
    height: 80px;
    /* box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px; */
    box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;
  }
</style>
<nav class="navbar nav bg-white">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand text-dark fw-bolder" href="#">CAR RENTAL</a>
    </div>
    <ul class="nav navbar-nav d-inline-block">
      <li>
        <a href="<?= base_url('MyApp/dashboard'); ?>">Dashboard</a>
      </li>
      <li><a href="<?= base_url('usersController/users'); ?>">Users</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars</a>
        <ul class="dropdown-menu position-absolute">
          <li><a href="<?= base_url('MyCars/viewcars'); ?>">view Cars</a></li>
          <li><a href="<?= base_url('MyCars/hirecar'); ?>" >Hire a Car</a></li>
          <?php
          if ($this->session->userdata('roleId') != 2){?>
            <li><a href="<?= base_url('MyCars/regcar'); ?>">Register new Cars</a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right d-inline-block">
      <li><a href="<?= base_url('usersController/signup'); ?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      <li><a href="<?= base_url('MyApp/logout'); ?>">Logout</a></li>
    </ul>
  </div>
</nav>