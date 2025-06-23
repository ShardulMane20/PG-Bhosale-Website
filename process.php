<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database configuration
$db_host = "localhost";
$db_user = "root";          // Default XAMPP username
$db_pass = "";              // Default XAMPP password (empty)
$db_name = "order_system";

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("<script>
        alert('Database connection failed: ".addslashes($conn->connect_error)."');
        window.location.href = 'index.php';
        </script>");
}

// Sanitize and validate inputs
$name = $conn->real_escape_string($_POST['fullname'] ?? '');
$email = $conn->real_escape_string($_POST['email'] ?? '');
$phone = $conn->real_escape_string($_POST['phone'] ?? '');
$product = $conn->real_escape_string($_POST['product'] ?? '');
$quantity = floatval($_POST['quantity'] ?? 0);
$address = $conn->real_escape_string($_POST['address'] ?? '');

// Validate required fields
if (empty($name) || empty($email) || empty($phone) || empty($product) || $quantity <= 0 || empty($address)) {
    die("<script>
        alert('Please fill all required fields correctly!');
        window.location.href = 'index.php';
        </script>");
}

// Prepare and execute SQL
$sql = "INSERT INTO orders (fullname, email, phone, product, quantity, address)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssds", $name, $email, $phone, $product, $quantity, $address);

if ($stmt->execute()) {
    echo "<script>
        alert('Order placed successfully!');
        window.location.href = 'index.php';
        </script>";
} else {
    echo "<script>
        alert('Error: ".addslashes($conn->error)."');
        window.location.href = 'index.php';
        </script>";
}

// Close connections
$stmt->close();
$conn->close();
?>