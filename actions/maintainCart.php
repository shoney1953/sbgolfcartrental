<?php
session_start();

$addCart = false;

if (isset($_POST['submitAddCart'])) {
    $addCart = true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>SB Golf Cart Rental - Add New Cart</title>
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
    <section id="users" class="container content">

      <?php
    
        if ($addCart) {
       
            echo '<div class="form-container">';
            echo '<form method="POST" action="addCart.php">';
            echo '<h4 class="form-title">Enter Cart Information then click Add Cart</h4>';
            echo '<div class="form-grid">';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Cart Number</h4>';
            echo "<input type='number' name='number' required>";
            echo '</div>';
 
            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">VIN</h4>';
            echo "<input type='text' name='vin' required>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Description</h4>';
            echo "<input type='text' name='description' required><br>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Year</h4>';
            echo "<input type='year' name='year' required>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Power Source</h4>';
            echo "<input type='text' name='powersource'>";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Date Acquired</h4>';
            echo "<input type='date' name='dateacquired' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Buying Price</h4>';
            echo "<input type='number' name='buyingprice' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Date Sold</h4>';
            echo "<input type='date' name='datesold' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Selling Price</h4>';
            echo "<input type='number' name='sellingprice' >";
            echo '</div>';

            echo '<div class="form-item">';
            echo '<h4 class="form-item-title">Notes<br></h4>';
            echo '<textarea name="notes" cols="50" rows="3"></textarea>';
            echo '</div>'; 
            
            echo '</div>'; // end form-grid            
 
            echo '<button type="submit" name="submitAddCart">Click to Add the Cart</button><br>';
 
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

