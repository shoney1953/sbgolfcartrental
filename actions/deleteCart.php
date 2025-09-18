<?php
session_start();

require_once '../config/Database.php';

require_once '../models/GolfCartInventory.php';
require_once '../models/GolfCartInventoryArchive.php';
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
$allGolfCarts = $_SESSION['allGolfCarts'];
$database = new Database();
$db = $database->connect();

$golfCart = new GolfCartInventory($db);
$golfCart_archive = new GolfCartInventoryArchive($db);


if (isset($_POST['submitDelete'])) {
    foreach ($allGolfCarts as $cart) {
      $ctSelectChk = "ctselect".$cart['id'];
  
        if (isset($_POST["$ctSelectChk"])) {
      
            $golfCart_archive->number = $cart['number'];
            $golfCart_archive->vin = $cart['vin'];
            $golfCart_archive->year = $cart['year'];
            $golfCart_archive->description = $cart['description'];
            $golfCart_archive->powersource = $cart['powersource'];
            $golfCart_archive->dateacquired = $cart['dateacquired'];
            $golfCart_archive->datesold = $cart['datesold'];
            $golfCart_archive->buyingprice = $cart['buyingprice'];
            $golfCart_archive->sellingprice = $cart['sellingprice'];
            $golfCart_archive->notes = $cart['notes'];
            $golfCart_archive->create();
            $golfCart->id = $cart['id'];
            $golfCart->delete();
        }
    }
}
   
$redirect = "Location: ".$_SESSION['adminurl'];
header($redirect);
exit;

?>