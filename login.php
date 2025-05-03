<?php
session_start();
$conn = new mysqli("localhost", "root", "", "luex_aura"); // Your DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Check user in the database
  $sql = "SELECT * FROM users WHERE email = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Check if the password matches
    if (password_verify($password, $user['password'])) {
      // Check if user is verified
      if ($user['is_verified'] == 1) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header("Location: home.php");
      } else {
        echo "Please verify your email before logging in.";
      }
    } else {
      echo "Incorrect password.";
    }
  } else {
    echo "Account not found.";
  }
}
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "luex_aura");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check user credentials
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();

        // Check password
        if (password_verify($password, $user['password'])) {
            if ($user['is_verified'] == 1) {
                // Logged in and verified
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header("Location: home.php");
            } else {
                echo "Please verify your email before logging in.";
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "Account not found.";
    }
}
?>
<?php
session_start();
$conn = new mysqli("localhost", "root", "", "your_db");

$email = $_POST['email'];
$password = $_POST['password'];

$result = $conn->query("SELECT * FROM users WHERE email='$email' AND is_verified=1");
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['user'] = $user['username'];
  header("Location: home.php");
} else {
  echo "Invalid credentials or not verified.";
}
