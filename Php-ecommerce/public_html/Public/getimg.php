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
    color:#00A0C6; 
    text-decoration:none; 
    cursor:pointer;  
}

    </style>
    <div>
        <?php
        require 'nav-bar.php';
        ?>
        <br>
        <div id="alg">
            <div class="container1">
                <table class="table table-bordered table-striped">
                    <thead>
                     <tr>
                            <th>Cart Items</th>
                            <th>Item</th>
                            <th><b>Item Name</b></th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $stmt->execute();
                        $user_products_result = $stmt->get_result();
                        $counter = 1;
                        while ($row = $user_products_result->fetch_assoc()) {
                            ?>   <table class='new'>
                            <tr>
                                <td><?php echo $counter ?></td></br>
                                <td> <?php echo "<img src='data:image/jpeg;base64," . base64_encode($row['image_data']) . "' alt='" . $row['filename'] . "' class='test' />"; ?>
                                </td></br>
                                <td><a href="https://aushope.online/index"><?php echo $row['name'] ?></a></td>
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
                                <?php
                                if ($sum == 0) {
                                    echo 'No items in the cart';
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
        <br><br><br><br><br><br><br><br><br><br>
    </div>
</body>
</html>