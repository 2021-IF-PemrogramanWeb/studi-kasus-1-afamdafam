<?php

    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    include ('config.php');
    $sql = "insert into akashadb(name,password,email) values ('$name','$password','$email')";
    $query = mysqli_query($dbConnect,$sql);

    header("Location:login.php");
?>