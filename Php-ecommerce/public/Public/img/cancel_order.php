<?php
    require 'connection.php'; 
    session_start();
    $id=$_GET['id'];
    $delete_query="delete from orders where id='$id'";
    $delete_query_result=mysqli_query($con,$delete_query) or die(mysqli_error($con));
    header('location: orders.php');
?>