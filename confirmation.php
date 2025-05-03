<?php
session_start();

// Check if order details are set in session
if (!isset($_SESSION['orderDetails'])) {
    header('Location: check.php'); // Redirect back to checkout if no order details are found
    exit();
}

$orderDetails = $_SESSION['orderDetails'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link rel="stylesheet" href="cheak.css">
</head>
<body>
    <div class="confirmation-container">
        <h1 class="confirmation-title">Order Confirmation</h1>

        <div class="order-details">
            <p><strong>Full Name:</strong> <?php echo htmlspecialchars($orderDetails['fullName']); ?></p>
            <p><strong>Address:</strong> <?php echo htmlspecialchars($orderDetails['address']); ?></p>
            <p><strong>Country:</strong> <?php echo htmlspecialchars($orderDetails['country']); ?></p>
            <p><strong>Payment Method:</strong> <?php echo htmlspecialchars($orderDetails['paymentMethod']); ?></p>
        </div>

        <div class="action-btns">
            <a href="index.html" class="back-btn">Back to Shopping</a>
            <a href="checkout.php" class="new-order-btn">Make Another Order</a>
        </div>
    </div>
</body>
</html>
