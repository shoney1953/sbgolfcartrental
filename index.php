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
    <link rel="stylesheet" href="css/style.css?v=2">
    <title>SaddleBrooke Golf Cart Rentals</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<div class="container-section">
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="rates.php">Rental Rates</a></li>
        <li><a href="checklist.php">Rental Checklist</a></li>
        <li><a href="conversions.php">Lithium Battery Conversions</a></li>
        <li><a href="repairs.php">Golf Cart Repairs</a></li>
        <!-- <li><a href="forsale.php">Golf Carts For Sale</a></li> -->
        <li><a href="contact.php">Contact</a></li>
        <!-- <li><a href="administration.php">Administration</a></li> -->
        </ul>
    </div>
</nav>
        <div class="content">
      
            <h1>SaddleBrooke Golf Cart Rentals<br>
        
            Located in SaddleBrooke Arizona,<br> Owned and Operated by
             Brian Hand and Ron Bouchard.</h1><br>
            <img src="img/DSC05234-2 copy.jpg" class="ownerpic" alt="Owners">
</div>

</div>
<?php
  require 'footer.php';
?>
</body>
</html>