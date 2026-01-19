<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <style>
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
            height: 350px;
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
            margin-right: 20px;
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
            margin-right: 15px;
            margin-left: 830px;
            margin-top: 7px;
            border: 1px solid #ddd;
            border-radius: 4px;
            outline: none;
            margin-left: 770px;
        }

        /* Styles for the search button */
        #searchButton {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;  
            margin-right: 5px;
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

        .profile-logo {
    margin-right: 10px; /* Adjust margin as needed */
    height: 24px; /* Adjust height as needed */
    width: 24px; /* Adjust width as needed */
    margin-top:13px; ;
    
}

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
    <div class="side-navbar" id="sideNavbar">

        <!-- User Profile with Logo -->
        <a href="edit_profile.php">
            <img src="uploads/profile logo.png" alt="User Profile Logo" class="profile-logo">
            User Profile
        </a> <!-- Replace "user_profile_logo.png" with the path to your actual logo image -->

        <a href="#" onclick="filterProducts('men')">Men's Fashion </a>
        <a href="#" onclick="filterProducts('women')">Women's Fashion</a>
        <a href="#" onclick="filterProducts('kids')">Kid's Fashion</a>
        <a href="#" onclick="filterProducts('furniture')">Furnitures</a>
        <a href="#" onclick="filterProducts('home')">Home Decoratives</a>
        <a href="#" onclick="filterProducts('cutlery')">Cutlery & Kitchen</a>
        <a href="#" onclick="filterProducts('stationery')">Stationery</a>
    </div>

    <div class="slideshow-container">
        <!-- Slides -->
        <div class="mySlides">
            <img src="uploads/banner1.png" alt="Slide 1">
        </div>
        <div class="mySlides">
            <img src="uploads/banner2.png" alt="Slide 2">
        </div>
        <div class="mySlides">
            <img src="uploads/banner3.png" alt="Slide 3">
        </div>

        <!-- Navigation dots -->
        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
    <div class="content">
        <?php
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "pro";
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT prod_id, product_name, description, price, image_path FROM products";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product-item'>";
                if (!empty($row["image_path"])) {
                    echo '<img src="' . $row["image_path"] . '" alt="Product Image" onclick="openProductDetails(' . $row["prod_id"] . ')">';
                }
                echo '<div class="product-details">';
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
            echo "No products found.";
        }
        $conn->close();
        ?>
    </div>

    <script>
        var cartCount = 0;
        var totalPrice = 0;

        function addToCart(productId, productName, productPrice, quantity) {
    cartCount += parseInt(quantity);
    document.getElementById("cartCount").innerHTML = cartCount;
    var cartItem = document.createElement("div");
    cartItem.className = "cart-item";
    cartItem.innerHTML = '<span class="cart-item-number">' + cartCount + '.</span>' +
        '<span class="product-name">' + productName + '</span>' +
        '<span class="product-quantity">Quantity: ' + quantity + '</span>' +
        '<span class="product-price">₹' + (productPrice * quantity).toFixed(2) + '</span>';
    document.getElementById("cartContainer").appendChild(cartItem);
    totalPrice += parseFloat(productPrice * quantity);
    document.getElementById("total").innerHTML = 'Total: ₹' + totalPrice.toFixed(2) + "<hr>";

    // Send AJAX request to add product to cart
    $.ajax({
        url: 'add_to_cart.php',
        type: 'POST',
        data: {
            productId: productId,
            productName: productName,
            productPrice: productPrice,
            quantity: quantity
        },
        success: function(response) {
            // Handle success if needed
        },
        error: function(error) {
            console.error('Error:', error);
        }
    });
}


        function toggleCart() {
            var cartContainer = document.getElementById("cartContainer");
            var checkoutButton = document.createElement("button");
            checkoutButton.textContent = "Checkout";
            checkoutButton.className = "checkout-btn";
            checkoutButton.onclick = function() {
                // Redirect to cart.php with selected products
                var selectedProducts = document.querySelectorAll(".cart-item");
                var selectedProductNames = [];
                selectedProducts.forEach(function(item) {
                    var productName = item.querySelector(".product-name").textContent;
                    selectedProductNames.push(productName);
                });
                var selectedProductNamesJson = JSON.stringify(selectedProductNames);
                window.location.href = "cart.php?products=" + encodeURIComponent(selectedProductNamesJson);
            };
            // Remove any existing checkout button
            var existingCheckoutButton = cartContainer.querySelector(".checkout-btn");
            if (existingCheckoutButton) {
                cartContainer.removeChild(existingCheckoutButton);
            }
            // Append the checkout button
            cartContainer.appendChild(checkoutButton);
            cartContainer.style.display = (cartContainer.style.display === "block") ? "none" : "block";
        }

        function searchProducts() {
            var searchQuery = document.getElementById("searchInput").value.toLowerCase();
            var productItems = document.querySelectorAll('.product-item');

            productItems.forEach(function (item) {
                var productName = item.querySelector('.product-name').innerText.toLowerCase();
                var productDescription = item.querySelector('.product-description').innerText.toLowerCase();

                if (productName.includes(searchQuery) || productDescription.includes(searchQuery)) {
                    item.style.display = "block";
                } else {
                    item.style.display = "none";
                }
            });
        }

        function showSideNavbar() {
            var sideNavbar = document.getElementById("sideNavbar");
            sideNavbar.style.display = "block";
        }
        
       // Slideshow script
       var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slideIndex++;

    if (slideIndex > slides.length) {
        slideIndex = 1;
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
    setTimeout(showSlides, 5000); // Change slide every 10 seconds
}

// Initial call to start the slideshow
showSlides(); 

// Add existing JavaScript functions here

function filterProducts(category) {
            // Send an AJAX request to fetch products based on the selected category
            $.ajax({
                url: 'filter_products.php', // Create a new PHP file (filter_products.php) to handle the request
                type: 'GET',
                data: { category: category },
                success: function (response) {
                    // Update the content div with the filtered products
                    $('.content').html(response);
                },
                error: function (error) {
                    console.error('Error:', error);
                }
            });
        }

        function openProductDetails(productId) {
    window.location.href = "product_details.php?id=" + productId;
}
        
    </script>
</body>

</html>
