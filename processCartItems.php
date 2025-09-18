<?php
$cartsArch = [];
// echo '<div class="content">';


  if ($updateCart) {

    echo '<form method="POST" action="updateCart.php">';
    echo "<h4 class='form-title'>Updating Cart Information</h4>";
    foreach ($allGolfCarts as $cart) {

      $upChk = "up".$cart['id'];
      if (isset($_POST["$upChk"])) {
       $ctSelectChk = "ctselect".$cart['id'];
       $ctnumID = "ctnum".$cart['id'];
       $ctyearID = "ctyear".$cart['id'];
       $ctdescID = "ctdesc".$cart['id'];
       $ctvinID = "ctvin".$cart['id'];
       $ctpowerID = "ctpower".$cart['id'];
       $ctdateaID = "ctdatea".$cart['id'];
       $ctdatesID = "ctdates".$cart['id'];
       $ctbuypID = "ctbuyp".$cart['id'];
       $ctsellpID = "ctsellp".$cart['id'];
       $ctnotesID = "ctnotes".$cart['id'];
       $ctidID = "ctid".$cart['id'];

       echo '<div class="form-container">';
       echo '<div class="form-grid">';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Update?</h4>";
       echo "<input type='checkbox' name='".$ctSelectChk."' checked title='Check this box to update'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Cart Number</h4>";
       echo "<input type='text' name='".$ctnumID."' value='".$cart['number']."' 
             title='Enter the Number of the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Cart Description</h4>";
       echo "<input type='text' class='text-large' name='".$ctdescID."' 
             value='".$cart['description']."' title='Enter the Description of the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Cart VIN</h4>";
       echo "<input type='text' class='text-large' name='".$ctvinID."' 
             value='".$cart['vin']."' title='Enter the VIN of the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Cart Year</h4>";
       echo "<input type='year' class='text-large' name='".$ctyearID."' 
             value='".$cart['year']."' title='Enter the Year of the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Cart Power Source</h4>";
       echo "<input type='text' class='text-large' name='".$ctpowerID."' 
             value='".$cart['powersource']."' title='Enter the Power Source of the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Date Acquired</h4>";
       echo "<input type='date' class='text-large' name='".$ctdateaID."' 
             value='".$cart['dateacquired']."' title='Enter the Date Acquired'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Buying Price</h4>";
       echo "<input type='num' class='text-large' name='".$ctbuypID."' 
             value='".$cart['buyingprice']."' title='Enter the Amount Paid for the Cart'>";
       echo '</div>';

       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Date Sold</h4>";
       echo "<input type='date' class='text-large' name='".$ctdatesID."' 
             value='".$cart['datesold']."' title='Enter the Date Sold'>";
       echo '</div>';
       
       echo "<div class='form-item'>";
       echo "<h4 class='form-item-title'>Selling Price</h4>";
       echo "<input type='num' class='text-large' name='".$ctsellpID."' ;
             value='".$cart['sellingprice']."' title='Enter the Selling Price'>";
       echo '</div>';
       echo '<div class="form-item">';
       echo "<h4 class='form-item-title'>Cart Notes</h4>";
       echo "<textarea title='Enter Notes About the Cart' name='".$ctnotesID."' cols='50' rows='4' >".$cart['notes']."</textarea>";
       echo '</div>';
      echo "<input type='hidden' name='".$ctidID."' value='".$cart['id']."'>"; 
 
       echo '</div>'; // end of form grid for each event
       echo '</div>'; // end of form container
      } // end of if isset upchk

    
   
  } // end of for each
  echo '<button type="submit" name="submitUpdate">Update Cart(s)</button><br>';
    echo '</form>';
   
  }
if ($deleteCart) {
  echo '<div class="form-container">';
  echo "<h4 class='form-title'>Deleting Selected Carts</h4>";
  echo '<form method="POST" action="deleteCart.php">';
  echo '<table>' ;
  echo '<thead>';
  echo '<tr>';
  echo '<th>Delete</th>';
  echo '<th>Number</th>';  
  echo '<th>Vin</th>';
  echo '<th>Description</th>';
  echo '<th>Year</th>';
  echo '<th>Date Acquired</th>';
  echo '<th>Buying Price</th>';
  echo '<th>Date Sold</th>';
  echo '<th>Selling Price</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  foreach ($allGolfCarts as $cart) {
    $dlChk = "dl".$cart['id'];
    if (isset($_POST["$dlChk"])) {
     $ctSelectChk = "ctselect".$cart['id'];
     $ctidID = "ctid".$cart['id'];
     
        echo '<tr>';
        echo "<td><input type='checkbox' name='".$ctSelectChk."' title='Check this box to delete'></td>";
        echo "<td>".$cart['number']."</td>";
        echo "<td>".$cart['vin']."</td>";
        echo "<td>".$cart['description']."</td>";
        echo "<td>".$cart['year']."</td>";
        echo "<td>".$cart['dateacquired']."</td>";
        echo "<td>".$cart['buyingprice']."</td>";
        echo "<td>".$cart['datesold']."</td>";
        echo "<td>".$cart['sellingprice']."</td>";

        echo "<input type='hidden' name='".$ctidID."' value='".$cart['id']."'>";
        echo '</tr>';
    }

}
echo '</tbody>';
echo '</table>';  
echo '<button type="submit" name="submitDelete">Delete the Cart(s)</button><br>';
echo '</form>';
echo '</div>';

  }


  if ($archiveCart) {
  
    echo "<h4>Archiving Selected Carts and Their Associated Registrations</h4>";
    echo '<form method="POST" action="archiveCart.php">';
    echo '<table>' ;
    echo '<thead>';
    echo '<tr>';
    echo '<th>Archive</th>';
    echo '<th>Name</th>';  
    echo '<th>Description</th>';
    echo '<th>Type</th>';
    echo '<th>Room</th>';
    echo '<th>Date</th>';
    echo '<th>Registration Opens</th>';
    echo '<th>Registration Ends</th>';
    echo '<th>DJ</th>';
    echo '<th>ORG Email</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
  
    foreach ($allGolfCarts as $cart) {
      $aeChk = "ae".$cart['id'];
      if (isset($_POST["$aeChk"])) {
       $ctSelectChk = "ctselect".$cart['id'];
       $ctidID = "ctid".$cart['id'];
       
          echo '<tr>';
          echo "<td><input type='checkbox' name='".$ctSelectChk."' checked title='Check this box to delete'></td>";
          echo "<td>".$cart['eventtype']."</td>";
          echo "<td>".$cart['eventdesc']."</td>";
          echo "<td>".$cart['eventtype']."</td>";
          echo "<td>".$cart['eventdesc']."</td>";
          echo "<td>".$cart['eventdate']."</td>";
          echo "<td>".$cart['eventregopen']."</td>";
          echo "<td>".$cart['eventregend']."</td>";
          echo "<td>".$cart['eventdj']."</td>";
          echo "<td>".$cart['orgemail']."</td>";
          echo "<input type='hidden' name='".$ctidID."' value='".$cart['id']."'>";
          echo '</tr>';
   
          }
        }
      
      echo '</tbody>';
      echo '</table><br>';
      echo '<button type="submit" name="submitArchive">Archive these Cart(s) and their registrations</button><br>';
      echo '</form>';
      echo '<br>';
  }

  if ($duplicateCart) {

  
    echo '<form method="POST" action="addCart.php">';


    foreach ($allGolfCarts as $cart) {
      $dpChk = "dp".$cart['id'];
      if (isset($_POST["$dpChk"])) {
          echo '<div class="form-container">';
          echo '<h4 class="form-title form-division">To Duplicate Cart, Modify Cart Information and click Add a New Cart</h4>';
          echo '<div class="form-grid">';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Cart Number</h4>";
          echo "<input type='text' name='number' value='".$cart['number']."' title='Enter the Number of the Cart'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Cart VIN</h4>";
          echo "<input type='text' name='vin' value='".$cart['vin']."' title='Enter the Carts VIN'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Year</h4>";
          echo "<input type='year' name='year' value='".$cart['year']."' title='Select the Year of the Cart'>";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Cart Description</h4>";
          echo "<input type='text'  name='description' 
                value='".$cart['description']."' title='Enter the Description of the Cart'>";
          echo '</div>';
        
          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Power Source</h4>";
          echo "<input type='text' name='powersource' value='".$cart['powersource']."' title='Enter the power source' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Date Acquired</h4>";
          echo "<input type='date' name='dateacquired' value='".$cart['dateacquired']."' title='Enter Date Acquired' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Buying Price</h4>";
          echo "<input type='number' name='eventdj' value='".$cart['buyingprice']."' 
              title='Enter the price paid for the cart' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Date Sold</h4>";
          echo "<input type='date' name='datesold' value='".$cart['datesold']."' 
              title='Enter the date sold' >";
          echo '</div>';

          echo "<div class='form-item'>";
          echo "<h4 class='form-item-title'>Selling Price</h4>";
          echo "<input type='number'  name='sellingprice' value='".$cart['sellingprice']."' 
              title='Enter the price Cart sold for' >";
          echo '</div>';



          echo '<div class="form-item">';
          echo "<h4 class='form-item-title'> Notes</h4>";
        echo "<textarea title='Enter Notes About the Cart' name='notes' cols='100' rows='3' >".$cart['notes']."</textarea>";
        echo '</div>';
        echo '</div>';
    
        echo '<button type="submit" name="submitAddCart">Add a New Cart</button><br>';
        echo '</div>'; // end form grid
          break; // break out of for each loop after 1 found

      }
      
    
}
     
    
      echo '</form>';
 
  }
//   echo "</div>";

    
//   $redirect = "Location: ".$_SESSION['adminurl']."#events";
//     header($redirect);
//     exit;
 

?>