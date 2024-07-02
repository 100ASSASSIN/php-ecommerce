<?php
$servername = "localhost";
$username = "root";
$password = "9047@Aus";
$dbname = "u967353045_root"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$conn->close();
?>
