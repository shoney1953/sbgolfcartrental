<?php
session_start();
require_once '../config/Database.php';
require_once '../models/GolfCartInventory.php';
date_default_timezone_set("America/Phoenix");

$database = new Database();
$db = $database->connect();
$golfCart = new GolfCartInventory($db);
if (isset($_POST['submitAddCart'])) {

$golfCart->number = $_POST['number'];
$golfCart->vin = $_POST['vin'];
$golfCart->description = $_POST['description'];

$golfCart->year = $_POST['year'];
$golfCart->powersource = $_POST['powersource'];

$golfCart->notes = $_POST['notes'];
if (isset($_POST['dateacquired'])) {
  if ($_POST['dateacquired'] != '') {
    $golfCart->dateacquired = $_POST['dateacquired'];
  }
  else  {
    $golfCart->dateacquired = '0001-01-01';
  } 
} else  {
  $golfCart->dateacquired = '0001-01-01';
} 
if (isset($_POST['datesold'])) {
  if ($_POST['datesold'] != '') {
    $golfCart->datesold = $_POST['datesold'];
  } else {
    $golfCart->datesold = '0001-01-01';
   }
  
} else {
 $golfCart->datesold = '0001-01-01';
}
if (isset($_POST['buyingprice'])) {
  if ($_POST['buyingprice'] != '') {
    $golfCart->buyingprice = $_POST['buyingprice'];
  }
  else {
    $golfCart->buyingprice = 0;
   }
} else {
 $golfCart->buyingprice = 0;
}
if (isset($_POST['sellingprice'])) {
  if ($_POST['sellingprice'] != '') {
    $golfCart->sellingprice = $_POST['sellingprice'];
  }
  else {
    $golfCart->sellingprice = 0;
   }

} else {
 $golfCart->sellingprice = 0;
}

$golfCart->create();
}
$redirect = "Location: ".$_SESSION['adminurl'];
header($redirect);
exit;
?>