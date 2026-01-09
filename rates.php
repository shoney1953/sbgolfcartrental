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
    <title>SaddleBrooke Golf Cart Rentals - Rates</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<div class="container-section">
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
       
        <li><a href="checklist.php">Rental Checklist</a></li>
        <li><a href="conversions.php">Lithium Battery Conversions</a></li>
        <li><a href="repairs.php">Golf Cart Repairs</a></li>
        <li><a href="contact.php">Contact</a></li>
      
        </ul>
    </div>
</nav>

      
        <div class="content">
            <h1>Rental Rates</h1>
      
            <h3>$350 per month +6.7% tax</h3>
            <h3> if a delivery is being made to Saddlbrooke Ranch, there is a one-time $50 delivery fee which includes pickup.<h3>
           
            <h3>During peak times, rental minimum is one month, however during non-peak times shorter rental periods may be available</h3>
            <legend>Non Peak Time Rental Rates</legend>
            <ul>
            <li>1 week  = $125 + 6.7% tax</li>
            <li>2 weeks = $210 + 6.7% tax</li>
            <li>3 weeks = $304.50 + 6.7% tax</li>
            </ul>
            

  <h3><a href="contact.php">Contact Us</a></h3>
            
</div>

</div>
<?php
  require 'footer.php';
?>
</body>
</html>