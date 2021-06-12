<style>
  .headering {
    position: absolute;
    left: 0;
  }
</style>
<nav class="navbar table-light nav-pills nav bg-white py-4 fs-4">
  <div class="headering p-3 mt-4">
    <a class="text-dark navbar-brand fs-3" href="<?= base_url('MyApp/index'); ?>">Car Rental</a>
  </div>
  <div class="container-fluid d-flex justify-content-between align-middle">
    <u class="nav fs-4 navbar-brand text-dark">
      <li><a href="<?= base_url('MyApp/index'); ?>" class="btn btn-white">Home</a></li>
      <li><a href="<?= base_url('MyApp/users'); ?>" class="btn btn-white">Users</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle btn btn-white" data-toggle="dropdown" href="#">Cars</a>
        <ul class="dropdown-menu">
          <li><a href="<?= base_url('MyApp/viewcars'); ?>" class="btn btn-white">view Cars</a></li>
          <li><a href="<?= base_url('MyApp/regcar'); ?>" class="btn btn-white">Register new Cars</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url('MyApp/passwordreset'); ?>" class="btn btn-white">Password Reset</a>
      </li>
    </u l>
    <ul class="nav fs-4 navbar-brand text-dark">
      <li><a href="<?= base_url('MyApp/signup'); ?>" class="btn btn-white"><span class="glyphicon glyphicon-user"></span>Sign Up</a></li>
      <li><a href="<?= base_url('MyApp/login'); ?>" class="btn btn-light"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>