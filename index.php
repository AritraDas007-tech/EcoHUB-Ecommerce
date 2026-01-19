<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: center;
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

        .container {
            margin: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product 
        {
            background-color: #fff;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 20%; /* Increase the width */
            height: 300px; /* Set a fixed height or adjust as needed */
            box-sizing: border-box;
            position: relative;
        }


        img {
            max-width: 100%;
            height: auto; 
            margin-bottom: 10px;
        }

        .product-info {
            margin-top: 10px;
        }

        .delete-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #ff0000;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }


        .product img
        {
            width: 100%;
            height: 150px; /* Set a fixed height or adjust as needed */
            object-fit: cover; /* or object-fit: contain; depending on your preference */
            margin-bottom: 10px;
        }





    </style>
</head>
<body>

<header>
    <h1>Admin Panel</h1>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add.php">Add Product</a>
    <a href="update.php">Update Product</a>
    <a href="inventory.php">Inventory</a>
    <a href="login.php">Logout</a>
</nav>

<div class="container">
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

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="' . $row["image_path"] . '" alt="' . $row["product_name"] . '">';
            echo '<h3>' . $row["product_name"] . '</h3>';
            echo '<p class="product-info">Price: ₹' . $row["price"] . '</p>';
            echo '<p class="product-info">Description: ' . $row["description"] . '</p>';
            echo '<button class="delete-btn" onclick="deleteProduct(' . $row["prod_id"] . ')">Delete</button>';
            echo '</div>';
        }
    } else {
        echo "No products found.";
    }

    
    $conn->close();
    ?>
</div>

<script>
    function deleteProduct(prodId) {
        var confirmDelete = confirm("Are you sure you want to delete this product?");
        if (confirmDelete) {
        
            window.location.href = "delete_product.php?prod_id=" + prodId;
        }
    }
</script>

</body>
</html>
