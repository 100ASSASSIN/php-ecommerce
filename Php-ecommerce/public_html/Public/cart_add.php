<?php
require 'connection.php';
//require 'header.php';
session_start();
$item_id = $_GET['id'];
$user_id = $_SESSION['id'];

// Insert into users_items table
$add_to_cart_query_users_items = "insert into users_items (user_id, item_id, status) values ('$user_id', '$item_id', 'Added to cart')";
$add_to_cart_result_users_items = mysqli_query($con, $add_to_cart_query_users_items) or die(mysqli_error($con));

// Insert into orders table
///$add_to_cart_query_orders = "insert into orders (user_id, item_id, status) values ('$user_id', '$item_id', 'Check_out')";
///$add_to_cart_result_orders = mysqli_query($con, $add_to_cart_query_orders) or die(mysqli_error($con));

header('location: cart.php');
?>
