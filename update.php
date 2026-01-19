<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Product Price</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
        }

        h2 {
            color: #ddd;
            margin-left:200;
           
        }

        header {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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
              .cart-icon {
            margin-right: 80px;
            position: fixed;
            top: 10px;
            right: 10px;
            font-size: 24px;
            color: #333;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #4CAF50;
            color: white;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 12px;
        }
    </style>
</head>
<body>
<header>
    <h1>Admin Panel</h1>
    <h2>Update Product</h2>
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 

 
    $prod_id = $_POST['prod_id'];
    $new_price = $_POST['new_price'];

    
    $sql = "UPDATE products SET price = '$new_price' WHERE prod_id = '$prod_id'";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Product Updated'); window.location.href = 'index.php';</script>";
    exit();
} else {
    echo "<script>alert('Error');</script>" . $conn->error;
}


}


$conn->close();
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="prod_id">Product ID:</label>
    <input type="text" name="prod_id" required>

    <label for="new_price">New Price:</label>
    <input type="text" name="new_price" required>

    <input type="submit" value="Update Price">
</form>

</body>
</html>
