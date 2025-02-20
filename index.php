
<?php
    session_start();
    $_SESSION['user'] = 'Admin';
    // session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Booking | Log in</title>

  <!-- Icon -->
  <link rel="icon" type="image/x-icon" href="/images/logo.png">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="public/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/dist/css/adminlte.min.css">

    <style>
        body {
            background-image: url('images/bg.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        #login-logo {
            background-color: #f8f9fa;
            border-radius: 10px;
        }
    </style>

</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo" >
    <a href=""><b >Booking</b>Lab</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="./checkLogin.php" method="post">

        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
    
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
             <!-- <a href="admin/index.php" class="btn btn-success btn-block">Sing In</a> -->
          </div>
          <!-- /.col -->

        </div>
      </form>

      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new Admin</a>
      </p>
      <p class="mb-0">
        <a href="customerRegister.php" class="text-center">Register a new membership</a>
      </p>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="public/dist/js/adminlte.min.js"></script>
</body>
</html>
