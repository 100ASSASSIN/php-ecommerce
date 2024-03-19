<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Root/Components/navbar/navbar-plugin.css">
    <link rel="stylesheet" href="/Root/public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f538f1ee6e.js" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/9078fb565f.js" crossorigin="anonymous"></script>
   <script src="Composables\com.js"></script>
   <script src="Features/fu.js"></script>
   <script src="Components/Preload/preload.js"></script>
    </header>
    <title>Your Page Title</title>
</head>
<body>
    <div id="top-row">
        <ul class="nav-links">
            <?php
            if (isset($_SESSION['email'])) {
            ?>
                <li><a href="/Root/index.php"><i class="fa fa-rebel" aria-hidden="true"></i> ASSASSIN</a></li>
                <li class="center"><a href="/root/index.php"><i class="fa-brands fa-studiovinari"></i>HOME</a></li>
                <li class="center"><a href="#"><i class="fa-brands fa-sith"></i>PRODUCT<span></span></a></li>
                <li class="upward"><a href="#"><i class="fa-brands fa-phoenix-squadron"></i>Services<span></span></a></li>
                <li class="upward"><a href="/Root/public/orders.php"><i class="fa-brands fa-dropbox"></i>Orders<span></span></a></li>
                <li class="upward"><a href="/Root/public/account_admin.php"><i class="fa-brands fa-threads"></i>Account<span></span></a></li>
                <li><a href="/Root/public/logout.php"><span></span><i class="fa fa-sign-out" aria-hidden="true"></i>log out</a></li>
                <li class="forward"><a href="\Root\public/cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i> CART<span></span></a></li>
            <?php
            } else {
            ?>
            <li><a href="/Root/index.php"><i class="fa fa-rebel" aria-hidden="true"></i> ASSASSIN</a></li>
                <li class="center"><a href="index.php">HOME</a></li>
                <li class="center"><a href="#">PRODUCT<span></span></a></li>
                <li class="upward"><a href="#">Services<span></span></a></li>
                <li><a href="/Root/public/signup.php"><span></span><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                <li><a href="/Root/public/login.php"><span></span> <i class="fa fa-user-plus" aria-hidden="true"></i> Login</a></li>
            <?php
            }
            ?>
        </ul>
    </div> 
</body>
</html>