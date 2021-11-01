<?php
    include ('config.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM akashadb WHERE id =$id";
    $query = mysqli_query($dbConnect,$sql);

    $user = mysqli_fetch_assoc($query);
    if(mysqli_num_rows($query)<1)
    {
        header('location:user_list.php');
    }
?>
<!DOCTYPE html>
<html lang="en"><link type="text/css" rel="stylesheet" id="dark-mode-general-link"><link type="text/css" rel="stylesheet" id="dark-mode-custom-link"><style type="text/css" id="dark-mode-custom-style"></style><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <head>
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <meta name="description" content="">
     <meta name="author" content="">
     <title>Edit Page</title>
     <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">
     <link href="./css/bootstrap.min.css" rel="stylesheet">
     <link href="./css/signin.css" rel="stylesheet">
     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  </head>
  <body  class="hold-transition register-page">
    <br></br>
    <div class="register-box">
    <div class="card card-outline card-dark">
    <div class="card-header text-center">
      <a class="h1"><b>Edit Account</b></a>
    </div>
    <div class="card-body">
    <form method = "post" action="edit.php">
    <table > 
    <tr>
    <td><div class="input-group mb-3"><input type="hidden" name="id" value="<?php echo $user['id']?>"></div></td>
    </tr>
    <tr>
        <td>Username</td>
        <td><div class="input-group mb-3"><input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user['name']?>"></div></td>
    </tr>
    <tr>
        <td>E-mail</td>
        <td><div class="input-group mb-3"><input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email"value="<?php echo $user['email']?>"></div></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><div class="input-group mb-3"><input type="text" name="password" id="inputPassword" class="form-control" placeholder="Password" required=""value="<?php echo $user['password']?>"></div></td>
    </tr>
    <tr>
        <td>Role</td>
        <td> <div class="input-group mb-3"> <select name="role" id="inputRole" class="form-control">
        <option value="Admin"<?php echo ($user['role']=='Admin')?'selected':''?>>Admin</option>
        <option value="User"<?php echo ($user['role']=='User')?'selected':''?>>User</option>
        </div>
        </select></td>
    </tr>
    <tr>
        <td></td>
        <td><button class="btn btn-lg btn-success btn-block"name="Submit" value="Update">Update</button></td>
    </tr>
    <tr>
        <td></td>
        <td><p class="text-center"><a href="user_list.php">Cancel editing.</a></p></td>
    </tr>
    </table>
    </form>
    </div>
    </div>
  </div>
</body>
</html>
