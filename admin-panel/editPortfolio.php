<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service 5 stars";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to get a portfolio item by ID
function getPortfolioItemById($id) {
    global $conn;
    $id = $conn->real_escape_string($id);  // Escape input to prevent SQL injection
    $sql = "SELECT * FROM `portfolio_items` WHERE `id` = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        return $result->fetch_assoc();
    } else {
        return null;
    }
}

// Check if the ID is provided in the URL
if (isset($_GET['id'])) {
    $portfolioItemId = $_GET['id'];
    $portfolioItem = getPortfolioItemById($portfolioItemId);

    if (!$portfolioItem) {
        die("Portfolio item not found");
    }
} else {
    die("Portfolio item ID not provided");
}

// Handle form submission for editing
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form data and update the portfolio item in the database
    // Make sure to validate and sanitize user input to prevent SQL injection and other security issues
    // Update the portfolio item using an UPDATE SQL query
    // Redirect to another page after the update is complete
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Portfolio Item</title>
</head>
<body>
    <h2>Edit Portfolio Item</h2>

    <!-- Form for editing portfolio item -->
    <form method="post" action="">
        <!-- Display existing values for editing -->
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="<?= $portfolioItem['title'] ?>" required>

        <label for="image_path">Image Path:</label>
        <input type="text" id="image_path" name="image_path" value="<?= $portfolioItem['image_path'] ?>" required>

        <!-- Add more form fields as needed -->

        <button type="submit">Save Changes</button>
    </form>
</body>
</html>
