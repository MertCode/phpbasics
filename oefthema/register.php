<!DOCTYPE html>
<html>

<head>
   <title>Register</title>
   <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
   <div class="container">
      <h1>Register</h1>

      <?php if (isset($_GET['error'])) { ?>
         <p class="error"><?php echo $_GET['error']; ?></p>
      <?php } ?>

      <form action="register_process.php" method="post">
         <label for="username">Username:</label>
         <input type="text" name="username" id="username" required><br><br>

         <label for="email">Email:</label>
         <input type="email" name="email" id="email" required><br><br>

         <label for="password">Password:</label>
         <input type="password" name="password" id="password" required><br><br>

         <label for="password_confirm">Confirm Password:</label>
         <input type="password" name="password_confirm" id="password_confirm" required><br><br>

         <button type="submit">Register</button>
      </form>
   </div>
</body>

</html>