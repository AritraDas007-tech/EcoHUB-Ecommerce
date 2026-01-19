<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Sign Up</title>
    <style>
        body,
        html {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-image: url('b.png');
            background-size: cover;
            background-position: center;
        }

        .container {
            margin-top: 0;
            margin-left :490px; ;
            width: 400px;
            height: 585px;
            padding: 70px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
            font-size: 16px;
        }

        input {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #2980b9;
        }

        .already-registered {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }

        .already-registered a {
            color: #3498db;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Replace these values with your actual database credentials
            $host = 'localhost';       // e.g., 'localhost'
            $username = 'root';
            $password = '';
            $database = 'pro';

            // Create a mysqli connection
            $mysqli = new mysqli($host, $username, $password, $database);

            // Check the connection
            if ($mysqli->connect_error) {
                die("Error: Unable to connect to the database. " . $mysqli->connect_error);
            }

            function hashPassword($password) {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                return $hashedPassword;
            }

            // Retrieve user input from the form
            $username = $mysqli->real_escape_string($_POST['username']);
            $email = $mysqli->real_escape_string($_POST['email']);
            $password = hashPassword($_POST['password']); // Hash the password
            $address = $mysqli->real_escape_string($_POST['address']);
            $phone = $mysqli->real_escape_string($_POST['phone']);

            // Insert the user data into the database
            $query = "INSERT INTO users (username, email, password, address, phone) VALUES ('$username', '$email', '$password', '$address', '$phone')";
            
            if ($mysqli->query($query)) {
                echo '<script>alert("Sign-up successful!");</script>';
                echo '<script>window.location.href = "login.php";</script>';
                exit();
            } else {
                echo '<script>alert("unsuccessful!");</script>';
            }

            // Close the database connection
            $mysqli->close();
        }
        ?>

        <h2>Sign Up</h2>
        <hr>
        <form action="#" method="post" id="signup-form">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <p class="already-registered">Already registered? <a href="login.php">Login here</a>.</p>

            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>
