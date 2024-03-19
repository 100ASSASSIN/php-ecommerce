<?php
function check_if_added_to_cart($item_id)
{
    require 'connection.php';
    // Assuming you have started the session somewhere before using $_SESSION
    
    
    $user_id = $_SESSION['id'];
    
    // Check in users_items table
    $users_items_query = "SELECT * FROM users_items WHERE item_id='$item_id' AND user_id='$user_id' AND status='Added to cart'";
    $users_items_result = mysqli_query($con, $users_items_query) or die(mysqli_error($con));
    $num_rows = mysqli_num_rows($users_items_result);
    
    // Check in orders table
    ////$orders_query = "SELECT * FROM orders WHERE item_id='$item_id' AND user_id='$user_id' AND status='Check_out'";
    ///$orders_result = mysqli_query($con, $orders_query) or die(mysqli_error($con));
    ///$num_rows_orders = mysqli_num_rows($orders_result);

    // If item is in either table, return 1; otherwise, return 0
    if ($num_rows>=1)return 1;
        return 0;
    } 
?>
