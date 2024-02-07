<?php
function showCurrentDate()
{

   $days = array("zondag", "maandag", "dinsdag", "woensdag", "donderdag", "vrijdag", "zaterdag");
   $months = array("januari", "februari", "maart", "april", "mei", "juni", "juli", "augustus", "september", "oktober", "november", "december");
   $dayOfWeek = $days[date("w")];
   $dayOfMonth = date("j");
   $month = $months[date("n") - 1];
   $year = date("Y");
   $hour = date("G");
   $minute = date("i");
   $second = date("s");

   echo "Het is vandaag $dayOfWeek $dayOfMonth $month $year en het is $hour:$minute:$second uur";
}

$conn = mysqli_connect("localhost", "root", "root", "bookings");
if (!$conn) {
   echo "Connection failed: " . mysqli_connect_error();
   exit;
}

function store($name, $email, $tel, $age, $location)
{
   global $conn;
   $currentDate = date("Y-m-d H:i:s");
   $sql = "INSERT INTO bookings VALUES (name, email, tel, age, location) VALUES ('$name', '$email', '$tel', '$age', '$location')";
   $conn->query($sql);
   if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
   mysqli_close($conn);
}
