<?php
session_start();

// require_once '../config/Database.php';
require_once '../models/ContractInfo.php';
$database = new Database();
$db = $database->connect();
$contractInfo = new ContractInfo($db);
$_SESSION['tempcontractinfo'] = [];
$tempContractInfo = [];

if ( isset($_POST['SubmitContractInfo'])) {
  $tempContractInfo['firstname'] = $_POST['firstname'];
  $tempContractInfo['lastname'] = $_POST['lastname'];
  $tempContractInfo['email'] = $_POST['email'];
  $tempContractInfo['cellphone'] = $_POST['cellphone'];
  $tempContractInfo['rentstart'] = $_POST['rentstart'];
  $tempContractInfo['rentend'] = $_POST['rentend'];
  $tempContractInfo['rentaladdr'] = $_POST['rentaladdr'];
  $tempContractInfo['dlnum'] = $_POST['dlnum'];
  $tempContractInfo['dlstate'] = $_POST['dlstate'];
  $tempContractInfo['dlexp'] = $_POST['dlexp'];
  $tempContractInfo['saddlebrookearea'] = $_POST['sbarea'];
  if (isset($_POST['chkmailed'])) {
    $tempContractInfo['checkmailed'] = "Yes";
  } else {
     $tempContractInfo['checkmailed'] = "No";
  }
 $_SESSION['tempcontractinfo'] = $tempContractInfo;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/style.css?v=3">
    <title>SaddleBrooke Golf Cart Rentals - Checklist</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<!-- <div class="container-section"> -->
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../rates.php">Rental Rates</a></li>
        <li><a href="../conversions.php">Lithium Battery Conversions</a></li>
        <li><a href="../repairs.php">Golf Cart Repairs</a></li>
        <li><a href="../contact.php">Contact</a></li>
      
        </ul>
    </div>
</nav>

      
        <div class="content">
          <h3>Below is the information to be used to create the contract. Please click confirm to proceed or return to correct information.</h3>
         <ul>
       
          <?php
      
          echo "<li>First Name: ".$tempContractInfo['firstname']." </li>";
 
    
          echo "<li>Last Name: ".$tempContractInfo['lastname']." </li>";
     
    
          echo "<li>Cell Phone: ".$tempContractInfo['cellphone']." </li>";
  
    
          echo "<li>Email: ".$tempContractInfo['email']." </li>";
      
     ;
          echo "<li>Driver's license number: ".$tempContractInfo['dlnum']." State: ".$tempContractInfo['dlstate']." Expires: ".$tempContractInfo['dlexp']." </li>";
  
          echo "<li> Rental Address: ".$tempContractInfo['rentaladdr']." </li>";
      
;
          echo "<li> Saddlebrooke Area: ".$tempContractInfo['saddlebrookearea']." </li>";

     
          echo "<li>Rental Start: ".$tempContractInfo['rentstart']." </li>";

    
          echo "<li> Rental Return: ".$tempContractInfo['rentend']." </li>";
          echo "<li> Mailed $100 check: ".$tempContractInfo['checkmailed']." </li>";

  
          ?>
          </ul>
             <h3><a href="createContractPdf.php">Confirm Information and Create Contract</a></h3>
             <?php
             echo "<h3><a href='".$_SESSION['checklist']."?redoinfo'>Return and Correct Information</a><h3>";
             ?>
    
    

        </div>
</body>
</html>