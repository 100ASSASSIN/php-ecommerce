​<script>
// Disable the back button functionality
history.pushState(null, null, location.href);
window.onpopstate = function(event) {
    history.go(1);
};
</script>

<?php 
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];
$user_products_query = "SELECT it.id, it.name, it.price, it.image_data, it.filename
                        FROM users_items ut
                        INNER JOIN items it 
                        ON it.id = ut.item_id
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
?>
<style>
h2{
font-family: Arial, Helvetica, sans-serif;

}



</style>
<?php

// Database connection parameters
$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$database = "u967353045_root"; // Update with your actual database name

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to copy column data from source table using inner join
    $sql = "INSERT INTO orders (user_id, item_id, user_name, mobile, address, email, total_price, orders_item_name) 
            SELECT users.id, users_items.item_id, users.name_01, users.contact, users.address, users.email, items.price, items.name
            FROM users_items
            INNER JOIN items ON users_items.item_id = items.id
            INNER JOIN users ON users_items.user_id = users.id
            WHERE users_items.user_id = :user_id";
    
    // Prepare the SQL query
    $stmt = $conn->prepare($sql);
    
    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    
    // Execute the SQL query
    $stmt->execute();
    
    //echo "Data copied successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
// Close the database connection
$conn = null;
?>
<?php
// Database connection parameters
$servername = "localhost";
$database = "u967353045_root";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
 // Example user ID, replace with your actual user ID
// Update with your actual database name

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // SQL to delete a record
    $sql = "DELETE FROM users_items WHERE user_id=:user_id";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameter
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    // Execute the SQL statement
    $stmt->execute();

    ///echo "Record deleted successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the connection
$conn = null;
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your order is processing</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
  body, html {
  height: 100%;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: #f0f0f0;
}

.loading-container {
  text-align: center;
}

.loading-text {
  font-size: 18px;
  margin-bottom: 10px;
}

.loader {
  border: 8px solid #f3f3f3;
  border-top: 8px solid #3498db;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>

<script>  
// You can add JavaScript logic here if needed, like triggering the loading animation, etc.


</script>
</head>
<body>
<div class="loading-container">
    <div class="loading-text">Your order is processing...</div>
    <div class="loader"></div>
  <div class="container parent_main">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<meta http-equiv="refresh" content="2;url=placed.php">