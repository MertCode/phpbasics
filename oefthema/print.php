<?php session_start(); ?>
<?php include 'global.php'; ?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Themadag</title>
</head>

<body>
   <?php
   $name = $_SESSION['name'];
   $email = $_SESSION['email'];
   $tel = $_SESSION['tel'];
   $age = $_SESSION['age'];
   $location = $_SESSION['location'];
   ?>
   <div class="container">
      <div class="row">
         <div class="col-md">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=syntrapxl.be" alt="logo" width="200">
            <h1>Ticket voor, <?php echo $name; ?></h1>
            <h3>Wij verwachten u in <?php echo $location ?> </h3>
            <p>Hier is de gegevens die u heeft ingevuld:</p>
            <ul>
               <li>
                  Naam: <?php echo $name; ?>
               </li>
               <li>
                  Email: <?php echo $email; ?>
               </li>
               <li>
                  Telefoon: <?php echo $tel; ?>
               </li>
               <li>
                  Leeftijd: <?php echo $age; ?>
               </li>
               <li>
                  Locatie: <?php echo $location; ?>
               </li>
            </ul>
            <a class='btc btn-primary' onclick="window.print();">Print Ticket</a>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>