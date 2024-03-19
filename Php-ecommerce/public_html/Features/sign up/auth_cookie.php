<?php
if (!isset($_COOKIE["username"])) {
    header("Location: login.php");
    exit();
}
?>
