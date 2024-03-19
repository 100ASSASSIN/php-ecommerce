<?php
// Include auth_cookie.php file on all user panel pages
include("auth_cookie.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
</head>

<body>
    <div class="form">
        <?php
        // Check if the username cookie is set
        if (isset($_COOKIE['username'])) {
            $username = $_COOKIE['username'];
            echo "<p>Hey, $username!</p>";
            echo "<p>You are now on the user dashboard page.</p>";
            echo "<p><a href='logout.php'>Logout</a></p>";
        } else {
            // Redirect to the login page if the username cookie is not set
            header("Location: login.php");
            exit();
        }
        ?>
    </div>
</body>

</html>
