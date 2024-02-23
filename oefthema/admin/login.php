<?php include 'header.php'; ?>
<?php include '../global.php'; ?>
<?php session_start(); ?>

<?php

if (isset($_POST['email'])) {
   // if the email is set, then we can proceed the email exists in the database
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);


   // check if the email exists in the database
   $sql = "SELECT * FROM users WHERE email = '$email'";
   $result = mysqli_query($conn, $sql);

   // if the email exists, then we can proceed with the login
   if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $passwordRow = $row['password'];
      if (password_verify($password, $passwordRow)) {
         $_SESSION['loggedin'] = true;
         $_SESSION['username'] = $row['username'];
         $_SESSION['token'] = bin2hex(random_bytes(8));
         // Redirect to the dashboard
         header('Location: dashboard.php');
      } else {
         echo "<div class='alert alert-danger'>
         Credentials are incorrect!
         </div>";
      }
   }
}

?>
<h1>
   <span class="fat">Login</span> <br>
   Admin Account
</h1>

<form action="login.php" method="post">
   <div class="mb-3">
      <label for="email" class="form-label">Email address</label>
      <input type="email" class="form-control" id="email" name="email" required>
   </div>
   <div class="mb-3">
      <label for="password" class="form-label">Password</label>
      <input type="password" class="form-control" id="password" name="password" required>
   </div>
   <button type="submit" class="btn btn-success">Login</button>
   <!-- 
   dont have an account?
   -->
   <p>
      Don't have an account?
      <a href="register.php">Register</a>

   </p>
</form>

<?php include 'footer.php'; ?>