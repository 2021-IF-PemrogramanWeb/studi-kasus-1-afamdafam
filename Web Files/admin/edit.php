<?php

      $id = $_POST['id'];
      $name = $_POST['username'];
      $email = $_POST['email'];
      $password = $_POST['password'];
      $role = $_POST['role'];
      include ('config.php');

      $sql = "UPDATE akashadb SET
      name ='$name', 
      email ='$email', 
      password ='$password', 
      role ='$role' 
      where id = ".$id;
     $query = mysqli_query($dbConnect,$sql);
      // echo $sql;
      if($query)
      {
          header("location:user_list.php?edit=success");
      }
      else {
        header("location:user_list.php?edit=failed");
      }
?>
