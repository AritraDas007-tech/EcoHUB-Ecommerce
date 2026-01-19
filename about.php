<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Products Form</title>
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

        h2 {
            color: #333;
            text-align: center;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="radio"],
        input[type="checkbox"] {
            margin-top: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="navbar">
        <a href="home.php">Home</a>
        <a href="cart.php">Cart</a>
        <a href="Orders.php">Orders</a>
        <a href="About.php">About</a>
    </div>

    <h2>Sustainable Products Form</h2>

    <form action="submit_sustainability_form.php" method="post">

        <!-- Product Information -->
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="productName" required>

        <label for="brand">Brand:</label>
        <input type="text" id="brand" name="brand" required>

        <!-- Sustainability Features -->
        <label>Sustainability Features:</label>
        <div>
            <input type="checkbox" id="recyclableMaterials" name="recyclableMaterials">
            <label for="recyclableMaterials">Recyclable Materials</label>
        </div>

        <div>
            <input type="checkbox" id="renewableEnergy" name="renewableEnergy">
            <label for="renewableEnergy">Renewable Energy Use in Production</label>
        </div>

       
        <button type="submit">Submit</button>
    </form>

</body>

</html>
