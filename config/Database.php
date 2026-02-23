<?php
  class Database {
    // DB Params
    private $host;
    private $db_name;
    private $username;
    private $password ;
    private $conn;
    private $url;

    public function __construct() {
 
       if ($_SERVER['SERVER_NAME'] === 'localhost') {         
           $this->host = "localhost";
           $this->username = "root";
           $this->password = "2021Idiot";
           $this->db_name = "mywebsite"; 
           } 
      if ($_SERVER['SERVER_NAME'] !== 'localhost') {
     
  
        if (($_SERVER['SERVER_NAME'] === "www.sbgolfcartrentals.com/")
            || ($_SERVER['SERVER_NAME'] === "sbgolfcartrentals.com/") ) {
         
          $this->host = "localhost";
          $this->username = "sbballro_appuser";
          $this->password = "$2021Idiot";
          $this->db_name = "sbballro_tAdnRpvOXZgHQi";

        } 
    
  }
   if ($_SERVER['SERVER_NAME'] !== 'localhost') {
     
  
        if (($_SERVER['SERVER_NAME'] === "www.sbgolfcartrentals.com")
            || ($_SERVER['SERVER_NAME'] === "sbgolfcartrentals.com") ) {
         
          $this->host = "localhost";
          $this->username = "sbballro_appuser";
          $this->password = "$2021Idiot";
          $this->db_name = "sbballro_tAdnRpvOXZgHQi";

        } 
    } 
  }
  
    // DB Connect
    public function connect() {
      
      $this->conn = null;
       
        try { 
            $this->conn = new PDO('mysql:host=' . $this->host .
            ';dbname=' . $this->db_name, $this->username, $this->password);

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch(PDOException $e) {
            echo 'Connection Error: ' . $e->getMessage();
        }

        return $this->conn;
        }
  }