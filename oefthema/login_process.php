<?php
session_start();

// Database configuration 
$db_host = 'localhost:3306';
$db_user = 'mertcode';
$db_pass = '';
$db_name = 'themadag';

// Connect to the database
$conn = mysqli_connect("localhost:3306", "mertcode", "", "themadag");
if (!$conn) {
   echo "Connection failed: " . mysqli_connect_error();
   exit;
}

// Get submitted username and password
$username = $_POST['username'];
$password = $_POST['password'];

// Fetch password hash from the database
$query = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('s', $username);
$stmt->execute();
$stmt->bind_result($hashed_password);
$stmt->fetch();
$stmt->close();

// Check the password using password_verify
if (password_verify($password, $hashed_password)) {
   $_SESSION['logged_in'] = true;
   $_SESSION['username'] = $username;
   echo '<script>toastr.success("Login Successful!")</script>';
   header('Location: index.php?login=success');
} else {
   header('Location: login.php?error=Wrong+Username+or+Password');
   echo '<script>toastr.error("Login Failed!")</script>';
}
