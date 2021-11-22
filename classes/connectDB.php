<?php
  define("SERVERNAME", "localhost");
  define("USERNAME", "GeorgeUser");
  define("PASSWORD", "George123");
  define("DBNAME", "GeorgeMboUtrecht");
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

  function sanitize($raw_data) 
    {
    global $conn;
    $data = htmlspecialchars($raw_data);
    $data = mysqli_real_escape_string($conn, $data);
    $data = trim($data);
    return $data;
    }

  //Dit is mijn local database |Turan Suslu//////
  //   define("SERVERNAME", "localhost");
  // define("USERNAME", "GeorgeUser");
  // define("PASSWORD", "George123");
  // define("DBNAME", "georgemboutrecht");

  // $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
  ///////////////////////////////////////////////

  //Dit is mijn local database |Joran van Erk//////
  //   define("SERVERNAME", "localhost");
  // define("USERNAME", "GeorgeUser");
  // define("PASSWORD", "George123");
  // define("DBNAME", "georgemboutrecht");
  // $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
  ///////////////////////////////////////////////

  // class connectDB {
  //   //Declare variables used within this class
  //   public $conn;
  //   public $servername;
  //   public $username;
  //   public $password;
  //   public $databasename;

  //   //Connect with the database
  //   public function connectDB() {
  //   //Define database login details
  //   $servername = define("SERVERNAME", "localhost");
  //   $username = define("USERNAME", "root");
  //   $password = define("PASSWORD", "");
  //   $databasename = define("DATABASENAME", "georgemboutrecht");

  //   //Send connect request to SQL Database
  //   $this->conn = mysqli_connect($servername, $username, $password, $databasename);
  //   }
  // }
?>