<?php

?>
<html>

<body>
    <header>
        <title>Admin</title>
        <style>
            h2 {
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                color: white;
            }

            #panel {
                background-image: url('https://4kwallpapers.com/images/walls/thumbs_3t/6627.jpg');
                background-size: cover;
                border-radius: 20px;
                width: 100%;
                height: 95%;
            }

            .container {
                position: absolute;

                background-color: rgba(255, 255, 255, .15);
                backdrop-filter: blur(5px);
                width: 90%;
                height: 95%;
                border-radius: 5px;
            }
        </style>
    </header>
    <div id="panel">
        <div class="container">
            <h2>
                <center>
                    <h1>ADMIN VIEW</h1>
                    <form action="/action.php" method="post">
                        <label for="name">item id</label>
                        <input type="number" id="id" name="id"><br><br>
                        <label for="name">item_name</label>
                        <input type="text" id="name" name="price"><br><br>
                        <label for="name">price</label>
                        <input type="number" id="price" name="price"><br><br>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <input type="file" name="image">
                            <button type="submit" name="submit">Upload</button>
                        </form>
                </center>
            </h2>
        </div>
    </div>
</body>

</html>