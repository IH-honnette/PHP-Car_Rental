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
      <a class="navbar-brand text-dark fw-bolder" href="<?= base_url('MyApp/index'); ?>">CAR RENTAL</a>
    </div>
    <ul class="nav navbar-nav navbar-right d-inline-block">
      <li><a href="<?= base_url('usersController/signup'); ?>"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>