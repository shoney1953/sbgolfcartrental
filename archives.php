<?php 
session_start();
require_once 'config/Database.php';
require_once 'models/GolfCartInventoryArchive.php';  
require_once 'models/CartServiceRequestsArchive.php';  
$_SESSION['adminurl'] = $_SERVER['REQUEST_URI'];
$rowCount = 0;
$num_golfcarts = 0;
$database = new Database();
$db = $database->connect();


$golfcart = new GolfCartInventoryArchive($db);
$result = $golfcart->read();

$rowCount = $result->rowCount();
$num_golfcarts = $rowCount;
$allGolfCartsArchive = [];

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
            'archivedate' => $archivedate,
            "notes" => $notes

        );
        array_push($allGolfCartsArchive, $cart_item);
    
    }
  
   
} 
$servicereq = new CartServiceRequestsArchive($db);
$result = $servicereq->read();

$rowCount = $result->rowCount();
$num_servicerequests = $rowCount;
$allServiceRequestsArchive = [];

if ($rowCount > 0) {

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $service_item = array(
            'id' => $id,
            'archivedate' => $archivedate,
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
        array_push($allServiceRequestsArchive, $service_item);
    
    }
  
 
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
        <li><a href="administration.php">Administration</a></li>
        <li><a href="#carts">Archived Cart Inventory</a></li>
        <li><a href="#service">Archived Service Requests</a></li>
        <li><a href="#rentals">Archived Rental Requests</a></li>
 
        </ul>
    </div>
</nav>



<section id="carts" class="content">

<?php
  
    echo '<br><br><br>';
    echo '<h4 class="form-title">Archived Carts</h4>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Date Archived</th>';
    echo '<th>Number</th>';
    echo '<th>Vin</th>';
    echo '<th>Year</th>';
    echo '<th>Description</th>';
    echo '<th>Date Acquired</th>';
    echo '<th>Buying Price</th>';
    echo '<th>Date Sold</th>';
    echo '<th>Selling Price</th>';
    echo '<th>Notes</th>';
    echo '</tr>';
  
    foreach($allGolfCartsArchive as $cart) {
    echo '<tr>';
    echo "<td>".$cart['archivedate']."</td>";
    echo "<td>".$cart['number']."</td>";
    echo "<td>".$cart['vin']."</td>";
    echo "<td>".$cart['year']."</td>";
    echo "<td>".$cart['description']."</td>";
    echo "<td>".$cart['dateacquired']."</td>";
    echo "<td>".$cart['buyingprice']."</td>";
    echo "<td>".$cart['datesold']."</td>";
    echo "<td>".$cart['sellingprice']."</td>";
    echo "<td>".$cart['notes']."</td>";
    echo "</tr>";

    }
    echo '</table>' ;
   
     
    ?>
</section>

    </section>
    <section id="service" class="content">


<?php
  
    echo '<br><br><br>';
    echo '<h4 class="form-title">Archived Service Requests</h4>';
    echo '<table>';
    echo '<tr>';
    echo '<th>Date Archived</th>';
    echo '<th>Cust First Name</th>';
    echo '<th>Cust Last Name</th>';
    echo '<th>Phone</th>';
    echo '<th>Email</th>';
    echo '<th>Address</th>';
    echo '<th>Request Date</th>';
    echo '<th>Request Complete</th>';
    echo '<th>Charge</th>';
    echo '<th>Service</th>';
    echo '</tr>';
  
    foreach($allServiceRequestsArchive as $service) {
    echo '<tr>';
    echo "<td>".$service['archivedate']."</td>";
    echo "<td>".$service['custfirstname']."</td>";
    echo "<td>".$service['custlastname']."</td>";
    echo "<td>".$service['phone']."</td>";
    echo "<td>".$service['email']."</td>";
    echo "<td>".$service['address']."</td>";
    echo "<td>".$service['requestdate']."</td>";
    echo "<td>".$service['requestcomplete']."</td>";
    echo "<td>".$service['charge']."</td>";
    echo "<td>".$service['service']."</td>";
    echo "</tr>";

    }
    echo '</table>' ;
   
     
    ?>
</section>


  

    


<?php
echo '<br><br>';
  require 'footer.php';
?>
</div>
</body>
</html>
