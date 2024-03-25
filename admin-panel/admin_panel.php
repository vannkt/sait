<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "service 5 stars";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to fetch portfolio items from the database
function getPortfolioItems() {
    global $conn;
    $sql = "SELECT * FROM `portfolio_items`";  // Use backticks around the table name
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

// Display portfolio items in the admin panel
$portfolioItems = getPortfolioItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css-for-admin/admin-panel.css">
    <title>Сервиз 5 Звезди админ</title>
</head>
<body>
    <ul class="navbar">
        <li><a href="editOffers.html">Оферти</a></li>
        <li><a href="editProducts.html">Продукти</a></li>
        <li><a href="editNews.html">Новини</a></li>
        <li><a href="editPortfolio.php">Портфолио</a></li> <!-- Add a link to the portfolio editing page -->
    </ul>  

    <h2>Портфолио</h2>
    <table>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($portfolioItems as $item): ?>
            <tr>
                <td><?= $item['title'] ?></td>
                <td><img src="<?= $item['image_path'] ?>" alt="<?= $item['title'] ?>" style="width: 100px;"></td>
                <td>
                    <a href="editPortfolio.php?id=1<?= $item['id'] ?>">Edit</a>
                    <a href="deletePortfolioItem.php?id=<?= $item['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
$conn->close();
?>
