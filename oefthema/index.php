<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Themadag</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

   <div class="container">
      <div class="row">
         <div class="col-md">
            <h1>Themadag</h1>
            <form action="submit.php" method="post">
               <input class="form-control mt-2" type="text" name="name" value="<?php if (isset($_GET['name'])) {
                                                                                    echo $_GET['name'];
                                                                                 } ?>" placeholder="Name">
               <input class="form-control mt-2" type="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                                                    echo $_GET['email'];
                                                                                 } ?>" placeholder="Email">
               <input class="form-control mt-2" type="tel" name="tel" value="<?php if (isset($_GET['tel'])) {
                                                                                 echo $_GET['tel'];
                                                                              } ?>" placeholder="Tel">
               <hr>
               <?php
               $locations = [
                  "Amsterdam -> Thailand", "Hasselt - Griekenland", "Antwerpen - Spanje", "Brussel - Italië", "Gent - Frankrijk"
               ];

               if (!isset($_GET['location'])) {

                  echo "Please select your vacation:";
                  echo "<select class='form-select mt-2' name='location'>";
                  foreach ($locations as $location) {
                     echo "<option value='$location'>$location</option>";
                  }
                  echo "</select>";
               } else {
                  $customLocation = $_GET['location'];
                  echo "<input type='hidden' class='form-control mt-2' name='location' value='$customLocation'>";
                  echo "You have selected: $customLocation";
               }
               ?>
               <hr>
               <button class="btn btn-primary" type="submit">Submit</button>
               <input class="btn btn-danger" type="reset" value="Reset">
            </form>

         </div>
      </div>
   </div>

</body>

</html>