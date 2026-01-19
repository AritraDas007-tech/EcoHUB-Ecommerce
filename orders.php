<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Placed Order</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #333;
            overflow: hidden;
            color: white;
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

        .container {
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .container h2 {
            color: #333;
        }

        .container ul {
            list-style: none;
            padding: 0;
        }

        .container li {
            margin-bottom: 10px;
            color: #555;
        }

        .cancel-order-btn {
            background-color: #d9534f;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .cancel-order-btn:hover {
            background-color: #c9302c;
        }

       
        .disabled {
            pointer-events: none;
            background-color: #eee;
        }

      
        .hidden {
            display: none;

        }
        .place-order-btn {
            background-color: #5cb85c;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }

        .place-order-btn:hover {
            background-color: #4cae4c; 
        }
    </style>
    <script>
        function cancelOrder() {
            
            document.getElementById('orderItems').innerHTML = "<li>Orders not found</li>";

            
            document.getElementById('placedOrderDate').classList.add('hidden');
            document.getElementById('arrivingDate').classList.add('hidden');
            document.getElementById('total').classList.add('hidden');
            alert('Order Cancelled Successfully');
        }
    </script>
</head>
<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="orders.php">Orders</a>
        <a href="About.php">About</a>
        <a style="float:right" href="login.php">Logout</a>
    </div>

    <div class="container">
    <?php
        session_start();

        $host = 'localhost';
$dbUsername = 'root';
$password = ''; // If there is no password set, use an empty string
$dbname = 'pro';

$conn = new mysqli($host, $dbUsername, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if(!isset($_SESSION['orderItems'])) {
    $_SESSION['orderItems'] = array();
}

$orderNumber = 1;
$placedOrderDate = date("Y-m-d");
$arrivingDate = date("Y-m-d", strtotime("+7 days"));

$total = 0;
$orderItems = $_SESSION['orderItems'];

// Query the database for product information
$query = "SELECT id, name, description, price, image FROM products";
$result = $conn->query($query);

echo "
<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
</head>
<body>
    <div class='header'>
        <h1>Welcome to Our Store</h1>
        <a href='login.php'>Logout</a>
    </div>

    <div class='container'>
        <h2>Your Orders</h2><hr>";

if (count($orderItems) == 0) {
    echo "<p>Your cart is empty.</p>";
} else {
    foreach ($orderItems as $itemId => $quantity) {
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['id'] == $itemId) {
                    echo "<div class='product'>
                            <h3>" . $row['name'] . "</h3>
                            <img src='data:image/jpeg;base64," . base64_encode($row['image']) . "' alt='" . $row['name'] . "'/>
                            <p>" . $row['description'] . "</p>
                            <p>Quantity: " . $quantity . "</p>
                            <p>Price: $" . $row['price'] * $quantity . "</p>
                          </div>";
                    $total += $row['price'] * $quantity;
                }
            }
        }
    }
}

echo "
        <p>Placed Order Date: <span id='placedOrderDate'>$placedOrderDate</span></p>
        <p>Arriving Date: <span id='arrivingDate'>$arrivingDate</span></p>
        <p>Total: <span id='total'>$$total</span></p>
    </div>
</body>
</html>
";

$conn->close();
?>

        <button class="cancel-order-btn" onclick="cancelOrder()">Cancel Order</button>
        <button class="place-order-btn">Download Invoice</button>
    </div>
</body>
</html>
