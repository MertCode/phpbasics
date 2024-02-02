<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php
   $wordHello = "Hello World!";
   echo '<hr>';
   // echo "this is a variable:  . $wordHello";
   // echo 'this a variable: $wordHello';
   echo 'This is a variable: ' . $wordHello;
   echo '<hr>';

   $a = 5;
   if ($a == 4) {
      echo "A is 5";
   } else {
      echo "A is not 4 but $a";
   }
   echo '<hr>';

   $myArray = array("a", "b", "c");
   echo $myArray[0]; // this will return 1
   echo $myArray[1]; // this will return 2
   echo $myArray[2]; // this will return 3

   $i = 0;
   while ($i < 3) {
      echo $myArray[$i];
      $i++;
   }
   echo '<hr>';

   // loop the array with a for loop
   for ($i = 0; $i < 3; $i++) {
      echo $myArray[$i];
   }

   echo '<hr>';

   // loop the array with a foreach loop
   foreach ($myArray as $value) {
      echo $value;
   }
   echo '<hr>';
   // excercise:
   // I need to create an array with my favorite dishes
   // display them in a list and whenever it caught 'kebab' it should display 'I love kebab'

   $myFavoriteDish = [
      "Pizza",
      "Burger",
      "Pasta",
      "Kebab",
      "Sushi",

   ];
   echo 'The arraylist of my favorite dishes: <br>';
   print_r($myFavoriteDish); // this will print the array (myFavoriteDish)
   echo '<br><br>';

   echo '<b>My favorite dishes are: </b><br>';
   echo "<ul>";

   foreach ($myFavoriteDish as $dish) {
      echo "<li>$dish";
      if ($dish == "Kebab") {
         echo " - I like that!";
      }
      echo "</li>";
   }
   echo "</ul>";
   echo '<br> <hr>';
   echo '<b><h3>My favorite dishes with the types: </b></h3>';

   $favoriteDishesAssoc = [
      "Pizza" => "Margherita",
      "Burger" => "Cheeseburger",
      "Pasta" => "Carbonara",
      "Kebab" => "Doner",
      "Sushi" => "Sashimi",
   ];

   //echo $favoriteDishesAssoc["Pizza"];
   //print_r($favoriteDishesAssoc);

   //iterate through the associative array with a foreach loop
   echo '<ul>';
   foreach ($favoriteDishesAssoc as $dish => $type) {
      echo "<li>$dish - $type</li>";
   }
   echo "</ul>";

   $favoriteDishesAssocMulti = [
      "Pizza" => [
         "Margherita",
         "Pepperoni",
         "Quattro Stagioni",
      ],
      "Burger" => [
         "Cheeseburger",
         "Hamburger",
         "Veggie Burger",
      ],
      "Pasta" => [
         "Carbonara",
         "Bolognese",
         "Pesto",
      ],
      "Kebab" => [
         "Doner",
         "Shawarma",
         "Gyros",
      ],
      "Sushi" => [
         "Sashimi",
         "Nigiri",
         "Maki",
      ],
   ];

   echo '<h2>Menu Card:</h2>';
   foreach ($favoriteDishesAssocMulti as $dish => $types) {
      echo "<b>" . $dish . "</b><br>";
      echo "<ul>";
      foreach ($types as $type) {
         echo "<li>$type</li>";
      }
      echo "</ul>";
   }

   ?>
</body>

</html>