<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
     <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
           
        }

        header {
            background-color: #333;
            padding: 10px;
            color: white;
            text-align: center;
        }

        h2 {
            color: #ddd;
            margin-left:200;
           
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
        input[type="file"],
        input[type="submit"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: vertical;
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
    <h2>Add Product</h2>
</header>

<nav>
    <a href="index.php">Home</a>
    <a href="add.php">Add Product</a>
    <a href="update.php">Update Product</a>
    <a href="inventory.php">Inventory</a>
    <a href="login.php">Logout</a>
</nav>

          
      
  
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pro";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category = $_POST['category'];

    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        $image_path = $targetFile;

        $sql = "INSERT INTO products (product_name, price, description, image_path, category) VALUES ('$product_name', '$price', '$description', '$image_path', '$category')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Product Added'); window.location.href = 'index.php';</script>";
            exit();
        } else {
            echo "<script>alert('Error');</script>" . $conn->error;
        }
    } else {
        echo "Error moving file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" required>
        <br>

        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <br>

        <label for="description">Description:</label>
        <textarea name="description" rows="4" required></textarea>
        <br>

        <label for="category">Category:</label>
        <input type="text" name="category" required>
        <br>

        <label for="image">Image:</label>
        <input type="file" name="image" accept="image/*" required>
        <br>

        <input type="submit" value="Add Product">
    </form>
</body>
</html>