<!DOCTYPE html>
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="canonical" href="https://getbootstrap.com/docs/3.4/examples/starter-template/">
    <title>User Page</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark text-white">
	<a class="navbar-brand">Akasha</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		<li class="nav-item">
			<a class="nav-link" href="logout.php">Logout</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="user_list.php">List</a>
		</li>

		</ul>
	</div>
	</nav>
	<?php 
		session_start();
		if($_SESSION['status']!="login"){
			header("location:../login.php?check=not_logged");
		}
	?>
    <div class="jumbotron">

      <div class="starter-template">
        <h1>Welcome <?php echo $_SESSION['name']; ?>,</h1>
        
        <p class="lead">you can view user list from the navigation tab.</p>
      </div>
    </div>
    <script src="./css/jquery-1.12.4.min.js.download" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="./css/bootstrap.min.js.download"></script>
    <script src="./css/ie10-viewport-bug-workaround.js.download"></script>
</body>
</html>

