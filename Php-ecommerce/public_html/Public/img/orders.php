<?php
session_start();
require 'connection.php';
require 'nav-bar.php';

if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        #new {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            width: 50%;
            border-radius: 20px;
            margin: 20px auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "root";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_id = $_SESSION['id'];
    $new = $user_id;

    // SQL query to fetch data for a specific user ID
    $sql = "SELECT id, user_id, item_id, date, time, status FROM orders WHERE user_id = $new";
    $result = $conn->query($sql);

    // Check if there are any rows in the result set
    if ($result->num_rows > 0) {
        // Output data of each row using a while loop
        while ($row = $result->fetch_assoc()) {
            echo "<div id='new'>
                <br>
                <br>
                <h2>orders</h2>
                <table class='new'>
                    <tr>
                        <th>Order ID</th>
                        <td>" . $row["id"] . "</td>
                    </tr>
                    <tr>
                        <th>User ID</th>
                        <td>" . $row["user_id"] . "</td>
                    </tr>
                    <tr>
                        <th>date</th>
                        <td>" . $row["date"] . "</td>
                    </tr>
                    <tr>
                        <th>Time</th>
                        <td>" . $row["time"] . "</td>
                    </tr>
                    <tr>
                        <th>Order Status</th>
                        <td>" . $row["status"] . "</td>
                    </tr>
                    <tr>
                        <th>cancel</th>
                        <td> <button type='button' class='btn btn-danger'><a href='cancel_order.php?id=" . $row['id'] . "'>cancel</a></button> </td>
                    </tr>
                    <tr>
                        <th>test</th>
                        <td>
            
                        </td>
                    </tr>
                </table>
              </div>";
        }
    } else {
        echo "0 results";
    }

    // Close the connection
    $conn->close();
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>