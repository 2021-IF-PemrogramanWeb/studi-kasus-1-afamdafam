<?php
    include ('config.php');

    if(!isset($_GET['id']))
    {
        header("Location:user_list.php");
    }
    $id = $_GET['id'];
    $query = "DELETE FROM akashadb WHERE id=".$id;
    $delete = mysqli_query($dbConnect,$query);
    
    if($delete)
    {
        header("Location:user_list.php?status=success");
    }
    else {
        header("Location:user_list.php?status=failed");
    }
?>