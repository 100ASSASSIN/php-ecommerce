<?php
// Assuming you have a database connection established
require 'connection2.php';

// Define the table names
$source_table = 'person';
$destination_table = 'person2';

// Select all rows from the source table
$select_query = "SELECT * FROM $source_table";
$result = mysqli_query($con, $select_query);

if ($result) {
    // Loop through the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Insert each row into the destination table
        $insert_query = "INSERT INTO $destination_table (id, user_id, items_id, orders) VALUES ('$row[id]', '$row[user_id]', '$row[items_id]', '$row[orders]')";
        mysqli_query($con, $insert_query);
    }

    echo 'Data transfer successful!';
} else {
    echo 'Error selecting data from the source table: ' . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
