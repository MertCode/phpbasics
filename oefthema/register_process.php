<?php
// Database configuration (replace with your actual settings)
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

// Basic Validation
if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['password_confirm'])) {
   header('Location: register.php?error=All fields are required');
   exit;
}

if ($_POST['password'] !== $_POST['password_confirm']) {
   header('Location: register.php?error=Passwords do not match');
   exit;
}

// Sanitize username for basic protection
$username = mysqli_real_escape_string($conn, $_POST['username']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// NEVER STORE PLAIN TEXT PASSWORDS!!
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Prepare Query & Insert User (Adjust table name as needed)
$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if ($stmt->execute()) {
   // Redirect on success
   header('Location: login.php?success=Registration Successful');
} else {
   // Redirect on error 
   header('Location: register.php?error=Registration Failed');
}

$stmt->close();
$conn->close();
