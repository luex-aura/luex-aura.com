<?php include('session.php'); // Include session.php to protect this page ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Welcome | LUEX AURA</title>
</head>
<body>
  <h1>Welcome, <?= $_SESSION['user_name']; ?>!</h1>
  <p>This is your luxury store dashboard.</p>
  <a href="logout.php">Logout</a>
</body>
</html>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html"); // Redirect if not logged in
    exit();
}

echo "Welcome, " . $_SESSION['user_name'] . "! You are now logged in and verified.";
?>
<?php include 'session.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Welcome</title></head>
<body style="background: #111; color: white;">
  <h1>Welcome, <?php echo $_SESSION['user']; ?>!</h1>
  <a href="logout.php">Logout</a>
</body>
</html>
