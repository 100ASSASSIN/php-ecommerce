<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require 'connection.php';


if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infinite Scroll</title>
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

    <div id="loading" class="hidden"></div>

    <div class="container">
        <h1>Database Content</h1>

        <!-- Reload button -->
        <button id="reloadButton" class="btn btn-primary mb-3" onclick="reloadData()">Reload Data</button>

        <!-- Bootstrap table styles -->
        <div class="table-responsive">
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
                        <h2>Orders</h2>
                        <table class='table11'>
                            <tr>
                                <th>Order ID</th>
                                <td>" . $row["id"] . "</td>
                            </tr>
                            <tr>
                                <th>User ID</th>
                                <td>" . $row["user_id"] . "</td>
                            </tr>
                            <tr>
                                <th>Date</th>
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
                                <th>Cancel</th>
                                <td> <button type='button' class='btn btn-danger'>Cancel</button> </td>
                            </tr>
                            <tr>
                                <th>Test</th>
                                <td>
                                    <a href='cart_remove.php?id=" . $row['id'] . "'>Remove</a>
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
        </div>

       
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- JavaScript and additional styles -->
    <script src="ajax.js"></script>
</body>
</html>