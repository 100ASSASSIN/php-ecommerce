<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Image Upload</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="id">Item ID</label>
        <input type="number" id="id" name="id"><br><br>
        <label for="name">Item Name</label>
        <input type="text" id="name" name="name"><br><br>
        <label for="price">Price</label>
        <input type="number" id="price" name="price"><br><br>
        <input type="file" name="image">
        <button type="submit" name="submit">Upload</button>
    </form>
</body>
</html>
