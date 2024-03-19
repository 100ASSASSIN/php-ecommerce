<?php
    session_start();
    session_unset();
    session_destroy();
?>
<?php
require 'nav-bar.php';
 ?>
 <?php

// Redirect browser
header("Location: /Root/index.php");
exit;
?>

<style>
    #test{
        font-weight: 500;
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        position: absolute;
        top: 200px;
        color: red;
    }
</style>
<div id="test"><p>You have been logged out. <a href="login.php">Login again.</a></p></div>
                          