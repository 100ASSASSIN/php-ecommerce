<?php
require('db.php');

// When form submitted, check and create user session.
if (isset($_POST['username'])) {
    $username = stripslashes($_POST['username']);    // removes backslashes
    $username = mysqli_real_escape_string($con, $username);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    // Check user is exist in the database
    $query    = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'";
    $result = mysqli_query($con, $query) or die(mysqli_error($con));
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        // Set cookies
        setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        // Redirect to user dashboard page
        header("Location: dashboard.php");
    } else {
        echo "<div class='form'>
              <h3>Incorrect Username/password.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
              </div>";
    }
} else {
?>
<!--link-->
<link rel="stylesheet" href="sing.css">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ASSASSIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=9.0">
    <script src="js.js"></script>
    <link rel="stylesheet" href="Preload/preload.css">
</head>

<body>
    <div id="preloader"></div>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="POST">
        <h2>Login</h2>
        <label for="username">User name</label>
        <input type="text" name="username" placeholder="User name" id="username" required/>

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required/>

        <button type="submit" value="Login">Login</button>
        <p class="link"><a href="sign up.php">New Registration</a></p>
    </form>
    <script>
        var loader = document.getElementById("preloader");
        window.addEventListener("load", function () {
            loader.style.display = "none";
        });
    </script>
</body>

</html>
<?php
}
?>
