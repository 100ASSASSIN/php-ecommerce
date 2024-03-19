<?php
// Assuming you have a database connection established
require 'connection.php';

// Check if the form is submitted

    // Define the table name
    $tableName = 'users_items';

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM $tableName";

    // Execute the query
    $deleteResult = mysqli_query($con, $deleteQuery);

    // Check if the deletion was successful
    if ($deleteResult) {
        echo "Orders successfully";
    } else {
        echo "Error deleting data: " . mysqli_error($con);
    }


// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
</head>
<body>
    <br>
    <a href="/Public/pay.php">PAY<span></span></a>
</body>
</html>
