<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit(); // Added exit to stop script execution after redirection
}

require 'nav-bar.php';

$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$dbname = "u967353045_root"; // Update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['id'];
$new = $id;

// SQL query to fetch data for a specific user ID
$sql = "SELECT id, name_01, email, contact, city, address, pincode FROM users WHERE id = $new";
$result = $conn->query($sql);

// Close the connection (moved to the end of the script)
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/admin.css" type="text/css">
    <style>
 
        .btn {
            color: black;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 10px;
            border: 1px solid #333333;
        }
        #ch-p{
  position: absolute;
bottom: 340px;
left: 70%;
}
    </style>
</head>
<body>
    <br>
    <br>
    <h2>Your Account</h2>
    <div id="ch-p">
        <a class="btn" href="orders.php"><span></span><i class="fa fa-sign-out" aria-hidden="true"></i>Your orders</a><br><br>
        <a class="btn" href="settings.php"><span></span><i class="fa fa-sign-out" aria-hidden="true"></i>Change password</a><br><br>
        <a class="btn" href="account_change.php"><span></span><i class="fa-solid fa-user-plus"></i>Switch account</a><br><br>
        <a class="btn" href="logout.php"><span></span><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a><br><br>
    </div>
    <div id="log">
        <div id="child">
            <?php
            // Display user details
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h4>Name: " . $row['name_01'] . "</h4>";
                echo "<h4>Mail: " . $row['email'] . "</h4>";
                echo "<h4>Address: " . $row['address'] . "</h4>";
                echo "<h4>Contact: " . $row['contact'] . "</h4>";
                echo "<h4>City: " . $row['city'] . "</h4>";
            } else {
                echo "<h4>No user found</h4>";
            }
            ?>
        </div>
    </div>
</body>

</html>
<script>
    // Disable back button functionality
    history.pushState(null, null, location.href);
    window.onpopstate = function() {
        history.go(1);
    };
</script>
    <!-- Content that will be loaded -->
    <div id="content" style="display: none;">
        <!-- Your content goes here -->
        <h1>This is the content that will be loaded</h1>
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
