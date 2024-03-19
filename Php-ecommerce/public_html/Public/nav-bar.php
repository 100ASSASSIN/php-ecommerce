<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="/Components/navbar/navbar-plugin.css">
    <link rel="stylesheet" href="/Public/css/font-awesome-4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/f538f1ee6e.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/9078fb565f.js" crossorigin="anonymous"></script>
    <script src="Composables/com.js"></script>
    <script src="Features/fu.js"></script>
    <script src="Components/Preload/preload.js"></script>
</head>
<body>
    <div id="top-row">
        <ul class="nav-links">
            <?php if (isset($_SESSION['email'])): ?>
                <li><a href="/index"><i class="fa fa-rebel" aria-hidden="true"></i> ASSASSIN</a></li>
                <li><a href="/index"><i class="fa-brands fa-studiovinari"></i>HOME</a></li>
                <li><a href="#"><i class="fa-brands fa-sith"></i>PRODUCT<span></span></a></li>
              
                <li><a href="/Public/orders.php"><i class="fa-brands fa-dropbox"></i>Orders<span></span></a></li>
                <li><a href="/Public/account_admin"><i class="fa-brands fa-threads"></i>Account<span></span></a></li>
                <!-- <li><a href="/Public/logout"><span></span><i class="fa fa-sign-out" aria-hidden="true"></i>log out</a></li> -->
                <li><a href="/Public/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i> CART<span></span></a></li>
                <li><input type="text" name="search" id="search" placeholder="Type to search..." size="30" onkeyup="showResult(this.value)"></li>
            <?php else: ?>
                <li><a href="/index.php"><i class="fa fa-rebel" aria-hidden="true"></i> ASSASSIN</a></li>
                <li><a href="index"><i class="fa-brands fa-studiovinari"></i>HOME</a></li>
                <li><a href="#"><i class="fa-brands fa-phoenix-squadron"></i>PRODUCT<span></span></a></li>
             
                <li><a href="/Public/signup"><span></span><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
                <li><a href="/Public/login"><span></span> <i class="fa fa-user-plus" aria-hidden="true"></i> Login</a></li>
                <li><input type="text" name="search" id="search" placeholder="Type to search..." size="30" onkeyup="showResult(this.value)"></li>
            <?php endif; ?>
        </ul>
    </div>
    <div id="result"></div>
    <style>
        #top-row {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .nav-links {
            height: 45px;
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav-links li {
            margin: 0 10px;
        }

        #result {
            position: absolute;
            top: 50px;
            left:70%;
            width: 500px;
            background-color: #fff;
            border: 1px solid #ccc;
            display: none;
            z-index: 999;
        }

        #result ul {
            list-style-type: none;
            padding: 0;
        }

        #result li {
            padding: 5px;
            cursor: pointer;
        }

        #result li:hover {
            background-color: #f0f0f0;
        }

        #search-box {
            position: relative;
        }

        #search {
            width: 100px;
        }
    </style>
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                var query = $(this).val();
                if(query != ''){
                    $.ajax({
                        url:"search.php",
                        method:"POST",
                        data:{query:query},
                        success:function(data){
                            $('#result').html(data);
                        }
                    });
                }
            });
        });
        document.addEventListener("DOMContentLoaded", function() {
            var searchInput = document.getElementById("search");
            var resultDiv = document.getElementById("result");

            // Event listener for search input
            searchInput.addEventListener("input", function() {
                // Your search logic here
                // For demonstration, let's show some dummy results
                resultDiv.innerHTML = "<ul><li>Result 1</li><li>Result 2</li><li>Result 3</li></ul>";
                resultDiv.style.display = "block";
            });

            // Event listener to close result when clicking outside
            document.addEventListener("click", function(event) {
                var targetElement = event.target; // Clicked element

                // Check if the clicked element is not inside the search box or result div
                if (!searchInput.contains(targetElement) && !resultDiv.contains(targetElement)) {
                    resultDiv.style.display = "none"; // Close the result
                }
            });
        });
    </script>
</body>
</html>
