<?php

class GolfCartInventoryArchive {
    // DB stuff
    private $conn;
    private $table = 'golfcartinventoryarchive';

    public $id;
    public $description;
    public $number;
    public $year;
    public $powersource;
    public $dateacquired;
    public $buyingprice;
    public $datesold;
    public $sellingprice;
    public $vin;
    public $notes;
    public $archivedate;
  

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Users
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY number ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    public function readByYear() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY year DESC ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    // Get Single Danceclass
    public function read_single() {
        
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id = ? LIMIT 0,1'; 
  
          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id'];
          $this->number = $row['number'];
          $this->description = $row['description'];
          $this->year = $row['year'];
          $this->powersource = $row['powersource'];
          $this->dateacquired = $row['dateacquired'];
          $this->datesold = $row['datesold'];
          $this->buyingprice = $row['buyingprice'];
          $this->sellingprice = $row['sellingprice'];
          $this->sellingprice = $row['vin'];
          $this->sellingprice = $row['notes'];


    }
    



    // Create User
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . 
          ' SET number = :number, 
                description = :description, 
                year = :year,
                vin = :vin, 
                notes = :notes,
                powersource = :powersource, 
                dateacquired = :dateacquired, 
                datesold = :datesold,
                buyingprice = :buyingprice, 
                sellingprice = :sellingprice ';


          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
 
          $this->description = htmlspecialchars(strip_tags($this->description));
          $this->notes = htmlspecialchars(strip_tags($this->notes));
      
          // Bind data
          $stmt->bindParam(':number', $this->number);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':year', $this->year);
          $stmt->bindParam(':vin', $this->vin);
          $stmt->bindParam(':notes', $this->notes);
          $stmt->bindParam(':powersource', $this->powersource);
          $stmt->bindParam(':dateacquired', $this->dateacquired);
          $stmt->bindParam(':datesold', $this->datesold);
          $stmt->bindParam(':buyingprice', $this->buyingprice);
          $stmt->bindParam(':sellingprice', $this->sellingprice);


          // Execute query
          if ($stmt->execute()) {

            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }


    public function update() {
          // Create query
      
          $query = 'UPDATE ' . $this->table . 
          ' SET number = :number, description = :description, year = :year,
          dateacquired = :dateacquired, datesold = :datesold , 
          powersource =: powersource, vin = :vin, notes = :notes,
          buyingprice = :buyingprice, sellingprice = :sellingprice ';
   

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
 
                    // Clean data

          $this->description = htmlspecialchars(strip_tags($this->description));
          
          $this->description = htmlspecialchars(strip_tags($this->notes));


          // Bind data
          $stmt->bindParam(':number', $this->number);
          $stmt->bindParam(':description', $this->description);
          $stmt->bindParam(':year', $this->year);
          $stmt->bindParam(':vin', $this->vin);
          $stmt->bindParam(':notes', $this->notes);
          $stmt->bindParam(':powersource', $this->powersource);
          $stmt->bindParam(':dateacquired', $this->dateacquired);
          $stmt->bindParam(':datesold', $this->datesold);
          $stmt->bindParam(':buyingprice', $this->buyingprice);
          $stmt->bindParam(':sellingprice', $this->sellingprice);
      
      

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
 




    // Delete Danceclass
    public function delete() {
        
          // Create query
          $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));

          // Bind data
          $stmt->bindParam(':id', $this->id);

          // Execute query
          if($stmt->execute()) {
            return true;
          }

          // Print error if something goes wrong
          printf("Error: %s.\n", $stmt->error);

          return false;
    }
   
    
}
?>