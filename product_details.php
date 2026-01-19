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

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            margin-bottom: 10px;
        }

        p {
            color: #666;
            margin-bottom: 15px;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
        }

        /* Button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <!-- Your navbar content here -->
    </div>
    <div class="container">
        <?php
        // Establish a database connection (replace these variables with your actual database credentials)
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "pro";

        // Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch product details based on the product ID passed in the URL
        if (isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Prepare a SQL statement to fetch product details
            $stmt = $conn->prepare("SELECT product_name, description, price, image_path FROM products WHERE prod_id = ?");
            $stmt->bind_param("i", $productId);

            // Execute the statement
            $stmt->execute();

            // Bind the result variables
            $stmt->bind_result($productName, $description, $price, $imagePath);

            // Fetch the result
            $stmt->fetch();

            // Close the statement
            $stmt->close();

            // Check if product details were found
            if ($productName) {
                // Product details found, display them
                ?>
                <h2><?php echo $productName; ?></h2>
                <p>Description: <?php echo $description; ?></p>
                <p>Price: ₹<?php echo $price; ?></p>
                <img src="<?php echo $imagePath; ?>" alt="<?php echo $productName; ?>">
                <br><br>
                <!-- Add to cart button -->
                <button class="button" onclick="addToCart(<?php echo $productId; ?>, '<?php echo $productName; ?>', <?php echo $price; ?>, 1)">Add to Cart</button>
            <?php
            } else {
                // Product not found
                echo "<p>Product not found.</p>";
            }
        } else {
            // Handle case when product ID is not provided
            echo "<p>Product ID not provided.</p>";
        }
        // Close the database connection
        $conn->close();
        ?>
    </div>

    <script>
        // Function to add product to cart
        function addToCart(productId, productName, productPrice, quantity) {
            // Your addToCart function logic here
            alert("Product added to cart: " + productName);
        }
    </script>
</body>

</html>
