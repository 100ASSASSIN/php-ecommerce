<?php
session_start();
require 'check_if_added.php';
include "nav-bar.php";
?>

<head>
    <link rel="stylesheet" href="/Components/navbar/navbar-plugin.css">
    <link rel="stylesheet" href="/Assets/icons/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="\Public\css\page-1.css">
    <script src="\Composables\page-1.js"></script>
    <title>PC Code - Streaming 09</title>
</head>
<style>
    html,body{
        width: 100%;
        height: 100%;
        margin: 0px;
        padding: 0px;
        overflow-x: hidden;
      }
    #gamer{
    max-width: 1500px;
    margin: auto;
    background: white;
    padding: 10px;
    z-index: 1;
    }
#zoomC {
  /* (A) DIMENSIONS */
  width: 450px;
  height: 460px;
  position: absolute;
  top: 150px;
  left: 40px;
  display: flex;
  border-radius: 2px;

  /* (B) BACKGROUND IMAGE */
  background: url("/Public/img/img1.webp");
  background-position: center;
  background-size: cover;
}
.spc {
  padding-left: 550px;
  padding-top: 150px;
  font-family: "Gill Sans", "Gill Sans MT", Calibri, "Trebuchet MS", sans-serif;
  font-size: larger;
  font-weight: bolder;
}
.spc1 {
  display: flex;
  position: absolute;
  top: 700px;
  left: 30px;
}
.caption{
color: black;
    display: flex;
    position: absolute;
    padding-top: 20px;
    left: 550px;
}
</style>

<div id="gamer">
    <div id="zoomC"></div>
</div>
<div class="spc">
    Streamer-Pro 09 - Streaming PC PC Code - Streaming 09
    <br> Specifications - Processor Intel Core i5...
    </br>
    Vendor: PC Build
    <br>
    SKU: Streaming 09<br>
    Availability: In Stock
    <br>
    Product Type: PC Build
    <br>
    <h4 style="color:red;">Rs. 93,371.00
    </h4>Rs. 105,782.00
    <BR>
    <div class="col-md-3 col-sm-6">
        <div class="thumbnail">
            <a href="cart.php">
            </a>
            <center>
                <div class="caption">
                    <?php if (!isset($_SESSION['email'])) {  ?>
                        <p><a href="login.php" role="button" class="btn btn-primary btn-block">Buy Now</a></p>
                        <?php
                    } else {
                        if (check_if_added_to_cart(1)) {
                            echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
                        } else {
                        ?>
                            <a href="cart_add.php?id=1" class="btn btn-danger" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
                    <?php
                        }
                    }
                    ?>
                </div>
            </center>
        </div>
    </div>
    </form>
</div>
<div class="spc1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    </head>

    <body>
        <div class="container mt-5">
            <h2 class="fw-bold">PC Code - Streaming 09 Streaming PC PC Code - Streaming 09 Specifications - Processor Intel Core i5...</h2>
            <p></p>
            <h3 class="fw-bold">Specifications -</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Component</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Processor</td>
                        <td>Intel Core i5 13400F Processor</td>
                    </tr>
                    <tr>
                        <td>Motherboard</td>
                        <td>MSI B760M Bomber WIFI Motherboard</td>
                    </tr>
                    <tr>
                        <td>RAM</td>
                        <td>Adata XPG Lancer RGB 32GB (16x2) 5200MHz DDR5</td>
                    </tr>
                    <tr>
                        <td>Graphics Card</td>
                        <td>Zotac GeForce RTX 4060 Ti 8GB Twin Edge OC SPIDER-MAN™: Across the Spider-Verse Bundle Graphic Card</td>
                    </tr>
                    <tr>
                        <td>CPU Cooler</td>
                        <td>Cooler Master Hyper 212 Spectrum V3 CPU Air Cooler (Black)</td>
                    </tr>
                    <tr>
                        <td>SSD</td>
                        <td>Crucial P3 500GB M.2 NVMe Internal SSD</td>
                    </tr>
                    <tr>
                        <td>SSD 2</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>HDD</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>SMPS</td>
                        <td>MSI MAG A650BN 80+ Bronze Non Modular Power Supply (650 W)</td>
                    </tr>
                    <tr>
                        <td>Case</td>
                        <td>Cooler Master CMP 520 ARGB Mid Tower Cabinet (Black)</td>
                    </tr>
                    <tr>
                        <td>Cooling Fans</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Accessories 1</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Accessories 2</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>Thermal Paste</td>
                        <td>Cooler Master Master Gel Pro</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</div>