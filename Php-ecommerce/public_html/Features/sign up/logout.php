<?php
// Unset all cookies
setcookie("username", "", time() - 3600, "/");
setcookie("user_id", "", time() - 3600, "/");

// Redirect to login page
header("Location: login.php");
exit();
?>
