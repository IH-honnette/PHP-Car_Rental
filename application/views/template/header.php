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
      <a class="navbar-brand text-dark fw-bolder" href="<?= base_url('MyApp/'); ?>">CAR RENTAL</a>
    </div>
    <ul class="nav navbar-nav d-inline-block">
      <li>
        <a href="<?= base_url('MyApp/dashboard'); ?>">Dashboard</a>
      </li>
      <?php if ($this->session->userdata('roleId') != 2) : ?>
        <li><a href="<?= base_url('usersController/users'); ?>">Users</a></li>
      <?php endif; ?>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Cars</a>
        <ul class="dropdown-menu position-absolute zindex-popover">
          <li><a href="<?= base_url('MyCars/viewcars'); ?>">view Cars</a></li>
          <li><a href="<?= base_url('MyCars/hirecar'); ?>">Hire a Car</a></li>
          <?php
          if ($this->session->userdata('roleId') != 2) { ?>
            <li><a href="<?= base_url('MyCars/regcar'); ?>">Register new Cars</a></li>
          <?php } ?>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right d-inline-block">
      <li><a href="<?= base_url('MyApp/logout'); ?>">Logout</a></li>
    </ul>
    <h5>
      <?php
      if ($this->session->userdata('username') != null) {
        echo $this->session->userdata('username');
      } ?>
    </h5>
  </div>
</nav>