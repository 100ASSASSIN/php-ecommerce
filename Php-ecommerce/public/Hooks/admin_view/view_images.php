<style>
.test {
    border-radius: 20px;
    height: 400px;
    width: 300px;
    padding: 5px;
}
</style>
<?php
// Connect to database
$conn = mysqli_connect("localhost", "u967353045_assassin01", "Aus@9047672441", "u967353045_root");

// Fetch images from database
$sql = "SELECT filename, image_data FROM items ";
$result = $conn->query($sql);

// Display images
while ($row = $result->fetch_assoc())  {
    $imageData = base64_encode($row['image_data']);
    echo '<img class="test" src="data:image/jpeg;base64,' . $imageData . '" alt="' . $row['filename'] . '">';
}

// Close connection
mysqli_close($conn);
?>
