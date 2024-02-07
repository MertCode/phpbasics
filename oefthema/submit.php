<?php session_start(); ?>
<?php include 'global.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   $name = $_SESSION['name'];
   $email = $_SESSION['email'];
   $tel = $_SESSION['tel'];
   $age = $_SESSION['age'];
   $location = $_SESSION['location'];

   $_SESSION['name'] = $_POST['name'];
   $_SESSION['email'] = $_POST['email'];
   $_SESSION['tel'] = $_POST['tel'];
   $_SESSION['age'] = $_POST['age'];
   $_SESSION['location'] = $_POST['location'];

   function saveStringToFile($name, $email, $tel, $locaties, $age)
   {
      $filename = "bookings.csv";
      $file = fopen($filename, "a");
      $currentDate = date("Y-m-d H:i:s");
      $string = $currentDate . "," . $name . "," . $email . "," . $tel . "," . $age . "," . $locaties . "\r";
      fwrite($file, $string);
      fclose($file);
   }

   saveStringToFile($name, $email, $tel, $age, $location);
   store($name, $email, $tel, $age, $location);

   ?>
   <div class="container">
      <div class="row">
         <div class="col-md">
            <h1>Bedankt voor uw inschrijving, <?php echo $name; ?></h1>
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
               <a class="btn btn-primary" href="print.php">Print Ticket</a>
         </div>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>