<?php
    session_start();
    include ('config.php');

    $name = $_POST['name'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM akashadb WHERE name='$name' AND password ='$password'";
    $query = mysqli_query($dbConnect,$sql);
    $check = mysqli_num_rows($query);

    if($check >0)
    {
        ECHO $check;
        $user_logged = mysqli_fetch_assoc($query);
        if ($user_logged['role']=='Admin') {
            $_SESSION['name'] = $name;
	        $_SESSION['status'] = "login";
	        header("location:admin/home.php");
        }
        else {
            $_SESSION['name'] = $name;
	        $_SESSION['status'] = "login";
	        header("location:user/home.php");
        }
    }
    else {
        header("location:login.php?check=failed");
    }

?>