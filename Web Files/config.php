<?php
    $dbHost = 'localhost';
    $dbUser = 'root';
    $dbName = 'akasha';
    $dbPass = '';

    $dbConnect = mysqli_connect($dbHost,$dbUser,$dbPass,$dbName);

    if (mysqli_connect_errno()){
        echo "Koneksi database gagal : " . mysqli_connect_error();
    }

?>