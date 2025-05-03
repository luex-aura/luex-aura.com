<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shop – LUEX AURA</title>
  <link rel="stylesheet" href="shop.css">
</head>
<body>

  <header class="shop-header">
    <h1>LUEX AURA – Shop</h1>
    <p>Explore luxury items crafted for elegance</p>
  </header>

  <section class="product-grid">
    <?php
    $products = [
      [
        "name" => "Luxury Watch",
        "price" => 299.00,
        "image" => "https://via.placeholder.com/250x250"
      ],
      [
        "name" => "Gold Bracelet",
        "price" => 159.00,
        "image" => "https://via.placeholder.com/250x250"
      ],
      [
        "name" => "Designer Sunglasses",
        "price" => 199.00,
        "image" => "https://via.placeholder.com/250x250"
      ],
      [
        "name" => "Leather Shoes",
        "price" => 249.00,
        "image" => "https://via.placeholder.com/250x250"
      ]
    ];

    foreach ($products as $product) {
      echo '<div class="product-card">';
      echo '<img src="' . $product['image'] . '" alt="' . $product['name'] . '">';
      echo '<h3>' . $product['name'] . '</h3>';
      echo '<p class="price">$' . number_format($product['price'], 2) . '</p>';
      echo '<a class="btn" href="checkout.php?product=' . urlencode($product['name']) . '&price=' . $product['price'] . '">View Details</a>';
      echo '</div>';
    }
    ?>
  </section>

</body>
</html>
