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
    <link rel="stylesheet" href="css/style.css?v=1">
    <title>SaddleBrooke Golf Cart Rentals - Checklist</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<!-- <div class="container-section"> -->
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
                <li><a href="rates.php">Rental Rates</a></li>

        <li><a href="conversions.php">Lithium Battery Conversions</a></li>
        <li><a href="repairs.php">Golf Cart Repairs</a></li>
        <li><a href="contact.php">Contact</a></li>
      
        </ul>
    </div>
</nav>

      
        <div class="content">
            <h1>Checklist for Cart Renters</h1>
      
            <h3>The first step is to review the contract and make sure you are comfortable with the requirements</h3>
           
          <!-- /* <a href='img/ContractSept2025.pdf' target='_blank'> */ -->
            <!-- <em>Click to download the Contract</em></a> -->
            <legend>Contract Elements to Review</legend>
            <ol start='1'>
            <li value='1'>Security Deposit $500. The check will be returned to you when the rental period is over assuming the cart 
              is returned without damage
            </li>
            <li>Only Licensed drivers over 18 years old are allow to drive the cart.</li>
            <li>The cart is to remain in Saddlebrooke HOA 1, HOA 2, or SaddleBrooke Ranch only, to be used on its private
              roads or golf courses.
            </li>
            <li>
              SaddleBrooke HOA 1, HOA 2, or SaddleBrooke Rance golf cart rules and traffic signage to be obeyed at all times.
            </li>
            <li>The cart is to be used to transport individuals only</li>
            <li>
              The cart is to be stored in a garage at all times when at the rental property or individual's home.
            </li>
            <li>
              Failure to abide by any of the listed rules can result in the forfeture of part or all of the security deposit.
              The cart renter must read, understand and agree to the rules listed.
            </li>
            </ol>
            <h3>Assuming you can agree to the above rules, step 2 is to write a check for $100 made out to "Saddlebrooke Golf Cart Rentals ""</h3>
            <legend>Please include the following information with the check or <em>email the information to Ron Bouchard (ronniebouchard58@gmail.com)</em>:</legend>
            <ol>
              <li value="1">Your full name</li>
              <li>Your home address</li>
              <li>Your rental or home HOA - ie HOA 1, HOA 2, or SaddleBrooke Ranch</li>
              <li>Your cell number</li>
              <li>Your email address</li>
              <li>Dates you will need the cart (please be as specific as you can)</li>
              
            </ol>
       
            <h3>Mail the check in care of: 
              Ron Bouchard 
              63218 E Brooke Park Dr 
              Tucson, AZ  85739 </h3>
              <p>Your reservation will be confirmed upon receipt of your check and information</p>
            

  <h3><a href="contact.php">Contact Us</a></h3>
            
</div>

<!-- </div> -->
<?php
  require 'footer.php';
?>
</body>
</html>