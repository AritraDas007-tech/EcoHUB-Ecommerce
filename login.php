<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Login</title>
    <style>
        body {
            background-image: url('b.png');
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .main-container {
            display: flex;
        }

        .left-container {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
            text-align: center;
            color: #fff;
            border-top-left-radius: 8px;
            border-bottom-left-radius: 8px;
            position: relative;
            overflow: hidden;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .right-container {
            width: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 700px;
            height: 500px;
            padding: 10px;
            padding-top: 20px;
            padding-top: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
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
            margin-bottom: 20px;
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

        .not-registered {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }

        .not-registered a {
            color: #3498db;
            text-decoration: none;
        }

        .error-message {
            color: #ff0000;
            margin-top: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="main-container">
        <div class="left-container" style="background-image: url('uploads/B-Login.png');">
            <?php
            // List of background images for left-container
            $backgroundImages = [
                'uploads/B-Login.png',
                'uploads/b.jpg',
            ];
            ?>
            <script>
                const leftContainer = document.querySelector('.left-container');
                let currentImageIndex = 0;

                function changeBackgroundImage() {
                    leftContainer.style.backgroundImage = `url('${backgroundImages[currentImageIndex]}')`;
                    currentImageIndex = (currentImageIndex + 1) % backgroundImages.length;
                }

                setInterval(changeBackgroundImage, 3000);
            </script>
        </div>

        <div class="right-container">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["login-username"];
                $password = $_POST["login-password"];
                $host = "localhost";
                $dbUsername = "root";
                $dbPassword = "";
                $dbName = "pro";
                $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $hardcodedUsername = "admin";
                $hardcodedPassword = password_hash("admin", PASSWORD_DEFAULT);
                if ($username == $hardcodedUsername && password_verify($password, $hardcodedPassword)) {
                    header("Location: index.php");
                    exit();
                }
                $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($dbUsername, $dbPasswordHash);
                $stmt->fetch();
                if (password_verify($password, $dbPasswordHash)) {
                    header("Location: home.php");
                    exit();
                } else {
                    echo "<div class='error-message'>Invalid username or password</div>";
                }
                $stmt->close();
                $conn->close();
            }
            ?>
            <div class="login-container">
                <h2>Login</h2>
                <form action="#" method="post" id="login-form">
                    <hr><br><label for="login-username">Username or Email:</label>
                    <input type="text" id="login-username" name="login-username" required>

                    <label for="login-password">Password:</label>
                    <input type="password" id="login-password" name="login-password" required>

                    <p class="not-registered">Not registered? <a href="sign.php">Sign up here</a>.</p>

                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
