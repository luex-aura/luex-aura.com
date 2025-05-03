<?php
session_start();

// Sample products (can be dynamic later)
$products = [
    1 => ['name' => 'Black Luxury T-Shirt', 'price' => 4500],
    2 => ['name' => 'Gold Trim Watch', 'price' => 8500],
];

// Handle Add to Cart
if (isset($_GET['add'])) {
    $id = $_GET['add'];
    if (isset($products[$id])) {
        $_SESSION['cart'][$id] = ($_SESSION['cart'][$id] ?? 0) + 1;
    }
}

// Handle Remove
if (isset($_GET['remove'])) {
    $id = $_GET['remove'];
    unset($_SESSION['cart'][$id]);
}

// Total
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cart - LUEX AURA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="lux-header">
    <div class="container">
        <h1 class="brand">LUEX AURA</h1>
        <nav class="lux-nav">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="shop.html">Shop</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contect.htm">Contact</a></li>
                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="cart-page">
    <h2>Your Shopping Cart</h2>

    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <tr>
                <th>Item</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>

            <?php foreach ($_SESSION['cart'] as $id => $qty): ?>
                <tr>
                    <td><?= $products[$id]['name'] ?></td>
                    <td><?= $qty ?></td>
                    <td>Rs. <?= number_format($products[$id]['price'] * $qty) ?></td>
                    <td><a href="?remove=<?= $id ?>" class="remove-btn">X</a></td>
                </tr>
                <?php $total += $products[$id]['price'] * $qty; ?>
            <?php endforeach; ?>

            <tr class="cart-total">
                <td colspan="2"><strong>Total:</strong></td>
                <td colspan="2">Rs. <?= number_format($total) ?></td>
            </tr>
        </table>
    <?php else: ?>
        <p class="empty">Your cart is empty.</p>
    <?php endif; ?>
</div>

<footer>
    © 2025 LUEX AURA. All rights reserved.
</footer>

</body>
</html>
