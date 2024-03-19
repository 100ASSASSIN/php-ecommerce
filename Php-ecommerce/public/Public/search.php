<?php
// Function to fetch autocorrection suggestion from Google
function getAutocorrectedQuery($query) {
    $url = "http://suggestqueries.google.com/complete/search?output=firefox&q=" . urlencode($query);
    $result = file_get_contents($url);
    $data = json_decode($result);
    $suggestions = [];
    if(isset($data[1])) {
        $suggestions = $data[1];
    }
    return $suggestions;
}

// Establish database connection

$servername = "localhost";
$username = "u967353045_assassin01"; // Update with your actual username
$password = "Aus@9047672441"; // Update with your actual password
$dbname = "u967353045_root"; // Update with your actual database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = '';
$search_autocorrected = [];
if(isset($_POST["query"])) {
    $search = $_POST["query"];
    $search_autocorrected = getAutocorrectedQuery($search);

    // SQL query to search in your database
    $sql = "SELECT * FROM items WHERE name LIKE '%$search%'";

    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $link = $row['name'];
            $output .= "<a href=\"$link\">" . '<p>' . $row["name"] . '</p>' . '</a>';
             // Corrected syntax for appending output
        }
    } else {
        $output = '<p>No results found.</p>';
    }
}

echo $output;

// Display related words
if (!empty($search_autocorrected)) {
    echo "<p>Related Words:</p>";
    echo "<ul>";
    foreach ($search_autocorrected as $suggestion) {
        echo "<li>$suggestion</li>";
    }
    echo "</ul>";
}

$conn->close();
?>
<style>
        /* Style for search bar input */
        #search-bar {
            width: 300px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Style for search results */
        #result {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            list-style-type: none;
            padding: 0;
            margin-top: 5px;
            max-height: 500px;
            overflow-y: auto;
        }

        /* Style for individual search result items */
        #result a {
            display: block;
            padding: 10px;
            text-decoration: none;
            color: #333;
        }

        /* Style for related words section */
        #related-words {
            margin-top: 20px;
        }

        #related-words p {
            font-weight: bold;
            margin-bottom: 5px;
        }

        #related-words ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #related-words li {
            margin-left: 20px;
        }
</style>