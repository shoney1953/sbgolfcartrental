<?php
session_start();
require_once '../config/Database.php';
require_once '../models/CartServiceRequests.php';
date_default_timezone_set("America/Phoenix");

$database = new Database();
$db = $database->connect();
$service_request = new CartServiceRequests($db);
if (isset($_POST['submitAddService'])) {

$service_request->custfirstname = $_POST['custfirstname'];
$service_request->custlastname = $_POST['custlastname'];
$service_request->phone = $_POST['phone'];

$service_request->email = $_POST['email'];
$service_request->address = $_POST['address'];

$service_request->service = $_POST['service'];
if (isset($_POST['requestdate'])) {
  if ($_POST['requestdate'] != '') {
    $service_request->requestdate = $_POST['requestdate'];
  }
  else  {
    $service_request->requestdate = '0001-01-01';
  } 
} else  {
  $service_request->requestdate = '0001-01-01';
} 
if (isset($_POST['requestcomplete'])) {
  if ($_POST['requestcomplete'] != '') {
    $service_request->requestcomplete = $_POST['requestcomplete'];
  } else {
    $service_request->requestcomplete = '0001-01-01';
   }
  
} else {
 $service_request->requestcomplete = '0001-01-01';
}
if (isset($_POST['charge'])) {
  if ($_POST['charge'] != '') {
    $service_request->charge = $_POST['charge'];
  }
  else {
    $service_request->charge = 0;
   }
} else {
 $service_request->charge = 0;
}


$service_request->create();
}
$redirect = "Location: ".$_SESSION['adminurl'];
header($redirect);
exit;
?>