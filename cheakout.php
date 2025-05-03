<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect form data
    $fullName = $_POST['full-name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $district = $_POST['district'];
    $quantity = $_POST['quantity'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $productImage = $_POST['product-image'];

    // Create a message with the order details
    $message = "Order Details:\n";
    $message .= "Full Name: $fullName\n";
    $message .= "Address: $address\n";
    $message .= "Phone: $phone\n";
    $message .= "District: $district\n";
    $message .= "Quantity: $quantity\n";
    $message .= "Product Color: $color\n";
    $message .= "Product Price: $$price\n";
    $message .= "Product Image: $productImage\n";
    
    // Encode the message to make it URL-friendly
    $encodedMessage = urlencode($message);
    
    // Replace YOUR_WHATSAPP_NUMBER with your actual WhatsApp number (including country code)
    $whatsappNumber = '+94775211827';  // e.g., '1234567890' or '+1234567890'
    
    // WhatsApp URL to send message to your WhatsApp
    $whatsappURL = "https://wa.me/$whatsappNumber?text=$encodedMessage";
    
    // Redirect to WhatsApp with the order message
    header("Location: $whatsappURL");
    exit();
}
