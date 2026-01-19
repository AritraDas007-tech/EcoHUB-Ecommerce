<?php

if (isset($_GET['prod_id'])) {
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "pro";

 
    $conn = new mysqli($servername, $username, $password, $database);

  
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $prod_id = $_GET['prod_id'];

   
    $sql = "DELETE FROM products WHERE prod_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $prod_id);

    if ($stmt->execute()) {
        echo "<script>alert('Product Deleted'); window.location.href = 'index.php';</script>";
    exit();
    } else {
       
        echo "<script>alert('Error');</script>" . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
} else {
    
    header("Location: index.php");
    exit();
}
?>
