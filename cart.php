<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Shopping Cart</title>
<style>
/* CSS for Cart Page */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
}

h1 {
    text-align: center;
}

.cart {
    border-collapse: collapse;
    width: 100%;
}

.cart th, .cart td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.cart th {
    background-color: #f2f2f2;
}

.cart tr:hover {
    background-color: #f5f5f5;
}
body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            position: fixed;
            width: 100%;
            z-index: 1000;
        }

        .navbar a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        .content {
            padding: 70px 10px 10px 220px; /* Adjusted to make space for the fixed navbar and side navbar */
            display: grid;
            padding-top: 10px;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .product-item {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: center;
        }

        .product-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-details {
            text-align: left;
        }

        .product-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .product-description {
            margin-bottom: 10px;
        }

        .product-price {
            display: block;
        }

        .add-to-cart-btn {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .add-to-cart-btn:hover {
            background-color: #45a049;
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

        #cartContainer {
            display: none;
            position: fixed;
            top: 70px;
            right: 10px;
            background-color: #f8f8f8;
            border: 1px solid #ccc;
            padding: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-height: 200px;
            overflow-y: auto;
            width: 200px;
            z-index: 999;
        }

        .cart-item {
            margin-bottom: 10px;
            padding: 8px;
            border-bottom: 1px solid #ddd;
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .product-name {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .product-quantity {
            display: block;
        }

        .product-price {
            display: block;
        }

        #total {
            font-size: 16px;
            font-weight: bold;
            margin-top: 10px;
        }

        /* Styles for the search bar */
        #searchInput {
            padding: 8px;
            margin-right: 5px;
            margin-left: 830px;
            margin-top: 7px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
        }

        /* Styles for the search button */
        #searchButton {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #searchButton:hover {
            background-color: #45a049;
        }

        /* Styles for the side navbar */
        .side-navbar {
            height: 100%;
            width: 200px;
            position: fixed;
            top: 48px; /* Adjusted to make space for the fixed navbar */
            left: 0;
            background-color: #4CAF50;
            overflow-y: auto;
            padding-top: 20px;
            z-index: 1000;
            color: #bfc9ad  ;
        }

        .side-navbar a {
            padding: 15px;
            text-decoration: none;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .side-navbar a:hover {
            background-color: #ddd;
            color: black;
        }

      /* Styles for the slideshow */
      .slideshow-container {
            max-width: 2000px;
            max-height: 350px; /* Adjust the max-height to your desired value */
            position: relative;
            margin: auto;
            padding-left: 202px;
            padding-top: 50px;
            overflow: hidden; /* Ensure that the slideshow does not overflow its container */
        }

        .mySlides {
            display: none;
            height: 100%; /* Set the height to 100% to fill the container */
        }

        .mySlides img {
    width: 1400px; /* Adjust the width as needed */
    height: 400px; /* Adjust the height as needed */
    object-fit: cover; /* Preserve aspect ratio and cover the entire container */
}

.dot-container {
    text-align: center;
    margin-top: 50px; /* Adjust the distance from the slideshow as needed */
}

.dot {
   height: 15px;
    width: 15px;
    margin: 0 5px; /* Adjust the distance between dots as needed */
    background-color: #bbb;
    border-radius: 50%;
    display: inline-block;
    transition: background-color 0.6s ease;
    cursor: pointer;
}

.active {
    background-color: #717171;
}

.checkout-btn {
            background-color: #f44336; /* Red color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .checkout-btn:hover {
            background-color: #d32f2f; /* Darker red color on hover */
        }
</style>
</head>
<body>
<div class="navbar">
        <a href="home.php" onclick="showSideNavbar()">Home</a>
        <a href="cart.php">Cart</a>
        <a href="Orders.php">Orders</a>
        <a href="About.php">About</a>

        <input type="text" id="searchInput" placeholder="Search products...">
        <button id="searchButton" onclick="searchProducts()">Search</button>

        
        <div class="cart-icon" onclick="toggleCart()">
            🛒
            <div class="cart-count" id="cartCount">0</div>
            <div id="cartContainer">
                <div id="total">Total: ₹0.00</div>
            </div>
        </div>
        <a style="float:right" href="login.php">Logout</a>
    </div>

<div class="container">
    <h1>Shopping Cart</h1>
    <table class="cart">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
           if(isset($_GET['products'])) {
            $selectedProducts = json_decode($_GET['products']);
            
            // Display the details of selected products
            foreach ($selectedProducts as $productName) {
                echo "<p>$productName</p>";
                // You can display more details like quantity, price, etc. here
            }
        } else {
            echo "No products selected.";
        }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>
