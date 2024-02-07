<?php

print_r($_POST);
echo '<br>';

$name = $_POST['name'];
$email = $_POST['email'];
$tel = $_POST['tel'];

echo "Hello " . $name . "<br>";
echo "<p>Please find your details below: </p><br>";
echo "<h2>Email: " . $email . "</h2> <br>";
echo "<h3>Tel: " . $tel . "</h3><br>";


function saveStringToFile($name, $email, $tel)
{
   // this wil open a new file and append to it
   $file = fopen("data.csv", "a");
   // provice the current date and time in specific format
   $currentdate = date("Y-m-d H:i:s");
   // write to file and close it used /n to create a new line
   $string = $currentdate . " " . $name . " " . $email . " " . $tel . "\n";
   fwrite($file, $string);
   fclose($file);
}

saveStringToFile($name, $email, $tel);
echo "Your details have been saved to a file";
echo '<br>';
echo '<a href="register.html">Go back</a>';
