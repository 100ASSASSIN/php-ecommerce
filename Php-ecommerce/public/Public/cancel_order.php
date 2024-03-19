<?php 
session_start();
$item_id=$_GET['id'];
$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$dbname = "u967353045_root";
    
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
        $sql = "UPDATE orders SET status='Cancel' WHERE id='$item_id'";
      
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
      
        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }
      
      $conn = null;

header('location:orders.php');
?>