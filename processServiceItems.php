<?php
$servicesArch = [];
// echo '<div class="content">';


  if ($updateService) {

    echo '<form method="POST" action="updateService.php">';
    echo "<h4 class='form-title'>Updating Service Information</h4>";
    foreach ($allServiceRequests as $service) {

      $upChk = "up".$service['id'];
      if (isset($_POST["$upChk"])) {
       $svSelectChk = "svselect".$service['id'];
       $svcustlID = "svcustl".$service['id'];
       $svcustfID = "svcustf".$service['id'];
       $svphoneID = "svphone".$service['id'];
       $svemailID = "svemail".$service['id'];
       $svaddrID = "svaddr".$service['id'];
       $svreqdID = "svreqd".$service['id'];
       $svreqcID = "svreqc".$service['id'];
       $svchargeID = "svcharge".$service['id'];
       $svserviceID = "svservice".$service['id'];

       $svidID = "svid".$service['id'];

       echo '<div class="form-container">';
       echo '<div class="form-grid">';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Update?</h4>";
       echo "<input type='checkbox' name='".$svSelectChk."' checked title='Check this box to update'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Customer First Name</h4>";
       echo "<input type='text' name='".$svcustfID."' value='".$service['custfirstname']."' 
             title='Enter the Customer Last Name'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Customer Last Name</h4>";
       echo "<input type='text' name='".$svcustlID."' value='".$service['custlastname']."' 
             title='Enter the Customer Last Name'>";
       echo '</div>';
       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Phone</h4>";
       echo "<input type='tel' class='text-large' name='".$svphoneID."' 
             value='".$service['phone']."' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' title='Enter the Customer Phone'>";
       echo '</div>';
       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Email</h4>";
       echo "<input type='email' class='text-large' name='".$svemailID."' 
             value='".$service['email']."' title='Enter the Customer Email'>";
       echo '</div>';
       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Address</h4>";
       echo "<input type='text' class='text-large' name='".$svaddrID."' 
             value='".$service['address']."' title='Enter Customer Address'>";
       echo '</div>';


       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Service Request Date</h4>";
       echo "<input type='date' class='text-large' name='".$svreqdID."' 
             value='".$service['requestdate']."' title='Enter the Date Contacted about Service'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Service Request Completed</h4>";
       echo "<input type='date' class='text-large' name='".$svreqcID."' 
             value='".$service['requestcomplete']."' title='Enter the Date Service was completed'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Service Charge</h4>";
       echo "<input type='num' class='text-large' name='".$svchargeID."' 
             value='".$service['charge']."' title='Enter the Amount Charged for the Service'>";
       echo '</div>';
       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Service Description</h4>";

        echo "<textarea title='Enter Service Description' name='".$svserviceID."'  cols='100' rows='3' >".$service['service']."</textarea>";
       echo '</div>';
      echo "<input type='hidden' name='".$svidID."' value='".$service['id']."'>"; 
 
       echo '</div>'; // end of form grid for each service
       echo '</div>'; // end of form container
      } // end of if isset upchk

    
   
  } // end of for each
  echo '<button type="submit" name="submitUpdate">Update Service(s)</button><br>';
    echo '</form>';
   
  }
if ($deleteService) {
  echo '<div class="form-container">';
  echo "<h4 class='form-title'>Deleting Selected Services</h4>";
  echo '<form method="POST" action="deleteService.php">';
  echo '<table>' ;
  echo '<thead>';
  echo '<tr>';
  echo '<th>Delete</th>';
  echo '<th>Customer First Name</th>';  
  echo '<th>Customer Last Name</th>';
  echo '<th>Phone</th>';
  echo '<th>Email</th>';
  echo '<th>Address</th>';
  echo '<th>Request Date</th>';
  echo '<th>Request Complete</th>';
  echo '<th>Charge</th>';
  echo '<th>Service</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($allServiceRequests as $service) {
    $dlChk = "dl".$service['id'];
    if (isset($_POST["$dlChk"])) {
     $svSelectChk = "svselect".$service['id'];
     $svidID = "svid".$service['id'];
     
        echo '<tr>';
        echo "<td><input type='checkbox' name='".$svSelectChk."' title='Check this box to archive and delete'></td>";
        echo "<td>".$service['custfirstname']."</td>";
        echo "<td>".$service['custlastname']."</td>";
        echo "<td>".$service['phone']."</td>";
        echo "<td>".$service['email']."</td>";
        echo "<td>".$service['address']."</td>";
        echo "<td>".$service['requestdate']."</td>";
        echo "<td>".$service['requestcomplete']."</td>";
        echo "<td>".$service['charge']."</td>";
        echo "<td>".$service['service']."</td>";

        echo "<input type='hidden' name='".$svidID."' value='".$service['id']."'>";
        echo '</tr>';
    }

}
echo '</tbody>';
echo '</table>';  
echo '<button type="submit" name="submitDelete">Delete the Service</button><br>';
echo '</form>';
echo '</div>';

  }


  
  if ($duplicateService) {

  
    echo '<form method="POST" action="addService.php">';


    foreach ($allServiceRequests as $service) {
      $dpChk = "dp".$service['id'];
      $svSelectChk = "svselect".$service['id'];
      if (isset($_POST["$dpChk"])) {
          echo '<div class="form-container">';
          echo '<h4 class="form-title form-division">To Duplicate Service, Modify Service Information and click Add a New Service</h4>';
          echo '<div class="form-grid">';
          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Duplicate?</h4>";
          echo "<input type='checkbox' name='".$svSelectChk."' checked title='Check this box to Duplicate'>";
          echo '</div>';
          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Customer First Name</h4>";
          echo "<input type='text' name='custfirstname' value='".$service['custfirstname']."' title='Enter Customer First Name'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Customer Last Name</h4>";
          echo "<input type='text' name='custlastname' value='".$service['custlastname']."' title='Enter Customer Last Name'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Phone</h4>";
          echo "<input type='tel' name='phone' value='".$service['phone']."' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' title='Enter the Phone #'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Email</h4>";
          echo "<input type='email' name='email' value='".$service['email']."' title='Enter the customer email'>";
          echo '</div>';

        
          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Address</h4>";
          echo "<input type='text' name='address' value='".$service['address']."' title='Enter the customer address' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Request Date</h4>";
          echo "<input type='date' name='requestdate' value='".$service['requestdate']."' title='Enter Date of Request' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Request Completed</h4>";
          echo "<input type='date' name='requestcomplete' value='".$service['requestcomplete']."' title='Enter Date Request Completed' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Service Charge</h4>";
          echo "<input type='number' name='charge' value='".$service['charge']."' 
              title='Enter the price paid for the service' >";
          echo '</div>';

  

          echo '<div class="form-item">';
          echo "<h4 class='form-item-title'> Service Description</h4>";
        echo "<textarea title='Enter Description of the Service' name='service' cols='100' rows='3' >".$service['service']."</textarea>";
        echo '</div>';
        echo '</div>';
    
        echo '<button type="submit" name="submitAddService">Add a New Service</button><br>';
        echo '</div>'; // end form grid
          break; // break out of for each loop after 1 found

      }
      
    
}
     
    
      echo '</form>';
 
  }
//   echo "</div>";

    
//   $redirect = "Location: ".$_SESSION['adminurl']";
//     header($redirect);
//     exit;
 

?>