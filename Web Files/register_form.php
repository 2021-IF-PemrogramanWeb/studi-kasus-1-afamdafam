<!DOCTYPE html>
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sign in to Akasha</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
  </head>
  <body class="hold-transition register-page">
    <div class="register-box">
    <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a class="h1"><b>Akasha</b></a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

    <form class="form-signin" method="post" action="register.php"> 
    <div class="input-group mb-3">
          <label for="inputName" class="sr-only">Username</label>
	        <input type="text" name="username" id="inputName" class="form-control" placeholder="Username" autofocus="">
        </div>
        <div class="input-group mb-3">
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email" autofocus="">
        </div>
        <div class="input-group mb-3">
          <label for="inputEmail" class="sr-only">Email</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="">
        </div>
      
      <button class="btn btn-lg btn-secondary btn-block" type="submit" value="Register">Register</button>
      <p class="text-center"><a href="login.php">Already have an account?</a></p>
        <p class="text-center"><a href="index.php">Home Page</a></p>
    </form>

    </div>
    </div>
  </div>
</body>
</html>
