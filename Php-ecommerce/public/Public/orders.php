<?php

use Razorpay\Api\Order;

session_start();
require 'connection.php';
require 'order-nav.php';



if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit(); // Added exit to stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Orders</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
           .test {
            border-radius: 10px;
            height: 150px;
            width: 150px;
            padding: 5px;
        }
        #new {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            width: 90%;
            border-radius: 20px;
            margin: 20px auto;
            padding-bottom: 95px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        a {
    color: #0060B6;
    text-decoration: none;
}

a:hover {
    color:#00A0C6; 
    text-decoration:none; 
    cursor:pointer;  
}
    </style>
</head>
<body>
<?php 
$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$dbname = "u967353045_root";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];
// Query to get a specific value from a table
$sql = "SELECT  status  FROM orders WHERE user_id = $user_id";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Fetch the value and store it in a PHP string
    $row = $result->fetch_assoc();

    $stringValue = $row["status"];

    // Output or use the string value as needed
    //echo "Value from database: " . $stringValue;

    //echo $_SESSION["get"];

    $_SESSION["get"] = $stringValue;

    $neww = $row["orders_item_name"];
    
    
    
  

    // Close the database connection
    $conn->close();
} else {
    echo "Error: " . $conn->error;
}
?>

    <?php
   $servername = "localhost";
   $username = "u967353045_assassin01"; // Update with your actual username
   $password = "Aus@9047672441"; // Update with your actual password
   $dbname = "u967353045_root";
   

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['id'];

    // SQL query to fetch data for a specific user ID
    $sql = "SELECT orders.id, orders.user_id, orders.status,  items.image_data, items.filename, orders.orders_item_name, orders.date, orders.total_price
    FROM orders  
    INNER JOIN items ON orders.item_id = items.id 
    WHERE user_id = $user_id";


    $result = $conn->query($sql);
    /////////////////////////

    ///////$orders = $_SESSION['get'];

    $orders = 'Confirmed';

       $orders;

    // Database check
    if ($orders === 'Confirmed' || $orders === 'Cancel') {
        // Check if there are any rows in the result set
        if ($result->num_rows > 0) {
            // Output data of each row using a while loop
            while ($row = $result->fetch_assoc()) {
                $link = $row['orders_item_name'];
                 echo "<a href=\"$link\"> <div id='new'>
                    <br>
                    <br>
                    <h2>orders</h2>
                    <table class='new'>
                    <td>
                    <img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='" . $row['filename'] . "' class='test' />
                    </td>  
                        <tr>
                            <th>Order ID</th>
                            <td>" . $row["id"] . "</td>
                        </tr>
                        <tr>
                            <th>User ID</th>
                            <td>" . $row["user_id"]  . "</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>" . $row["date"] . "</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>" . $row["orders_item_name"] . "</td>
                        </tr>
                        <tr>
                            <th>Order Status</th>
                            <td>"   . $row["status"] . "</td>
                        </tr>
                        <tr>
                            <th>Cancel</th>
                            <td><a href='cancel_order.php?id=" . $row['id'] . "'> <button type='button' class='btn btn-danger'>cancel</button> </a></td>
                        </tr>
                        <tr>
                            <!--test-->
                            <th>Price </th>
                            <td>"   . $row["total_price"] . "</td>
                    </table>
                    
                </div> </a> "; 
            }
        } else {
            echo "<br><br><br><br><br><h2>No orders</h2>";
        }
    } else {
        echo "<br><br><br><br><br><h2>No orders</h2>";
    }

    // Close the connection
    $conn->close();
    ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
      <!-- Loading screen -->
      <div class="loading-screen" id="loading-screen">
        <div class="loading-icon"></div>
    </div>

    <!-- Content that will be loaded -->
    <div id="content" style="display: none;">
    </div>
    <style>
        
        /* Loading screen styles */
.loading-screen {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent white background */
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999; /* Ensure loading screen appears on top of other content */
}

.loading-icon {
    border: 8px solid #f3f3f3; /* Light grey */
    border-top: 8px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite; /* Apply rotation animation */
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}


    </style>
    <script>
    // Simulate loading time
setTimeout(() => {
    // Hide loading screen
    document.getElementById("loading-screen").style.display = "none";

    // Show loaded content
    document.getElementById("content").style.display = "block";
}, 400); // Change 2000 to the actual loading time in milliseconds


</script>
</body>
</html>