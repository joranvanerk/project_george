<?php
  class connectDB {
    //Declare variables used within this class
    public $conn;
    public $servername;
    public $username;
    public $password;
    public $databasename;

    //Connect with the database
    public function connectDB() {
      
    // Inloggen op database en database selecteren
    define("SERVERNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASENAME", "georgemboutrecht");

    // Contact maken met MySQL-Server
    $this->conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASENAME);

    }
    public function sanitize($raw_data)
    {
      // search for $conn outside of the function
      global $conn;
      // Removes special characters from string
      $data = mysqli_real_escape_string($conn, $raw_data);
      // Converts special characters to HTMl entities
      $data = htmlspecialchars($data);
      // returns variable $data
      return $data;
    }
  }
  
  
?>