<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('location: login.php');
    exit(); // Added exit to stop script execution after redirection
}

$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$dbname = "u967353045_root"; // Update with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_SESSION['id'];
$new = $id;

// SQL query to fetch data for a specific user ID
$sql = "SELECT id, name_01, email, contact, city, address, pincode FROM users WHERE id = $new";
$result = $conn->query($sql);

// Close the connection (moved to the end of the script)
$conn->close();
?>

<?php
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];
$user_products_query = "SELECT it.id, it.name, it.price, it.image_data, it.filename
                        FROM users_items ut
                        INNER JOIN items it 
                        ON it.id = ut.item_id
                        WHERE ut.user_id = ?";
$stmt = $con->prepare($user_products_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_products_result = $stmt->get_result();
$no_of_user_products = $user_products_result->num_rows;
$sum = 0;

if ($no_of_user_products == 0) {
?>
<script>
    window.alert("No items in the cart!!");
</script>
<?php
} else {
    while ($row = $user_products_result->fetch_assoc()) {
        $sum += $row['price'];
    }
}
?>

<?php
  // Display user details
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
     "Name: " . $row['name_01'] . "";
     "Mail: " . $row['email'] . "";
    "Address: " . $row['address'] . "";
     "Contact: " . $row['contact'] . "";
    "City: " . $row['city'] . "";
    
$stringValue = $row["name_01"];

$name =  $stringValue;
$email = $row['email'];
$mobile = $row['contact'];
$address = $row['address'];
} else {
    echo "<h4>No user found</h4>";
}

$total =$sum; 


 // Assuming 'address' is a column in your database table containing the address information
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm to Pay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="pay.css">
</head>

<body>
    <div class="container">
        <div class="parent_main">
            <h2 class="h3 text-center">Click the Pay button for payment!</h2>
            <br>
            <div>
                <button class="btn btn-success" id="rzp-button1"><h5>Pay</h5></button>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_Bq9v3t9rz1lui5", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $total *555100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "ASSASSIN UNIVERSAL SHOPE",
            "description": "Transaction for ",
            "image": "https://i.pinimg.com/564x/16/56/eb/1656eb4731f43c8984d86d30a32807c7.jpg",
            //"order_id": " //echo(rand(10,100));", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1//
            "callback_url": "thanks.php",
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "<?php echo $email; ?>",
                "contact": "<?php echo $mobile; ?>"
            },
            "notes": {
                "address": "<?php echo $address; ?>"
            },
            "theme": {
                "color": "gold"
            }
        };
        
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
        
    </script>

    <script>
        /*
        window.onload = function() {
            document.getElementById('rzp-button1').click();
        }
        */
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>