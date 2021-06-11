<style>
  .headering {
    position: absolute;
    left: 0;
  }
  .navbar-brand{
    font-weight: bolder;
  }
  nav{
    box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;
  }
</style>
<nav class="navbar table-light nav-pills nav bg-white py-4 fs-4">
  <div class="headering p-3 mt-4">
    <a class="text-dark navbar-brand fs-1 font-weight-bold" href="<?= base_url('MyApp/index'); ?>">Car Rental</a>
  </div>
  <div class="container-fluid d-flex justify-content-between align-middle">
    <ul class="nav navbar-brand text-dark">
      <li><a href="<?= base_url('MyApp/index'); ?>" class="btn btn-white fs-4">Home</a></li>
      <li><a href="<?= base_url('MyApp/users'); ?>" class="btn btn-white fs-4">Users</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle btn btn-white fs-4" data-toggle="dropdown" href="#">Cars</a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('MyApp/viewcars'); ?>" class="btn btn-white fs-4">view Cars</a></li>
          <li><a href="<?= base_url('MyApp/regcar'); ?>" class="btn btn-white fs-4">Register new Cars</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('MyApp/passwordreset'); ?>" class="btn btn-white fs-4">Password Reset</a>
      </li>
    </ul>
    <ul class="nav fs-4 navbar-brand text-dark">
      <li><a href="<?= base_url('MyApp/signup'); ?>" class="btn btn-white fs-4"><span class="glyphicon glyphicon-user"></span>  Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>" class="btn btn-light fs-4"><span class="glyphicon glyphicon-log-in"></span>  Login</a></li>
    </ul>
  </div>
</nav>