<?php 
session_start();
$redoInfo = '';
if (isset($_GET['redoinfo'])) {
   $_SESSION['checklist'] = $_SERVER['REQUEST_URI']; 
   unset($_GET['redoinfo']);
   $tempContractInfo =  $_SESSION['tempcontractinfo'];
   $redoInfo = 'Y';
} else {
   $_SESSION['checklist'] = $_SERVER['REQUEST_URI']; 
   $tempContractInfo = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" 
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/style.css?v=3">
    <title>SaddleBrooke Golf Cart Rentals - Checklist</title>
    <!-- <link rel="icon" type="image/x-icon" href="favicon.ico"> -->
</head>
<body>
<!-- <div class="container-section"> -->
<nav class="nav">
    <div class="container">
        <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="rates.php">Rental Rates</a></li>
        <li><a href="conversions.php">Lithium Battery Conversions</a></li>
        <li><a href="repairs.php">Golf Cart Repairs</a></li>
        <li><a href="contact.php">Contact</a></li>
      
        </ul>
    </div>
</nav>

      
        <div class="content">
            <h1>Checklist for Cart Renters</h1>
      
            <!-- <h3>The first step is to review the contract and make sure you are comfortable with the requirements</h3> -->
           
          <!-- /* <a href='img/ContractSept2025.pdf' target='_blank'> */ -->
            <!-- <em>Click to download the Contract</em></a> -->
            <legend>Step 1: review these contract requirements and make sure you are comfortable with them</legend>
            <ol start='1'>
            <li value='1'>Security Deposit $500. The check will be returned to you when the rental period is over assuming the cart 
              is returned without damage
            </li>
            <li>Only Licensed drivers over 18 years old are allow to drive the cart.</li>
            <li>The cart is to remain in Saddlebrooke HOA 1, HOA 2, or SaddleBrooke Ranch only, to be used on its private
              roads or golf courses.
            </li>
            <li>
              SaddleBrooke HOA 1, HOA 2, or SaddleBrooke ranch golf cart rules and traffic signage to be obeyed at all times.
            </li>
            <li>The cart is to be used to transport individuals only</li>
            <li>
              The cart is to be stored in a garage at all times when at the rental property or individual's home.
            </li>
            <li>
              Failure to abide by any of the listed rules can result in the forfeture of part or all of the security deposit.
              <em>The cart renter must read, understand and agree to the rules listed</em>.
            </li>
            </ol>
           
            <fieldset>
            <legend>Step 2: Assuming you can agree to the above rules, fill in the following to start a contract. A contract will be created and sent to Saddlebrooke Golf Cart Rentals

              </legend>
              <p>Mail the check in care of: 
 
              Ron Bouchard 
              63218 E Brooke Park Dr 
              Tucson, AZ  85739;
              Your reservation will be confirmed upon receipt of your check and information.</p>
          
            
            <form method="POST" action="actions/createContract.php" >
              <div class="input-form-grid3">
               <div class="form-item">
                <h4 class="input-form-item-title">First Name</h4>
                <?php
                if ($redoInfo != 'Y') {
                         echo "<input type='text' name='firstname' required placeholder='Your first name'>";
                } else {
                         echo "<input type='text' name='firstname' required value=".$tempContractInfo['firstname'].">";
                }
         
                 echo '</div>';
               echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Last Name</h4>';
                   if ($redoInfo != 'Y') {
                       echo "<input type='text' name='lastname' required placeholder='Your last name'>";
                   } else {
                       echo "<input type='text' name='lastname' required value=".$tempContractInfo['lastname']." >";
                   }
             
                echo '</div>';
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Cell Phone Format: 123-456-7890</h4>';
                  if ($redoInfo != 'Y') {
                        echo "<input type='tel' placeholder='123-456-7890' name='cellphone' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required />";
                  } else {
                        echo "<input type='tel'  name='cellphone' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' value =".$tempContractInfo['cellphone']." required />";
                  }
            
                echo '</div>';
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Email</h4>';
                 if ($redoInfo != 'Y') {
                  echo "<input type='email' name='email' required placeholder='Contact Email'>";
                 } else {
                  echo "<input type='email' name='email' required value=".$tempContractInfo['email'].">";
                 }
        
               echo '</div>';
               echo '<div class="form-item">';
               
               echo "<h4 class='input-form-item-title'>Driver's License Number</h4>";
                if ($redoInfo != 'Y') {
                    echo "<input type='text' name='dlnum' required placeholder='Your Driver&apos;s License Number'>";
                 } else {
                     echo "<input type='text' name='dlnum' required value=".$tempContractInfo['dlnum'].">";
                 }
                 echo '</div>';
           
                 echo '<div class="form-item">';
                echo "<h4 class='input-form-item-title'>Drivers License State</h4>";
                 if ($redoInfo != 'Y') {
                     echo "<input type='text' name='dlstate' required placeholder='State where License was issued'>";
                 } else {
                      echo "<input type='text' name='dlstate' required value=".$tempContractInfo['dlstate'].">";
                 }
            
                 echo '</div>';
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Drivers License Expiration</h4>';
                if ($redoInfo != 'Y') {
                  echo "<input type='date' name='dlexp' required placeholder='Date when License will expire'>";
                } else {
                  echo "<input type='date' name='dlexp' required value=".$tempContractInfo['dlexp'].">";
                }
   
                echo '</div>';
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Rental Address</h4>';
                if ($redoInfo != 'Y') {
                      echo "<input type='text' name='rentaladdr' required placeholder='Where the rental will be delivered'>";
                  } else {
                      echo "<input type='text' name='rentaladdr' required value=".$tempContractInfo['rentaladdr'].">";
                  }
        
                echo '</div>';
                echo '<div class="form-item">';
          
                echo '<h4 class="input-form-item-title">SaddleBrooke Area</h4>';
                 if ($redoInfo != 'Y') {
                echo "<input type='radio' name='sbarea' value='HOA-1' required>";
                 } else {
                  if ($tempContractInfo['saddlebrookearea'] === 'HOA-1') {
                     echo "<input type='radio' name='sbarea' value='HOA-1' checked>";
                  } else {
                      echo "<input type='radio' name='sbarea' value='HOA-1' required>";
                  }
                 }
                echo '<label for="HOA1">HOA 1</label>';
                if ($redoInfo != 'Y') {
                   echo "<input type='radio' name='sbarea' value='HOA-2' required>";
                } else {
                    if ($tempContractInfo['saddlebrookearea'] === 'HOA-2') {
                        echo "<input type='radio' name='sbarea' value='HOA-2' checked>";
                    } else {
                        echo "<input type='radio' name='sbarea' value='HOA-2' required>";
                    }

                }
             
                echo '<label for="ranch">HOA 2</label>';
              if ($redoInfo != 'Y') {
                    echo "<input type='radio' name='sbarea' value='RANCH' required>";
                } else {
                 if ($tempContractInfo['saddlebrookearea'] === 'RANCH') {
                    echo "<input type='radio' name='sbarea' value='RANCH' checked>";
                 } else {
                    echo "<input type='radio' name='sbarea' value='RANCH' required>";
                 }
                }
                echo '<label for="RANCH">SaddleBrooke Ranch</label>';
                echo '</div> ';
                
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Rental Start Date</h4>';
                if ($redoInfo != 'Y') {
                          echo "<input type='date' name='rentstart' required > ";
                } else {
                       echo "<input type='date' name='rentstart' value=".$tempContractInfo['rentstart']."> ";
                }
        
                echo '</div>';
                echo '<div class="form-item">';
                echo '<h4 class="input-form-item-title">Rental End Date</h4>';
                 if ($redoInfo != 'Y') {
                     echo "<input type='date'  name='rentend' required >";
                 } else {
                      echo "<input type='date'  name='rentend' value=".$tempContractInfo['rentend']." >";
                 }
             
                echo '</div>';
                 echo '<div class="form-item">';
                 echo '<h4 class="input-form-item-title">Have you mailed the $100 check to confirm rental?</h4>';
                if ($redoInfo != 'Y') {
                   echo "<input title='Check to indicate you have mailed the check' type='checkbox' name='chkmailed'>";
                } else {
                  if ($tempContractInfo['checkmailed'] === 'Yes') {
                    echo "<input title='Check to indicate you have mailed the check' type='checkbox' name='chkmailed' checked>";
                  } else {
                    echo "<input title='Check to indicate you have mailed the check' type='checkbox' name='chkmailed'>";
                  }
                }
                
               
                echo '</div>';
            ?>
              </div> 
             <button name="SubmitContractInfo">Submit Information</button>
            </form>

            </form>

            </fieldset>
            </div>
            <!-- <ol> -->

              <!-- <li value="1">Your full name</li>
              <li>Your home address</li>
              <li>Your rental or home HOA - ie HOA 1, HOA 2, or SaddleBrooke Ranch</li>
              <li>Your cell number</li>
              <li>Your email address</li>
              <li>Dates you will need the cart (please be as specific as you can)</li> -->
              
            <!-- </ol> -->
       
  <h5><a href="contact.php">Contact Us</a></h5>
            
</div>

<!-- </div> -->
<?php
  require 'footer.php';
?>
</body>
</html>