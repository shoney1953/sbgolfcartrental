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
    <title>SaddleBrooke Golf Cart Rentals - For Sale</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<div class="container-section">
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="contact.php">Contact</a></li>
      
        </ul>
    </div>
</nav>
<div class="container">

<h1>Golf Carts for Sale</h1>
<br><br><br><br><br><br><br><br><br>
<div class="form-grid2"> 
    <div class="contactCard">
            <h4>Contact Brian Hand</h4>
            <h4>Phone: 512 751-7280</h4>
            <a href="mailto:brianhand1@outlook.com?subject=Golf Cart Sales Information">
                       Click to Email Brian</a>
    </div>
    <div class="contactCard">
            <h4>Contact Ron Bouchard</h4>
            <h4>Phone: 503 949-4955</h4>

            <a href="mailto:ronniebouchard58@gmail.com?subject=Golf Cart Sales Information">
                       Click to Email Ron</a>
</div>
</div>
<div class="form-grid3"> 
       <!-- <div class="form-grid4">  -->
    
      <div class="cartCard">
      <h3>2020 Club Car - $5995</h3>
       <img  class="cartImage" src="img/2020ClubCar" alt="2020 Club Car">
      </div>
     
      <div class="cartCard">
      <h3>2019 Club Car - $5995</h3>
       <img  class="cartImage" src="img/2019ClubCar.jpg" alt="2019 Club Car">
      </div>
      <div class="cartCard">
      <h3>2012 Yamaha Gas Powered - $4995</h3>
       <img  class="cartImage" src="img/2012Yamaha.jpg" alt="2012 Yamaha">
      </div>
    </div>
</div>

</div>
<?php
  require 'footer.php';
?>
</body>
</html>