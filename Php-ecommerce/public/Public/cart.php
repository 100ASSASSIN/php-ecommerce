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
<!DOCTYPE html>
<html>

<head>
    <title>AUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="/Root/Components/navbar/navbar-plugin.css">
    <link rel="stylesheet" href="/Root/Assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <style>
        .test {
            border-radius: 10px;
            height: 150px;
            width: 150px;
            padding: 5px;
        }

        #bar {
            font-family: Arial, Helvetica, sans-serif;
            color: black;
            width: 90%;
            border-radius: 20px;
            margin: 50px auto;
            padding: 30px;
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
    <div>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Loading Screen</title>
            <link rel="stylesheet" href="styles.css">
        </head>

        <body>
            <!-- Loading screen -->
            <div class="loading-screen" id="loading-screen">
                <div class="loading-icon"></div>
            </div>

            <!-- Content that will be loaded -->
            <div id="content" style="display: none;">
            </div>

            <script src="script.js"></script>
        </body>

        </html>

        <?php
        require 'nav-bar.php';
        ?>
        <br>
        <div id="alg">
            <div class="container1">
                <div id="bar">
                    <?php
                    $stmt->execute();
                    $user_products_result = $stmt->get_result();
                    $counter = 1;
                    while ($row = $user_products_result->fetch_assoc()) {
                    ?>
                        <table>
                            <tr>
                                <td><?php echo $counter ?></td></br>
                                <td> <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='" . $row['filename'] . "' class='test' />"; ?>
                                </td></br>
                                <td>
                                    <?php
                                    $link = $row['name']; // Remove the single quotes around $row['id']
                                    echo "<a href=\"$link\">" . $row['name'] . "  </a>"; ?>
                                </td>
                                <td>Rs <?php echo $row['price'] ?>/-</td>
                                <td><a href='cart_remove.php?id=<?php echo $row['id'] ?>' class='btn btn-danger'>
                                        <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                    </a>
                                </td>
                            </tr>
                        </table>

                    <?php
                        $counter++;
                    }
                    ?>

                    <tr>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td><strong>Rs <?php echo $sum; ?>/-</strong></td>
                        <td>
                        <td>
                    <tr><a href="https://aushope.online"> <button type="button" class="btn btn-warning">continue shopping</button></a></tr>
                    </td>
                    <?php
                    if ($sum == 0) {
                        echo 'No items in  cart';
                    } else {
                        echo "<a href='check_out_page.php?id=$user_id' class='btn btn-primary'>
                                            <i class='fa fa-check' aria-hidden='true'></i> Confirm Order
                                          </a>";
                    }
                    ?>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                   
                </div>
            </div>
        </div>
        <br><br><br><br><br><br><br><br><br><br>
    </div>
</body>

</html>
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