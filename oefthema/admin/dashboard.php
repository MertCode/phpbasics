<?php include 'header.php'; ?>
<?php include '../global.php'; ?>
<?php session_start();
checkLoggedIn(); ?>

<h1>
   <span class="fat">Dashboard</span>Admin
</h1></span>


<a href="logout.php" class="btn btn-danger mb-3">Logout</a>

<?php
$sql = "SELECT 
r.id,
r.name,
r.email,
r.`date`,
r.tel,
t. `name` as themeday
FROM
reservations r
JOIN 
tdays t ON t.id = r.tday_id
ORDER BY r.`date` DESC";

$results = $conn->query($conn, $sql);
?>

<table class="table">
   <thead>
      <tr>
         <th scope="col">ID</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
         <th scope="col">Date</th>
         <th scope="col">Tel</th>
         <th scope="col">Themeday</th>
         <th scope="col">Actions</th> <!-- Added column for actions -->
      </tr>
   </thead>
   <tbody>
   <?php foreach ($results as $result) { ?>
     <tr>
      <th scope="row"><?php echo $result['id']; ?></th>
      <td><?php echo $result['name']; ?></td>
      <td><?php echo $result['email']; ?></td>
      <td><?php echo $result['date']; ?></td>
      <td><?php echo $result['tel']; ?></td>
      <td><?php echo $result['themeday']; ?></td>
      <td>
         <a href="delete.php?id=<?php echo $result['id']; ?>" class="btn btn-danger">Delete</a> <!-- Added delete button -->
      </td>
     </tr>
   <?php } ?>
   </tbody>
</table>

<?php include 'footer.php'; ?>
      
   
 
     </tr>
   </tbody>

<?php include 'footer.php'; ?>