<?php include 'header.php'; ?>
<?php include '../global.php'; ?>
<?php session_start();
checkLoggedIn(); ?>

<h1>
   <span class="fat">Dashboard</span>Admin
</h1></span>

<a href="logout.php" class="btn btn-danger mb-3">Logout</a>


<?php include 'footer.php'; ?>