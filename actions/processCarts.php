<?php
session_start();
require_once '../config/Database.php';
require_once '../models/GolfCartInventory.php';

date_default_timezone_set("America/Phoenix");
$_SESSION['returnurl'] = $_SERVER['REQUEST_URI']; 
$allGolfCarts = $_SESSION['allGolfCarts'] ;
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
$cart = new GolfCartInventory($db);


$num_users = 0;

$processCart = false;

$updateCart = false;
$deleteCart = false;

$archiveCart = false;
$duplicateCart = false;
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
$Cart_count = 0;

if (isset($_POST['submitCartProcess'])) {
   
    foreach ($allGolfCarts as $Cart) {

        $Cart_count++;
        $processCart = false;
        $processReg = false;
        $updateReg = false;
        $deleteReg = false;
        $addReg = false;
        $processReg = false;
        $processCart = false;
        $reportCart = false;
        $updateCart = false;
        $deleteCart = false;
        $emailCart = false;
        $csvCart = false;
        $duplicateCart = false;
        $archiveCart = false;
        $rpChk = "rp".$Cart['id'];
        $upChk = "up".$Cart['id'];
        $dlChk = "dl".$Cart['id'];
        $emChk = "em".$Cart['id'];
        $dpChk = "dp".$Cart['id'];
        $aeChk = "ae".$Cart['id'];
        $arChk = "ar".$Cart['id'];
        $drChk = "dr".$Cart['id'];
        $urChk = "ur".$Cart['id'];
        $cvChk = "cv".$Cart['id'];
        $mbSrch = "srch".$Cart['id'];
   //  Cart check boxes 



    if (isset($_POST["$upChk"])) {
        $updateCart = true;
        $processCart = true;

        break;
    }
    if (isset($_POST["$dlChk"])) {
        $deleteCart = true;
        $processCart = true;
        break;
    }

    
    if (isset($_POST["$dpChk"])) {
        $duplicateCart = true;
        $processCart = true;
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
    <title>SBDC Ballroom Dance - Process Carts</title>
</head>
<body>
<nav class="nav">
        <div class="container">
        
        <ul>
            <li><a href="../administration.php">Back to Administration</a></li>
        </ul>
        </div>
</nav>
 
<section id="processCarts" class="content">
<div class="section-back">
    <br><br><br>
<h3>Process Carts</h3>
<?php

  if ($processCart) {

    require '../processCartItems.php';
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