<?php
session_start();

require_once '../config/Database.php';

require_once '../models/CartServiceRequests.php';
require_once '../models/CartServiceRequestsArchive.php';
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
$allServiceRequests = $_SESSION['allServiceRequests'];
$database = new Database();
$db = $database->connect();

$service_request = new CartServiceRequests($db);
$service_requestArch = new CartServiceRequestsArchive($db);

if (isset($_POST['submitDelete'])) {
    foreach ($allServiceRequests as $service) {
      $svSelectChk = "svselect".$service['id'];
  
        if (isset($_POST["$svSelectChk"])) {
      
         
            // first archive the request, then delete from active
            $service_requestArch->custfirstname = $service['custfirstname'];
            $service_requestArch->custlastname = $service['custlastname'];
            $service_requestArch->phone = $service['phone'];
            $service_requestArch->email = $service['email'];
            $service_requestArch->address = $service['address'];
            $service_requestArch->requestdate = $service['requestdate'];
            $service_requestArch->requestcomplete = $service['requestcomplete'];
            $service_requestArch->service = $service['service'];
            $service_requestArch->charge = $service['charge'];
            $service_requestArch->create();

            $service_request->id = $service['id'];
            $service_request->delete();
        }
    }
}
   
$redirect = "Location: ".$_SESSION['adminurl'];
header($redirect);
exit;

?>