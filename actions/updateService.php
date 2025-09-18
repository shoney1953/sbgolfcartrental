<?php
session_start();
require_once '../config/Database.php';
require_once '../models/CartServiceRequests.php';
date_default_timezone_set("America/Phoenix");

$database = new Database();
$db = $database->connect();
$service_request = new CartServiceRequests($db);
$allServiceRequests = $_SESSION['allServiceRequests'];

if (isset($_POST['submitUpdate'])) {
 
    foreach ($allServiceRequests as $service) {
    $svSelectChk = "svselect".$service['id'];
    $svcustfID = "svcustf".$service['id'];
    $svcustlID = "svcustl".$service['id'];
    $svphoneID = "svphone".$service['id'];
    $svemailID = "svemail".$service['id'];
    $svaddrID = "svaddr".$service['id'];
    $svserviceID = "svservice".$service['id'];
    $svreqdID = "svreqd".$service['id'];
    $svreqcID = "svreqc".$service['id'];
    $svchargeID = "svcharge".$service['id'];

    $svidID = "svid".$service['id'];
 
        if (isset($_POST["$svSelectChk"])) {

            $service_request->id = $_POST["$svidID"];
            $service_request->custfirstname = $_POST["$svcustfID"];
            $service_request->custlastname = $_POST["$svcustlID"];
            $service_request->service = $_POST["$svserviceID"];
            $service_request->phone = $_POST["$svphoneID"];
            $service_request->email = $_POST["$svemailID"];
            $service_request->address = $_POST["$svaddrID"];
            $service_request->requestdate = $_POST["$svreqdID"];
            $service_request->requestcomplete = $_POST["$svreqcID"];
            $service_request->charge = $_POST["$svchargeID"];

            $service_request->update();
        }
    }
    
    
    $redirect = "Location: ".$_SESSION['adminurl'];
    header($redirect);
    exit;
}
?>