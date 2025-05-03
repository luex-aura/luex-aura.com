<?php
$conn = new mysqli("localhost", "root", "", "luex_aura"); // Your DB connection
$verification_code = $_GET['code'];

$sql = "SELECT * FROM users WHERE verification_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $verification_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();
  
  // Mark the user as verified
  $sql = "UPDATE users SET is_verified = 1 WHERE verification_code = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $verification_code);
  $stmt->execute();

  echo "Your email has been verified. You can now <a href='login.html'>log in</a>.";
} else {
  echo "Invalid verification code.";
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "luex_aura");
$verification_code = $_GET['code']; // Get the verification code from URL

// Check if the code matches any user in the database
$sql = "SELECT * FROM users WHERE verification_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $verification_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    
    // Update the user to 'verified'
    $sql = "UPDATE users SET is_verified = 1 WHERE verification_code = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $verification_code);
    $stmt->execute();
    
    echo "Your email has been verified. You can now <a href='login.html'>log in</a>.";
} else {
    echo "Invalid verification code.";
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "your_db");

$email = $_GET['email'];
$token = $_GET['token'];

$result = $conn->query("SELECT * FROM users WHERE email='$email' AND token='$token' AND is_verified=0");
if ($result->num_rows > 0) {
  $conn->query("UPDATE users SET is_verified=1 WHERE email='$email'");
  echo "Email verified! You can now <a href='login.html'>login</a>.";
} else {
  echo "Invalid or already verified.";
}
