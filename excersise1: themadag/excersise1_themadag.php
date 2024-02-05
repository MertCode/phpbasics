<?php
$name = $_POST["name"] ?? null;
$email = $_POST["email"] ?? null;
$phonenr = $_POST["phonenr"] ?? null;
$country = $_POST["country"] ?? null;

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   //create a vacation form with an array of countries
   $vacation = [
      "Italy",
      "Spain",
      "Greece",
      "Turkey",
   ];

   // turned this into a form
   echo "<form action='excersise1_themadag.php' method='post'>";

   // email input
   echo "<table>";
   echo "<tr><td><label for='email'>Email:</label></td>";
   echo "<td><input type='email' id='email' name='email'></td></tr>";

   // name input
   echo "<tr><td><label for='name'>Name:</label></td>";
   echo "<td><input type='text' id='name' name='name'></td></tr>";

   // phonenr input
   echo "<tr><td><label for='phonenr'>Phone number:</label></td>";
   echo "<td><input type='tel' id='phonenr' name='phonenr'></td></tr>";

   // country select
   echo "<tr><td><label for='country'>Country:</label></td>";
   echo "<td><select name='country'>";
   foreach ($vacation as $value) {
      echo "<option value='$value'>$value</option>";
   }
   echo "</select></td></tr>";

   echo "<tr><td colspan='2'><input type='submit' value='Submit'></td></tr>";
   echo "</table>";
   echo "</form>";

   // if the form is submitted, display the selected country
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // echo success booking
      echo "<br>";
      echo "<table>";
      echo "<tr><td>Your name is:</td><td>" . $name . "</td></tr>";
      echo "<tr><td>Your email is:</td><td>" . $email . "</td></tr>";
      echo "<tr><td>Your phone number is:</td><td>" . $phonenr . "</td></tr>";
      echo "<tr><td>Your vacation to " . $country . " is successfully booked.</td></tr>";
      echo "</table>";

      function saveBooking($name, $email, $phonenr, $country)
      {
         $file = fopen("bookings.txt", "a");
         fwrite($file, $name . ", " . $email . ", " . $phonenr . ", " . $country . "\n");
         fclose($file);
         header("Location: bookings.txt");
      }

      saveBooking($name, $email, $phonenr, $country);
   }

   ?>
</body>

</html>