<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

// Database configuration
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "order_system";

// Create connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . htmlspecialchars($conn->connect_error));
}

// Handle Excel download request
if (isset($_GET['download_excel'])) {
    require 'vendor/autoload.php'; // Load PhpSpreadsheet
    
    // Create new Spreadsheet object
    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    
    // Set headers
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Full Name');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Phone');
    $sheet->setCellValue('E1', 'Product');
    $sheet->setCellValue('F1', 'Quantity');
    $sheet->setCellValue('G1', 'Address');
    $sheet->setCellValue('H1', 'Order Date');
    
    // Fetch data from database
    $sql = "SELECT * FROM orders ORDER BY order_date DESC";
    $result = $conn->query($sql);
    
    // Populate data
    $rowNumber = 2;
    while ($row = $result->fetch_assoc()) {
        $sheet->setCellValue('A'.$rowNumber, $row['id']);
        $sheet->setCellValue('B'.$rowNumber, $row['fullname']);
        $sheet->setCellValue('C'.$rowNumber, $row['email']);
        $sheet->setCellValue('D'.$rowNumber, $row['phone']);
        $sheet->setCellValue('E'.$rowNumber, $row['product']);
        $sheet->setCellValue('F'.$rowNumber, $row['quantity']);
        $sheet->setCellValue('G'.$rowNumber, $row['address']);
        $sheet->setCellValue('H'.$rowNumber, $row['order_date']);
        $rowNumber++;
    }
    
    // Set headers for download
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="orders_export_'.date('Y-m-d').'.xlsx"');
    header('Cache-Control: max-age=0');
    
    // Create Excel file and output
    $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    exit();
}

// Handle delete request
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM orders WHERE id = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param("i", $delete_id);
    
    if ($stmt->execute()) {
        $message = "Order deleted successfully!";
    } else {
        $message = "Error deleting order: " . htmlspecialchars($conn->error);
    }
    $stmt->close();
    
    // Redirect to avoid resubmission on refresh
    header("Location: dashboard.php?message=" . urlencode($message));
    exit();
}

// Fetch all orders
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);

// Check query success
if (!$result) {
    die("Query failed: " . htmlspecialchars($conn->error));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Order Management</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
        /* Additional style for download button */
        .download-btn {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            transition: background-color 0.3s;
            margin-right: 10px;
        }
        .download-btn:hover {
            background-color: #218838;
        }
        .nav-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
    </style>
</head>
<body>
    <header class="dashboard-header">
        <h1>Check Your Orders...!</h1>
    </header>
    
    <nav class="nav-bar">
        <span>Welcome, Admin</span>
        <div class="nav-actions">
            <a href="dashboard.php?download_excel=1" class="download-btn">Download Excel</a>
            <a href="index.php" class="logout-btn">Logout</a>
        </div>
    </nav>
    
    <div class="container">
        <?php if (isset($_GET['message'])): ?>
            <div class="alert-message <?php echo strpos($_GET['message'], 'Error') !== false ? 'alert-error' : 'alert-success'; ?>">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>
        
        <?php if ($result->num_rows > 0): ?>
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        <th>Order Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['id']); ?></td>
                            <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo htmlspecialchars($row['phone']); ?></td>
                            <td><?php echo htmlspecialchars($row['product']); ?></td>
                            <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                            <td><?php echo htmlspecialchars($row['address']); ?></td>
                            <td><?php echo htmlspecialchars($row['order_date']); ?></td>
                            <td>
                                <form method="GET" action="dashboard.php" style="display:inline;">
                                    <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                    <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this order?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert-message">
                No orders found in the database.
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
// Close connection
$conn->close();
?>