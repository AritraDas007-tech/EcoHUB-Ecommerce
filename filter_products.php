<?php
$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "pro";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$category = $_GET['category'];

$sql = "SELECT prod_id, product_name, description, price, image_path FROM products WHERE category = '$category'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product-item'>";
        // Display product details with a link to product_details.php
        echo "<a href='product_details.php?id=" . $row["prod_id"] . "'><img src='" . $row["image_path"] . "' alt='Product Image'></a>";
        echo "<div class='product-details'>";
        echo "<h3 class='product-name'>" . $row["product_name"] . "</h3>";
        echo "<p class='product-description'>Description: " . $row["description"] . "</p>";
        echo "<p class='product-price'>Price: ₹" . $row["price"] . "</p>";
        // Add quantity input field
        echo '<label for="quantity' . $row["prod_id"] . '">Quantity:</label>';
        echo '<input type="number" id="quantity' . $row["prod_id"] . '" name="quantity' . $row["prod_id"] . '" value="1" min="1">';
        echo '</div>';
        echo '<form method="post" action="" onsubmit="addToCart(' . $row["prod_id"] . ', \'' . $row["product_name"] . '\', ' . $row["price"] . ', document.getElementById(\'quantity' . $row["prod_id"] . '\').value); return false;">';
        echo '<input type="hidden" name="prod_id" value="' . $row["prod_id"] . '"><hr>';
        echo '<input type="submit" class="add-to-cart-btn" value="Add to Cart">';
        echo '</form>';
        echo "</div>";
    }
} else {
    echo "No products found for the selected category.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .product-item {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .product-item:hover {
            transform: translateY(-5px);
        }

        .product-details {
            padding: 10px;
        }

        .product-name {
            color: #333;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .product-description {
            color: #666;
            margin-bottom: 10px;
        }

        .product-price {
            color: #4CAF50;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Quantity input field styles */
        input[type="number"] {
            padding: 5px;
            width: 50px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-right: 5px;
        }

        /* Add to cart button styles */
        .add-to-cart-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
        }
        </style>
</head>
<html>