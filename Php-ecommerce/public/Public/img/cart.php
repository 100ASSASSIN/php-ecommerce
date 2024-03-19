<?php
session_start();
require 'connection.php';
if (!isset($_SESSION['email'])) {
    header('location: login.php');
}
$user_id = $_SESSION['id'];
//A session is started with the session_start() function.
//Session variables are set with the PHP global variable: $_SESSION.
//Now, let's create a new page called "demo_session1.php". In this page, we start a new PHP session and set some session variables
////////////END//////////////////////////////
$user_products_query = "SELECT it.id, it.name, it.price FROM users_items ut
                        INNER JOIN items it ON it.id = ut.item_id 
                        WHERE ut.user_id = ?";
///This SQL query selects specific columns (id, name, and price) from two tables (users_items and items). 
///It uses an INNER JOIN to combine rows from both tables where the id in the items table matches the item_id in the users_items table.
/// The result is filtered to only include rows where the user_id in the users_items table matches a parameter (denoted by ?),
/// which will be supplied later.        
$stmt = $con->prepare($user_products_query);
////Prepare SQL Statement:
////The code prepares an SQL statement using the $con connection object. This step helps prevent SQL injection by properly escaping and handling user inputs.
$stmt->bind_param("i", $user_id);
/////This binds the value of $user_id to the placeholder in the SQL query (?). The parameter type is specified as "i," indicating that the value is expected to be an integer.
$stmt->execute();
///This line executes the prepared SQL statement with the bound parameter
$user_products_result = $stmt->get_result();
///This retrieves the result set from the executed SQL statement. It's assumed that the result set contains information about the products associated with the specified user.
$no_of_user_products = $user_products_result->num_rows;
////The code counts the number of rows in the result set, representing the number of products associated with the user.
$sum = 0;
////A variable $sum is initialized to zero. It seems like this variable might be used to accumulate a sum of some values in the subsequent code (which is not provided).
///The provided code segment focuses on querying the database for information about products associated with a specific user, counting the number of products, and initializing a variable for summing some values related to the products.

//cart-page-start
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
///cart-page-end
require 'footer.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>AUS</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
    <!-- jQuery library -->
    <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <!-- External CSS -->
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="/Root/Components/navbar/navbar-plugin.css">
    <link rel="stylesheet" href="/Root/Assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <style>
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
            <th>Item Number</th>
            <th>Item Name</th>
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
        ?>
            <tr>
                <td><?php echo $counter ?></td>
                <td><?php echo $row['name'] ?></td>
                <td>Rs <?php echo $row['price'] ?>/-</td>
                <td>
                    <a href='cart_remove.php?id=<?php echo $row['id'] ?>' class='btn btn-danger'>
                        <i class="fa fa-trash" aria-hidden="true"></i> Remove
                    </a>
                </td>
            </tr>
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
                    echo "<a href='success.php?id=$user_id' class='btn btn-primary'>
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