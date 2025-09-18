<?php
session_start();
require_once '../config/Database.php';
require_once '../models/CartServiceRequests.php';

date_default_timezone_set("America/Phoenix");
$_SESSION['returnurl'] = $_SERVER['REQUEST_URI']; 
$allServiceRequests = $_SESSION['allServiceRequests'] ;
// if (!isset($_SESSION['username']))
// {
//     $redirect = "Location: ".$_SESSION['homeurl'];
//     header($redirect);
// } else {
//     if (isset($_SESSION['role'])) {
//         if (($_SESSION['role'] != 'ADMIN') && ($_SESSION['role'] != 'SUPERADMIN')) {
//             $redirect = "Location: ".$_SESSION['homeurl'];
//             header($redirect); 
//         }
//        } else {
//         $redirect = "Location: ".$_SESSION['homeurl'];
//         header($redirect);
//        }
// }

$database = new Database();
$db = $database->connect();
$service_request = new CartServiceRequests($db);


$num_service_requests = 0;

$processService = false;

$updateService = false;
$deleteService = false;

$archiveService = false;
$duplicateService = false;
$urChk = false;
$drChk = false;
$arChk = false;
$rpChk = false;
$upChk = false;
$dlChk = false;
$emChk = false;
$dpChk = false;
$aeChk = false;
$cvChk = false;
$Service_count = 0;

if (isset($_POST['submitServiceProcess'])) {
   
    foreach ($allServiceRequests as $Service) {

        $Service_count++;
        $processService = false;
        $processReg = false;
        $updateReg = false;
        $deleteReg = false;
        $addReg = false;
        $processReg = false;
        $processService = false;
        $reportService = false;
        $updateService = false;
        $deleteService = false;
        $emailService = false;
        $csvService = false;
        $duplicateService = false;
        $archiveService = false;
        $rpChk = "rp".$Service['id'];
        $upChk = "up".$Service['id'];
        $dlChk = "dl".$Service['id'];
        $emChk = "em".$Service['id'];
        $dpChk = "dp".$Service['id'];
        $aeChk = "ae".$Service['id'];
        $arChk = "ar".$Service['id'];
        $drChk = "dr".$Service['id'];
        $urChk = "ur".$Service['id'];
        $cvChk = "cv".$Service['id'];
        $mbSrch = "srch".$Service['id'];
   //  Service check boxes 



    if (isset($_POST["$upChk"])) {
        $updateService = true;
        $processService = true;

        break;
    }
    if (isset($_POST["$dlChk"])) {
        $deleteService = true;
        $processService = true;
        break;
    }

    
    if (isset($_POST["$dpChk"])) {
        $duplicateService = true;
        $processService = true;
        break;
    }
  

}


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>SBDC Ballroom Dance - Process Services</title>
</head>
<body>
<nav class="nav">
        <div class="container">
        
        <ul>
            <li><a href="../administration.php">Back to Administration</a></li>
        </ul>
        </div>
</nav>
 
<section id="processServices" class="content">
<div class="section-back">
    <br><br><br>
<h3>Process Service Requests</h3>
<?php

  if ($processService) {

    require '../processServiceItems.php';
  }
?>
</div>
</section>
<footer >
    <?php
    require '../footer.php';
   ?>
</footer>
</body>
</html>