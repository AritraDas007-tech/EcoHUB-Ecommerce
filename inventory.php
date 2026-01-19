<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Inventory</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px auto;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        color: #ddd;
        margin-left: 200;
    }

    nav {
        background-color: #444;
        padding: 10px;
        text-align: center;
    }

    nav a {
        color: white;
        padding: 10px;
        text-decoration: none;
        margin: 0 10px;
    }

    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }

    header {
        background-color: #333;
        padding: 10px;
        color: white;
        text-align: center;
        width: 100%;
        margin: 0;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    img {
        width: 180px; /* Set a fixed width */
        height: 100px; /* Set a fixed height */
        object-fit: cover; /* or object-fit: contain; depending on your preference */
    }
</style>



</head>
<body>
<header>
    <h1>Admin Panel</h1>
    <h2>Inventory</h2>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add.php">Add Product</a>
    <a href="update.php">Update Product</a>
    <a href="inventory.php">Inventory</a>
    <a href="login.php">Logout</a>
</nav>



    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pro";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result) {
        if ($result->num_rows > 0) {
            echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['prod_id']}</td>
                    <td>{$row['product_name']}</td>
                    <td>{$row['price']}</td>
                    <td>{$row['description']}</td>
                    <td><img src='{$row['image_path']}' alt='Product Image'></td>
                </tr>";
            }

            echo "</table>";
        } else {
            echo "No products found.";
        }
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    ?>

    <!-- Add any additional content or styling as needed -->

</body>
</html>
