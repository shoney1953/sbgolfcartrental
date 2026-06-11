<?php
session_start();
require('../includes/SendEmail.php');
require('../includes/siteemails.php');
require_once '../config/Database.php';
require_once '../models/ContractInfo.php';
$tempContractInfo = $_SESSION['tempcontractinfo'];

if (isset($_POST['submitEmailContract'])) {


$database = new Database();
$db = $database->connect();
$contractInfo = new ContractInfo($db);
$contractInfo->firstname = $tempContractInfo['firstname'];
$contractInfo->lastname = $tempContractInfo['lastname'];
$contractInfo->email = $tempContractInfo['email'];
$contractInfo->cellphone = $tempContractInfo['cellphone'];
$contractInfo->saddlebrookearea = $tempContractInfo['saddlebrookearea'];
$contractInfo->rentaladdr = $tempContractInfo['rentaladdr'];
$contractInfo->dlnum = $tempContractInfo['dlnum'];
$contractInfo->dlstate = $tempContractInfo['dlstate'];
$contractInfo->dlexp = $tempContractInfo['dlexp'];
$contractInfo->rentstart = $tempContractInfo['rentstart'];
$contractInfo->rentend = $tempContractInfo['rentend'];
$contractInfo->cartnum = 0;
$contractInfo->cartyear = '1999';
$contractInfo->cartcolor = '';
$contractInfo->create();


$fromCC = $webmaster;
$replyEmail = $webmaster;
$regEmail1 = $tempContractInfo['email'];
$regName1 = $tempContractInfo['firstname'].' '.$tempContractInfo['lastname'];
$toCC2 = '';
$toCC3 = '';
$toCC4 = '';
$toCC5 = '';
$emailSubject = "You have initiated a contract with Saddlebrooke Golf Cart Rentals.";
$toCC2 = $ron;
$toCC3 = $brian;
$fromEmailName = 'Saddlebrooke Golf Cart Rentals, LLC';
// $mailAttachment = "../attachments/RentalContract".$tempContractInfo['lastname'].$tempContractInfo['firstname'].$today.".PDF";
$mailAttachment = $_POST['attachment'];
$mailAttachment2 = "";
$replyTopic = "Golf Cart Rental Contract";
$emailBody = 'Thanks, '.$tempContractInfo['firstname']." ".$tempContractInfo['lastname']." for doing business with us!<br>";
$emailBody .= "You have submitted information to create a Golf Cart rental contract with Saddlebrooke Golf Cart Rentals, LLC.<br>";
$emailBody .= "By submitting this contract, you have indicated that you have read, understood, and agreed to the terms of the contract.<br>";
$emailBody .= "The contract created is attached to this email.<br>";
$emailBody .= "If you have not already done so, please mail a check for $100 to secure your rental contract to Saddlebrooke Golf Cart Rentals:<br>";
$emailBody .= "Send  the check in care of: <br>Ron Bouchard <br>63218 E Brooke Park Dr <br>Tucson, AZ 85739 <br>";
$emailBody .= "<br><br>Thanks again for your business.<br>";
$emailBody .= "<br>Ron Bouchard and Brian Hand<br>";

 sendEmail(
            $regEmail1, 
            $regName1, 
            $fromCC,
            $fromEmailName,
            $emailBody,
            $emailSubject,
            $replyEmail,
            $replyTopic,
            $mailAttachment,
            $mailAttachment2,
            $toCC2,
            $toCC3,
            $toCC4,
            $toCC5
        );
}
  $redirect = "Location: ".$_SESSION['homeurl'];
   header($redirect); 
   exit;
?>