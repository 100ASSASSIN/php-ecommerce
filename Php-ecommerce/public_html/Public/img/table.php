<?php 
$servername = "loaclhost";
$username = "root";
$password = "";
//create connection
$conn = new mysqli($SERVERname, $username, $password);
if($conn->connect_error){
    die ("connection fail" .$conn->connect_error);
}
echo "connected Database successfully";
?>
<?php

?>
