<?php

class ContractInfo {
    // DB stuff
    private $conn;
    private $table = 'cartcontractinfo';

    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $cellphone;
    public $rentaladdr;
    public $saddlebrookearea;
    public $dateentered;
    public $dlnum;
    public $dlstate;
    public $dlexp;
    public $rentstart;
    public $rentend;
    public $cartnum;
    public $cartyear;
    public $cartcolor;

  

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
          $this->firstname = $row['firstname'];
          $this->lastname = $row['lastname'];
          $this->cellphone = $row['cellphone'];
          $this->email = $row['email'];
          $this->rentaladdr= $row['rentaladdr'];
          $this->rentstart = $row['rentstart'];
          $this->rentend = $row['rentend'];
          $this->saddlebrookearea = $row['saddlebrookearea']; 
          $this->dlnum = $row['dlnum']; 
          $this->dlstate = $row['dlstate'];
          $this->dlexp = $row['dlexp'] ;
          $this->dateentered = $row['dateentered'] ;

    }
    

    // Create User
    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . 
          ' SET firstname = :firstname, 
                lastname = :lastname, 
                cellphone = :cellphone,
                email = :email,
                rentaladdr = :rentaladdr, 
                rentstart = :rentstart , 
                rentend = :rentend, 
                saddlebrookearea = :saddlebrookearea, 
                dlstate = :dlstate, 
                dlexp = :dlexp, 
                dlnum = :dlnum ';


          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
 
          $this->email = htmlspecialchars(strip_tags($this->email));
          $this->rentaladdr = htmlspecialchars(strip_tags($this->rentaladdr));
          $this->firstname = htmlspecialchars(strip_tags($this->firstname));
          $this->lastname = htmlspecialchars(strip_tags($this->lastname));
          // Bind data
          $stmt->bindParam(':firstname', $this->firstname);
          $stmt->bindParam(':lastname', $this->lastname);
          $stmt->bindParam(':cellphone', $this->cellphone);
          $stmt->bindParam(':email', $this->email);
          $stmt->bindParam(':rentaladdr', $this->rentaladdr);
          $stmt->bindParam(':rentstart', $this->rentstart);
          $stmt->bindParam(':rentend', $this->rentend);
          $stmt->bindParam(':dlnum', $this->dlnum);
          $stmt->bindParam(':dlstate', $this->dlstate);
          $stmt->bindParam(':dlexp', $this->dlexp);


          // Execute query
          if ($stmt->execute()) {

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