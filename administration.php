<?php 
session_start();
require_once 'config/Database.php';
require_once 'models/GolfCartInventory.php';  
require_once 'models/CartServiceRequests.php';  
$_SESSION['adminurl'] = $_SERVER['REQUEST_URI'];
$rowCount = 0;
$num_golfcarts = 0;
$database = new Database();
$db = $database->connect();


$golfcart = new GolfCartInventory($db);
$result = $golfcart->read();

$rowCount = $result->rowCount();
$num_golfcarts = $rowCount;
$allGolfCarts = [];
$_SESSION['allGolfCarts'] = [];
if ($rowCount > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $cart_item = array(
            'id' => $id,
            'number' => $number,
            'description' => $description,
            'vin' => $vin,
            'powersource' => $powersource,
            'year' => $year,
            'dateacquired' => $dateacquired,
            'buyingprice' => $buyingprice,
            'datesold' => $datesold,
            'sellingprice' => $sellingprice,
            "notes" => $notes

        );
        array_push($allGolfCarts, $cart_item);
    
    }
  
    $_SESSION['allGolfCarts'] = $allGolfCarts;
} 
$servicereq = new CartServiceRequests($db);
$result = $servicereq->read();

$rowCount = $result->rowCount();
$num_servicerequests = $rowCount;
$allServiceRequests = [];
$_SESSION['allServiceRequests'] = [];
if ($rowCount > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $service_item = array(
            'id' => $id,
            'custfirstname' => $custfirstname,
            'custlastname' => $custlastname,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'requestdate' => $requestdate,
            'requestcomplete' => $requestcomplete,
            'service' => $service,
            'charge' => $charge
   

        );
        array_push($allServiceRequests, $service_item);
    
    }
  
    $_SESSION['allServiceRequests'] = $allServiceRequests;
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css?v=1">
    <title>SaddleBrooke Golf Cart Rentals - ADMIN</title>
 
</head>
<body>

<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#carts">Maintain Cart Inventory</a></li>
        <li><a href="#service">Maintain Service Requests</a></li>
        <li><a href="#rentals">Maintain Rental Requests</a></li>
        <li><a href="archives.php">View Archives</a></li>
        </ul>
    </div>
</nav>



<section id="carts" class="content">

<?php
  
    echo '<br><br><br>';
    echo '<h4 class="form-title">Maintain Carts</h4>';
    
  
    echo '<div class="form-grid">';

    echo "<form method='POST' action='actions/maintainCart.php'>"; 
    echo "<button type='submit' name='submitAddCart'>Add a New Cart</button>";   
    echo '</form>'    ;   

 
    echo '</div> ';    
     


    echo '<form method="POST" action="actions/processCarts.php">';
  
       foreach($allGolfCarts as $cart) {
        $dpChk = "dp".$cart['id'];
        $upChk = "up".$cart['id'];
        $dlChk = "dl".$cart['id'];
        echo '<div class="form-container">';
        echo '<div class="form-grid">';
   
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Duplicate?</h4>';
        echo "<input type='checkbox' title='Select to Duplicate Cart' name='".$dpChk."'>";
        echo '</div>';
 
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Update?</h4>';
        echo "<input type='checkbox' title='Select to Update Cart' name='".$upChk."'>";   
        echo '</div>';
 
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Delete?</h4>';
        echo "<input type='checkbox' title='Select to Delete Cart' name='".$dlChk."'>";
        echo '</div>';
        echo '</div>';
        echo '<div class="form-grid">';
  
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Num: ".$cart['number']." </h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>VIN: ".$cart['vin']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Description: ".$cart['description']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Year: ".$cart['year']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Power Source: ".$cart['powersource']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Date Acquired: ".$cart['dateacquired']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Buying Price: ".$cart['buyingprice']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Date Sold: ".$cart['datesold']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Selling Price: ".$cart['sellingprice']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Notes: ".$cart['notes']."</h4>";
       echo '</div>';
       echo '<button type="submit" name="submitCartProcess">Process This Cart</button>'; 
       echo '</div>';
        echo '</div>';  
    
       }
    
   
    
       echo '</form>';
       echo '</div>';
       echo '</div>';
    //    echo '</div>';
       ?>
   
    </section>
    <section id="service" class="content">

<?php
  

    echo '<h4 class="form-title">Maintain Service Requests</h4>';
    
  
    echo '<div class="form-grid">';

    echo "<form method='POST' action='actions/maintainService.php'>"; 
    echo "<button type='submit' name='submitAddService'>Add a New Service Request</button>";   
    echo '</form>'    ;   

 
    echo '</div> ';    
     

    echo '<form method="POST" action="actions/processServices.php">';
  
       foreach($allServiceRequests as $service) {
        $dpChk = "dp".$service['id'];
        $upChk = "up".$service['id'];
        $dlChk = "dl".$service['id'];
        echo '<div class="form-container">';
        echo '<div class="form-grid">';
   
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Duplicate?</h4>';
        echo "<input type='checkbox' title='Select to Duplicate Service Request' name='".$dpChk."'>";
        echo '</div>';
 
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Update?</h4>';
        echo "<input type='checkbox' title='Select to Update Service Request' name='".$upChk."'>";   
        echo '</div>';
 
        echo '<div class="form-item">';
        echo '<h4 class="form-item-title">Delete?</h4>';
        echo "<input type='checkbox' title='Select to Delete Service Request' name='".$dlChk."'>";
        echo '</div>';
        echo '</div>';
        echo '<div class="form-grid">';
  
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Cust First Name: ".$service['custfirstname']." </h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Cust Last Name: ".$service['custlastname']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Phone: ".$service['phone']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Email: ".$service['email']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Address: ".$service['address']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Date of Request: ".$service['requestdate']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Date Request Completed: ".$service['requestcomplete']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Service Charge: ".$service['charge']."</h4>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Description of Service: ".$service['service']."</h4>";
       echo '</div>';

       echo '<button type="submit" name="submitServiceProcess">Process This Service Request</button>'; 
       echo '</div>';
        echo '</div>';  
    
       }
    
   
    
       echo '</form>';
       echo '</div>';
       echo '</div>';
    //    echo '</div>';
       ?>
   
    </section>
</div>

<?php
echo '<br><br>';
  require 'footer.php';
?>
</div>
</body>
</html>
