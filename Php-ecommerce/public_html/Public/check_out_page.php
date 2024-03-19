<?php
session_start();
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
<html>

<body>
  <title>check out</title>
  <header>
    <link rel="stylesheet" href="/Root/Assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f538f1ee6e.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9078fb565f.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
      .button {
  display: inline-block;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
      body,
      html {
        background-color: black;
        background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/8374.jpg');
        background-size: cover;
      }

      #price {
        font-family: fantasy;
        color: white;
        width: 350px;
        height: 350px;
        display: flex;
        position: absolute;
        left: 900px;
        top: 20px;

        background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/7652.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        border: 1px;
      }

      #all {
        position: absolute;
        top: 0px;
        right: 0px;
        background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/7652.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
        height: 90px;
      }

      #check_out {
        position: absolute;
        text-align: left;
        text-align: center;
        left: 800px;
      }

      #container {
        position: absolute;
        width: 100%;
      }

      #zen {
        position: absolute;
        top: -20px;
        right: 390px;
        width: 70%;
        height: 100%;
      }

      #jumbo {
        background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/7652.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        width: 70%;
        height: 150px;
      }

      #col {
        color: black;
      }

      #order {
        position: absolute;
        top: 300px;
        right: 10%;
      }

      .test {
        border-radius: 10px;
        height: 150px;
        width: 150px;
        padding: 5px;
      }

      #new {
        font-family: Arial, Helvetica, sans-serif;
        color: black;
        width: 50%;
        border-radius: 20px;
        margin: 20px auto;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      a {
        color: #0060B6;
        text-decoration: none;
      }

      a:hover {
        color: #00A0C6;
        text-decoration: none;
        cursor: pointer;
      }

      /* Loading screen styles */
      .loading-screen {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.8);
        /* Semi-transparent white background */
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ensure loading screen appears on top of other content */
      }

      .loading-icon {
        border: 8px solid #f3f3f3;
        /* Light grey */
        border-top: 8px solid #3498db;
        /* Blue */
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        /* Apply rotation animation */
      }

      @keyframes spin {
        0% {
          transform: rotate(0deg);
        }

        100% {
          transform: rotate(360deg);
        }
      }
    </style>
    <script>
      // Simulate loading time
      setTimeout(() => {
        // Hide loading screen
        document.getElementById("loading-screen").style.display = "none";

        // Show loaded content
        document.getElementById("content").style.display = "block";
      }, 400); // Change 2000 to the actual loading time in milliseconds
      $(document).ready(function() {
        $.ajax({
          type: "GET",
          url: "getimg.php", // Make sure this URL is correct and returns the image data
          success: function(response) {
            $("#image-container").html(response);
          }
        });
      });
    </script>
  </header>
  <div class="loading-screen" id="loading-screen">
    <div class="loading-icon"></div>
  </div>
  <div id="zen">
    <br>
    <div class="container mt-3">
      </div>
      <div class="mt-4 p-5 bg-primary text-white rounded" id="jumbo">
        <h5>DELIVERY ADDRESS</h5>
        <div class="container mt-3">
          <?php
          // Display user details
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "Name: " . $row['name_01'] . "";
            echo "Mail: " . $row['email'] . "";
            echo "Address: " . $row['address'] . "";
            echo "Contact: " . $row['contact'] . "";
            echo "City: " . $row['city'] . "";
          } else {
            echo "<h4>No user found</h4>";
          }
          ?>
        </div>

        <!-- The Modal -->
        <div class="modal fade" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title" id="col">Cart Items</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <!-- Modal body -->
              <div class="modal-body" id="col">
                <?php
                $stmt->execute();
                $user_products_result = $stmt->get_result();
                $counter = 1;
                while ($row = $user_products_result->fetch_assoc()) {
                ?> <table class='new'>
                    <tr>
                      <td><?php echo $counter ?></td></br>
                      <td> <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='" . $row['filename'] . "' class='test' />"; ?>
                      </td></br>
                      <td><?php echo $row['name'] ?></td>
                      <td>Rs <?php echo $row['price'] ?>/-</td>
                      </a>
                      </td>
                    </tr>
                  <?php
                  $counter++;
                }
                  ?>
                  </tbody>
                  </table>

              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

      </div>
      <div class="mt-4 p-5 bg-primary text-white rounded" id="jumbo">
        <h5>ORDER SUMMARY</h5>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Your items
        </button>
        <div class="container mt-3">
          <div id="demo" class="collapse">


          </div>
        </div>
      </div>
      <div class="mt-4 p-5 bg-primary text-white rounded" id="jumbo">
        <h5>PAYMENT OPTIONS</h5>
          <p>Please select your payment option</p>
          
        </form>
      </div>
    </div>
  </div>
  <div id="price">
    <pre>
    <center>
  price details<br />
  price (3 items)       <strong>Rs <?php echo $sum; ?>/-</strong><br>
  <b>Total Payable      <strong>Rs <?php echo $sum; ?>/-</strong></b>
  </center></pre>
    <div id="order">
      <button type="button" class="btn btn-warning" id="rzp-button1">order</button>
    </div>
  </div>
</body>

</html>
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

$total = $sum;


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

</head>

<body>
  <div class="container">
    <div class="parent_main">
    </div>
  </div>

  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
  <script>
    var options = {
      "key": "rzp_test_Bq9v3t9rz1lui5", // Enter the Key ID generated from the Dashboard
      "amount": "<?php echo $total * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
      "currency": "INR",
      "name": "ASSASSIN UNIVERSAL SHOPE",
      "description": "Transaction for ",
      "image": "https://i.pinimg.com/564x/16/56/eb/1656eb4731f43c8984d86d30a32807c7.jpg",
      //"order_id": " //echo(rand(10,100));", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
      "callback_url": "thanks.php",
      "prefill": {
        "name": "<?php echo $name; ?>",
        "email": "<?php echo $email; ?>",
        "contact": "+91<?php echo $mobile; ?>"
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