<?php
$name = $_POST['name'];
$email = $_POST['email'];
$total = $_POST['total'];
$plan = $_POST['plan'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
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
            <div>
                <button class="btn btn-success" id="rzp-button1">Pay with Razorpay</button>
            </div>
        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var options = {
            "key": "rzp_test_Bq9v3t9rz1lui5", // Enter the Key ID generated from the Dashboard
            "amount": "<?php echo $total * 100; ?>", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Your Company Name",
            "description": "Transaction for <?php echo $plan; ?>",
            "image": "https://i.pinimg.com/564x/16/56/eb/1656eb4731f43c8984d86d30a32807c7.jpg",
            //"order_id": " //echo(rand(10,100));", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
            "callback_url": "thank.php",
            "prefill": {
                "name": "<?php echo $name; ?>",
                "email": "<?php echo $email; ?>",
                "contact": "<?php echo $mobile; ?>"
            },
            "notes": {
                "address": "<?php echo $address; ?>"
            },
            "theme": {
                "color": "glod"
            }
        };
        var rzp1 = new Razorpay(options);
        document.getElementById('rzp-button1').onclick = function(e) {
            rzp1.open();
            e.preventDefault();
        }
    </script>

    <script>
        window.onload = function() {
            document.getElementById('rzp-button1').click();
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
