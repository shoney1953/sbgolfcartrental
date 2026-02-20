<?php
session_start();
require_once '../includes/sendEmail.php';
require_once '../includes/siteemails.php';
require('../includes/fpdf.php');
require_once '../config/Database.php';
$tempContractInfo = $_SESSION['tempcontractinfo'];

class PDF extends FPDF
{
    function Header() {
        // Logo
        $today = date("m-d-Y");

        $this->SetFont('Arial','B',12);

        $this->Cell( 10, 8, 'Saddlebrooke Golf Cart Rentals, LLC ', 0, 1 );
      
            $this->Image('../img/golfcartlogo.png',150,6,30);
        
    }


}
$day = date("d");
$year = date("Y");
$today = date("m-d-Y");
$dayOfYear = date('z') + 1;

    $pdf = new PDF();
    $pdf->SetTopMargin(5);
 
    $pdf->AliasNbPages();
    $pdf->SetTextColor(26, 22, 22);

    $pdf->addPage('P');
       $pdf->SetFont('Arial', 'BI', 10);
      $pdf->Cell(100,5, '63218 E Brooke Park Dr, Tucson, AZ    Phone: 503-949-4955 ',0,1,"L"); 
      $pdf->Cell(100,5, 'Website: sbgolfcartrentals.com  ',0,1,"L"); 

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50,6, 'GOLF CART RENTAL AGREEMENT (Arizona)',0,1,"L"); 
     $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50,5,"Initiation of Contract date: day ".$dayOfYear." of year ".$year,0,1,"L"); 
    $pdf->Cell(50,5,"RENTER: ".$tempContractInfo['firstname']." ".$tempContractInfo['lastname']."   EMAIL: ".$tempContractInfo['email']. "    CELL: ".$tempContractInfo['cellphone'],0,1,"L"); 
    $pdf->Cell(50,5,"RENTAL ADDRESS: ".$tempContractInfo['rentaladdr']."       SADDLEBROOKE AREA: ".$tempContractInfo['saddlebrookearea'],0,1,"L"); 
    $pdf->Cell(100,5,"DRIVER'S LICENSE #: ".$tempContractInfo['dlnum']."    STATE: ".$tempContractInfo['dlstate']."   EXP: ".$tempContractInfo['dlexp'],0,1,"L"); 
    $pdf->Cell(100,5,"Have you mailed $100 to the address above? ".$tempContractInfo['checkmailed'],0,1,"L"); 

    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,6,"1. Vehicle Information",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(100,6,"Golf Cart#: ______________  Year: __________________  Color: _____________________",0,1,"L"); 
 
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"2. Rental Terms and Rates",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50,5,"    * RENTAL START DATE: ".$tempContractInfo['rentstart']."  /   RENTAL RETURN DATE: ".$tempContractInfo['rentend'],0,1,"L");    

    $pdf->Cell(100,5,"    * Monthly Rental Rate: $373 (including tax)  /   Daily Rental Rate: $14.50 (including tax)  ",0,1,"L"); 
 
    $pdf->Cell(100,5,"    * Deposit $100 (yes) or (no) ",0,1,"L");   
    $pdf->Cell(100,5,"    * Security Deposit $500 (refundable upon safe return) ",0,1,"L");   
    $pdf->Cell(100,6,"    * Total Rental Amount: __________________________",0,1,"L");   
    
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"3. Use of Golf Cart",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(50,5,"The Renter Agrees to: ",0,1,"L");   
    $pdf->Cell(200,5,"    * Operate the cart only on designated areas and roads where golf carts are permitted under Arizona Law.",0,1,"L"); 
    $pdf->Cell(200,5,"    * Use the cart for personal and lawful recreational purposes only.",0,1,"L"); 
    $pdf->Cell(200,5,"    * Not Operate the cart under the influence of drugs or alcohol.",0,1,"L");     
    $pdf->Cell(200,5,"    * Not allow anyone under 16 years of age or without a valid driver's license to operate the cart.",0,1,"L");   
    $pdf->Cell(200,5,"    * Not Overload the cart beyond its rated passenger capacity.",0,1,"L");  
    
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"4. Liability & Indemnification",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(200,5,"    * Renter acknowledges that they are responsible for any injury, damage, or loss causes by misuse or ",0,1,"L"); 
    $pdf->Cell(200,5,"      negligence during the rental period.",0,1,"L"); 
    $pdf->Cell(200,5,"    * Renter agress to indemnify and hold harmless Saddlebrooke Golf Cart Rentals, LLC from all claims, damages, ",0,1,"L"); 
    $pdf->Cell(200,5,"      or expenses resulting from the use or operation of the golf cart, including attorney's fees.",0,1,"L"); 
    

    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"5. Condition, Maintenace & Damage",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10);                
    $pdf->Cell(200,5,"    * The Renter has inspected the cart and found it in good working order.",0,1,"L");  
    $pdf->Cell(200,5,"    * Any pre-existing damage must be recorded before departure:.",0,1,"L"); 
    $pdf->Cell(200,5,"      Notes/Photos: _______________________________________________________________________________",0,1,"L"); 
    $pdf->Cell(200,5,"    * Renter will return the cart in the same condition (except for normal wear).",0,1,"L");  
    $pdf->Cell(200,5,"    * For any damage, loss, tire punctures, or theft, repair or replacement costs will be deducted from the deposit or ",0,1,"L");  
    $pdf->Cell(200,5,"      charged directly to the Renter.",0,1,"L");  

    
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"6. Insurance",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10); 
    $pdf->Cell(200,5,"    * Renter acknowledges the Saddlebrooke Golf Cart Rentals, LLC's insurance may not cover Renter Operation.",0,1,"L");  
    $pdf->Cell(200,5,"    * Renter is advised to verify personal liability coverage for operation of a rented golf cart in Arizona.",0,1,"L");  


    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"7. Termination",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10); 
      $pdf->Cell(200,5,"    * Saddlebrooke Golf Cart Rentals, LLC may terminate this agreement at any time, without refund, if the Renter  ",0,1,"L");  
      $pdf->Cell(200,5,"      violates terms, or operates the cart in an unsafe manner or causes a disturbance",0,1,"L");  

  
    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"8. Governing Law",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10); 
    $pdf->Cell(200,5,"    * This Agreement shall be governed by the laws of the State of Arizona, and any disputes shall be resolved ",0,1,"L");  
    $pdf->Cell(200,5,"      in the county where the rental originated.",0,1,"L");  


    $pdf->SetFont('Arial', 'BU', 10);
    $pdf->Cell(50,5,"9. Entire Agreement",0,1,"L"); 
    $pdf->SetFont('Arial', '', 10); 
    $pdf->Cell(200,5,"    * This document consitutes the entire agreement between Saddlebrooke Golf Cart Rentals, LLC and the Renter, ",0,1,"L");  
    $pdf->Cell(200,5,"      superceding prior verbal or written understandings.",0,1,"L");  
    
    $pdf->SetFont('Arial', 'BU', 12);
    $pdf->Cell(50,5,"Signatures",0,1,"L"); 
       
    $pdf->SetFont('Arial', '', 10); 
    $pdf->Cell(200,8,"Saddlebrooke Golf Cart Rentals, LLC Representative ________________________________ Date: _________________",0,1,"L");  
    
  
    $pdf->Cell(200,8,"Renter Signature _______________________________________  Date: ___________________________ ",0,1,"L");  
        

$pdf->Output("F", "../attachments/RentalContract".$tempContractInfo['lastname'].$tempContractInfo['firstname'].$today.".PDF");
    

//    $redirect = "Location: ".$_SESSION['homeurl'];
//    header($redirect); 
//    exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="../css/style.css?v=3">

    <title>SaddleBrooke Golf Cart Rentals - Checklist</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<!-- <div class="container-section"> -->
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../checklist.php">Return to Checklist</a></li>
        </ul>
    </div>
</nav>
 <div class="content">
    <?php
    echo '<h3> Please view the contract below and if you agree to the terms click on Submit Contract</h3><br>';
        $contract = "../attachments/RentalContract".$tempContractInfo['lastname'].$tempContractInfo['firstname'].$today.".PDF"  ;
      echo "<form  method='POST' action='emailContract.php'> ";
    echo "<input type='hidden' name='attachment' value='".$contract."'>"; 
    echo "<button class='button' name='submitEmailContract' typr='submit' title='click to submit contract'>Submit Contract</button></p>";
    
    echo '</form>';


     echo '<div id="scroller">';

     echo '<iframe class="contract-iframe" name="myiframe" id="myiframe" src="'.$contract.'"></iframe>';
     echo '</div>';
     ?>
 </div>
</body>
</html>