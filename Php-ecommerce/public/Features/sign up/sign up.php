<?php
require('db.php');

// When form submitted, insert values into the database.
if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_POST['username']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($con, $username);
    $email    = stripslashes($_POST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $password = stripslashes($_POST['password']);
    $password = mysqli_real_escape_string($con, $password);
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (username, password, email, create_datetime)
                 VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";
    $result   = mysqli_query($con, $query);

    if ($result) {
        // Set cookies
        setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
        setcookie("email", $email, time() + (86400 * 30), "/"); // 86400 = 1 day

        echo "<div class='form'>
              <h3>You are registered successfully.</h3><br/>
              <p class='link'>Click here to <a href='login.php'>Login</a></p>
              </div>";
    } else {
        echo "<div class='form'>
              <h3>Required fields are missing.</h3><br/>
              <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
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
        <h2>Sign Up</h2>
        <label for="username">User name</label>
        <input type="text" name="username" placeholder="User name" id="username" required/>

        <label for="email">Enter Your Email Id</label>
        <input type="text" name="email" placeholder="Example@gmail.com" id="email" required/>

        <label for="password">Create Password</label>
        <input type="password" name="password" placeholder="Password" id="password" required/>
        <button type="submit" name="submit">Sign Up</button>
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    <div id="move">
        <iframe width="560" height="315" src="https://www.youtube.com/embed/tkql_yvuSK0?si=7h4jr7d_61nwDVzV" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        <!-- Add more iframes as needed -->
    </div>
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
