<?php
// Check if form is submitted
if (isset($_POST['submit'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "u967353045_assassin01";
    $password = "Aus@9047672441";
    $dbname = "u967353045_root";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // File properties
    $file = $_FILES['image'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    // File extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Allowed file types
    $allowedExtensions = array("jpg", "jpeg","webp", "png", "gif");

    // Check if file extension is allowed
    if (in_array($fileExt, $allowedExtensions)) {
        // Check if there is no file upload error
        if ($fileError === 0) {
            // Read file data
            $imageData = file_get_contents($fileTmpName);

            // Save file info to database
            $sql = "INSERT INTO items (id, name, price, filename, image_data) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("issss", $id, $name, $price, $fileName, $imageData);
            $stmt->execute();
            $stmt->close();

            echo "New item added successfully ";
            header("refresh:2;URL=index.php");
           
            
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "File type not allowed.";
    }

    // Close connection
    $conn->close();
}
?>
