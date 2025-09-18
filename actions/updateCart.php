<?php
session_start();
require_once '../config/Database.php';
require_once '../models/GolfCartInventory.php';
date_default_timezone_set("America/Phoenix");

$database = new Database();
$db = $database->connect();
$golfCart = new GolfCartInventory($db);
$allGolfCarts = $_SESSION['allGolfCarts'];

if (isset($_POST['submitUpdate'])) {
 
    foreach ($allGolfCarts as $cart) {
    $ctSelectChk = "ctselect".$cart['id'];
    $ctnumID = "ctnum".$cart['id'];
    $ctvinID = "ctvin".$cart['id'];
    $ctdescID = "ctdesc".$cart['id'];
    $ctyearID = "ctyear".$cart['id'];
    $ctnotesID = "ctnotes".$cart['id'];
    $ctdateaID = "ctdatea".$cart['id'];
    $ctdatesID = "ctdates".$cart['id'];
    $ctcostID = "ctcost".$cart['id'];
    $ctbuypID = "ctbuyp".$cart['id'];
    $ctsellpID = "ctsellp".$cart['id'];
    $ctpowerID = "ctpower".$cart['id'];
    $ctidID = "ctid".$cart['id'];
 
        if (isset($_POST["$ctSelectChk"])) {

            $golfCart->id = $_POST["$ctidID"];
            $golfCart->number = $_POST["$ctnumID"];
            $golfCart->vin = $_POST["$ctvinID"];
            $golfCart->description = $_POST["$ctdescID"];
            $golfCart->year = $_POST["$ctyearID"];
            $golfCart->notes = $_POST["$ctnotesID"];
            $golfCart->powersource = $_POST["$ctpowerID"];
            $golfCart->dateacquired = $_POST["$ctdateaID"];
            $golfCart->buyingprice = $_POST["$ctbuypID"];
            $golfCart->datesold = $_POST["$ctdatesID"];
            $golfCart->sellingprice = $_POST["$ctsellpID"];
   

            $golfCart->update();
        }
    }
    
    
    $redirect = "Location: ".$_SESSION['adminurl'];
    header($redirect);
    exit;
}
?>