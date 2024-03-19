<?php 
require "connection.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RazorPay</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="pay.css">
</head>

<body>
  <div class="container parent_main">
    <div class="card" style="width: 30rem;">
      <div class="card-body">
        <form action="payscript.php" method="post">

          <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" name="name" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Mobile</label>
            <input type="number" class="form-control" name="mobile" required>
          </div>

          <div class="mb-3">
            <label class="form-label">Billing Address</label>
            <input type="text" class="form-control" name="address" required>
         
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Total Price(Include 18% GST)</label>
            <input id="total" type="number" class="form-control" name="total">
          </div>

          <div class="text-center">
            <button type="submit" class="btn btn-primary">Pay with RazorPay</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
</body>

</html>