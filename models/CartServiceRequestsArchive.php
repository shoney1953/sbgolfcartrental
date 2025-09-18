<?php

class CartServiceRequestsArchive {
    // DB stuff
    private $conn;
    private $table = 'cartservicerequestsarch';

    public $id;
    public $archivedate;
    public $custfirstname;
    public $custlastname;
    public $email;
    public $phone;
    public $address;
    public $requestdate;
    public $requestcomplete;
    public $service;
    public $charge;
  

    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Users
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY custlastname, custfirstname';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    public function readByReqDate() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY requestdate DESC ';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
    public function readByArchDate() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table . ' ORDER BY archivedate DESC ';

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
          $this->archivedate = $row['archivedate'];
          $this->custfirstname = $row['custfirstname'];
          $this->custlastname = $row['custlastname'];
          $this->phone = $row['phone'];
          $this->email = $row['email'];
          $this->address = $row['address'];
          $this->requestdate = $row['requestdate'];
          $this->requestcomplete = $row['requestcomplete'];
          $this->service = $row['service'];
          $this->charge = $row['charge'];

    }
    

    // Create User
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . 
          ' SET custfirstname = :custfirstname, 
                custlastname = :custlastname, 
                phone = :phone,
                email = :email,
                address = :address, 
                requestdate = :requestdate , 
                requestcomplete = :requestcomplete, 
                service = :service, 
                charge = :charge ';


          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
 
          $this->service = htmlspecialchars(strip_tags($this->service));
          $this->address = htmlspecialchars(strip_tags($this->address));
          $this->custfirstname = htmlspecialchars(strip_tags($this->custfirstname));
          $this->custlastname = htmlspecialchars(strip_tags($this->custlastname));
          // Bind data
          $stmt->bindParam(':custfirstname', $this->custfirstname);
          $stmt->bindParam(':custlastname', $this->custlastname);
          $stmt->bindParam(':phone', $this->phone);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':address', $this->address);
          $stmt->bindParam(':requestdate', $this->requestdate);
          $stmt->bindParam(':requestcomplete', $this->requestcomplet);
          $stmt->bindParam(':service', $this->service);
          $stmt->bindParam(':charge', $this->charge);



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
          ' SET custfirstname = :custfirstname, 
               custlastname = :custlastname, 
               phone = :phone,
               email = :email,
               address = :address, 
               requestdate = :requestdate , 
               requestcomplete = :requestcomplete, 
               service = :service, 
               charge = :charge 
            WHERE id = :id';
   

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data

 
        $this->service = htmlspecialchars(strip_tags($this->service));
        $this->address = htmlspecialchars(strip_tags($this->address));
        $this->custfirstname = htmlspecialchars(strip_tags($this->custfirstname));
        $this->custlastname = htmlspecialchars(strip_tags($this->custlastname));
        // Bind data
        $stmt->bindParam(':id', $this->id);
        $stmt->bindParam(':custfirstname', $this->custfirstname);
        $stmt->bindParam(':custlastname', $this->custlastname);
        $stmt->bindParam(':phone', $this->phone);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':address', $this->address);
        $stmt->bindParam(':requestdate', $this->requestdate);
        $stmt->bindParam(':requestcomplete', $this->requestcomplete);
        $stmt->bindParam(':service', $this->service);
        $stmt->bindParam(':charge', $this->charge);

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