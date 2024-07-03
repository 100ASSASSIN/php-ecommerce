<?php
require 'connection.php';
session_start();
$name_01 = mysqli_real_escape_string($con, $_POST['name_01']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($regex_email, $email)) {
    echo "Incorrect email. Redirecting you back to registration page...";
?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
<?php
}
$password = md5(md5(mysqli_real_escape_string($con, $_POST['password'])));
if (strlen($password) < 6) {
    echo "Password should have atleast 6 characters. Redirecting you back to registration page...";
?>
    <meta http-equiv="refresh" content="2;url=signup.php" />
<?php
}
$contact = $_POST['contact'];
$city = mysqli_real_escape_string($con, $_POST['city']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$duplicate_user_query = "select id from users where email='$email'";
$duplicate_user_result = mysqli_query($con, $duplicate_user_query) or die(mysqli_error($con));
$rows_fetched = mysqli_num_rows($duplicate_user_result);
if ($rows_fetched > 0) {
    //duplicate registration
    //header('location: signup.php');
?>
    <script>
        window.alert("Email already exists in our database!");
    </script>
    <meta http-equiv="refresh" content="1;url=signup.php" />
<?php
} else {
    $user_registration_query = "insert into users(name_01,email,password,contact,city,address) values ('$name_01','$email','$password','$contact','$city','$address')";
    //die($user_registration_query);
    $user_registration_result = mysqli_query($con, $user_registration_query) or die(mysqli_error($con));
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Bootstrap Example12</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    <div class="container">
      <div class="alert alert-success">
        <strong>Success!</strong> your account successfully created.
      </div>
    </div>
    
    </body>
    </html>';
    $_SESSION['email'] = $email;
    //The mysqli_insert_id() function returns the id (generated with AUTO_INCREMENT) used in the last query.
    $_SESSION['id'] = mysqli_insert_id($con);
    //header('location: /root/home.php');  //for redirecting
?>
    <meta http-equiv="refresh" content="3;url=/index.php" />
<?php
}
?>