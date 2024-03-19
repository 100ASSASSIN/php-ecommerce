<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: index.php');
} else {
    $user_id = $_GET['id'];
    $confirm_query = "UPDATE users_items SET status='Confirmed' WHERE user_id=$user_id";
    $confirm_query_result = mysqli_query($con, $confirm_query) or die(mysqli_error($con));
    ////orders// id 
    $user_id = $_GET['id'];
    $confirm_query = "UPDATE orders SET status='Confirmed' WHERE user_id=$user_id";
    $confirm_query_result = mysqli_query($con, $confirm_query) or die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/aus.jpg" style="border-radius: 20px;">
    <title>Thanks for your order</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <style>
        body {
            background-image: url(https://4kwallpapers.com/images/walls/thumbs_3t/12634.png);
            background-size: cover;
        }

        .container2 {
            display: flex;
            position: absolute;
            bottom: 260px;
            right: 150px;
        }
    </style>
    <div>
        <?php
        require 'nav-bar.php';
        ?>
        <br>
        <br>
        <br>
        <div class="container2">
            <div class="row">
                <div class="col-xs-6">
                    <div class="new">
                        <div class="panel-heading"></div>
                        <div class="panel-body">
                            <p>Your order is confirmed. Thank you for shopping with us. <a href="/Root/index.php">Click here</a> to purchase any other item.</p>
                            <?php
                            require 'connection.php';
                            if (!isset($_SESSION['email'])) {
                                header('location: login.php');
                            }
                            $user_id = $_SESSION['id'];
                            $user_products_query = "SELECT it.id, it.name, it.price FROM users_items ut
                                INNER JOIN items it ON it.id = ut.item_id 
                                WHERE ut.user_id = ?";
                            $stmt = $con->prepare($user_products_query);
                            $stmt->bind_param("i", $user_id);
                            $stmt->execute();
                            $user_products_result = $stmt->get_result();
                            $no_of_user_products = $user_products_result->num_rows;
                            $sum = 0;

                            if ($no_of_user_products == 0) {
                            ?>
                                <script>
                                    window.alert("No items in the cart!!");
                                </script>
                            <?php
                            } else {
                                while ($row = $user_products_result->fetch_assoc()) {
                                    $sum += $row['price'];
                                }
                            }

                            // cart-page-start
                            if ($sum == 0) {
                                echo 'Some content for non-zero sum';
                               
                            } else {
                                // Display content based on non-zero $sum value
                                echo '<button class="check"><a href="clear_cart.php">complete</a></button>';
                                echo '<button class="check"><a href="payment.php"> -payment</a></button>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
