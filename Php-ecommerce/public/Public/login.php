<?php
require 'connection.php';
session_start();
?>
<?php
'nav-bar.php';
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="img/lifestyleStore.png" />
    <title>ASSASSIN</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jquery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified javascript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <div>

        <br><br><br>
        <link rel="stylesheet" href="css/cssno.css">
        </head>

        <body>
            <div id="preloader"></div>
            <div class="background">
                <div class="shape"></div>
                <div class="shape"></div>
            </div>
            <form method="post" action="login_submit.php">
                <h2>Login Here</h2>
                <label for="username">Email</label>
                <input type="email" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                <button input="button" value="Login" id="submit" type="submit">Log In</button>
                <div class="social">
                    <div class="go"><a href="signup.php">Don't have an account Register </a></div>
                </div>
            </form>
    </div>
</body>

</html>
<style>
    #preloader {
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden;
        background: #000 url(img/loader.gif) no-repeat center center;
        background-size: 20%;
        height: 100vh;
        width: 100%;
        position: absolute;
        bottom: 0%;
        z-index: 100;
    }
</style>
<script>
    var loader = document.getElementById("preloader");
    window.addEventListener("load", function() {
        loader.style.display = "none";
    });
       // Redirect to the home page when the back button is pressed
       history.pushState(null, null, document.URL);
        window.addEventListener('popstate', function () {
            history.pushState(null, null, document.URL);
            window.location.href = 'https://www.aushope.online/';  // Replace '/home' with your actual home page URL
        });
</script>