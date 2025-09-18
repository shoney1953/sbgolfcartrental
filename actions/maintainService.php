<?php
session_start();

$addService = false;

if (isset($_POST['submitAddService'])) {
    $addService = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>SB Golf Cart Rental - Add New Service Request</title>
</head>
<body>
<nav class="nav">
        <div class="container">
        
        <ul>
            <li><a href="../administration.php">Back to Administration</a></li>
        </ul>
        </div>
</nav>
    <div class="section-back">
      <br><br><br>
    <section id="services" class="container content">

      <?php
    
        if ($addService) {
       
            echo '<div class="form-container">';
            echo '<form method="POST" action="addService.php">';
            echo '<h4 class="form-title">Enter Service Information then click Add Request</h4>';
            echo '<div class="form-grid">';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Customer First Name</h4>';
            echo "<input type='text' name='custfirstname' required>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Customer Last Name</h4>';
            echo "<input type='text' name='custlastname' required>";
            echo '</div>';
 
            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Phone</h4>';
            echo "<input type='tel' name='phone' pattern='[0-9]{3}-[0-9]{3}-[0-9]{4}' required>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Email</h4>';
            echo "<input type='email' name='email' ><br>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Date of Request</h4>';
            echo "<input type='date' name='requestdate' required>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Date of Completion</h4>';
            echo "<input type='date' name='requestcomplete' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Charge</h4>';
            echo "<input type='number' name='charge' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Service<br></h4>';
            echo '<textarea name="service" cols="50" rows="4"></textarea>';
            echo '</div>'; 
            
            echo '</div>'; // end form-grid            
 
            echo '<button type="submit" name="submitAddService">Click to Add the Service Requests</button><br>';
 
            echo '</form>'; // end adduser form
            echo '</div>'; // end form container
  
        }

        ?> 
    </section>
    </div>
<?php
 echo '<br><br>';
  require '../footer.php';
?>
</body>
</html>

