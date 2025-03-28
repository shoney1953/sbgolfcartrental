<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css">
    <title>SaddleBrooke Golf Cart Rentals</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<div class="container-section">
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="rates.php">Rates and Requirements</a></li>
        <!-- <li><a href="forsale.php">Golf Carts For Sale</a></li> -->
        <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
</nav>
        <div class="container">

            <h1>SaddleBrooke Golf Cart Rentals</h1>
            <h3>Located in SaddleBrooke Arizona,<br> Brian Hand and Ron Bouchard have several golf carts available for rent.</h3><br>
            <h3>Services include cart repair, and lithium battery replacements starting from $2200</h3>
            <!-- <h3>There are also a number of carts for sale. Check out the For Sale tab above</h3> -->
      
            <a href="mailto:brianhand1@hotmail.com?subject=Golf Cart Rental Information">
                       Click to Email Brian at brianhand1@hotmail.com</a> <br>

            <br><a href="mailto:ronniebouchard58@gmail.com?subject=Golf Cart Rental Information">
                       Click to Email Ron at ronniebouchard58@gmail.com </a>    
</div>

</div>
<?php
  require 'footer.php';
?>
</body>
</html>