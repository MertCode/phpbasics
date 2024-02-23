<?php include 'header.php'; ?>
<?php include '../global.php'; ?>

<?php
if (isset($_POST['name'])) {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
}

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
   echo "<div class='alert alert-danger'
   Email already exists!
   </div>";

   echo "<a href='register.php' class='btn btn-danger'>Try again</a>";
   exit;
}

$date = date("Y-m-d H:i:s");
$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

$sql = "INSERT INTO `users` (`name`, `email`, `status`, `date`, `password`, `created_at`) VALUES ('$name', '$email', '0', '$date' $passsword')";

if (mysqli_query($conn, $sql)) {
   echo "<div class='alert alert-success'>
   User $name has been created successfully!
   </div>";
   echo "<a href='login.php' class='btn btn-success'>Login</a>";
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} ?>

<h1><span class="fat">Register</span>Admin Account</h1>

<form action="register.php" method="post">
   <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control" id="name" name="name" required>
   </div>
   <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
   </div>
   <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
   </div>
   <button type="submit" class="btn btn-success">Register</button>
</form>

<?php include 'footer.php'; ?>