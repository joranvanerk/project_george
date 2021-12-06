<?php
  //Require connection to database.
  require_once './classes/connectDB.php';
  require_once './classes/userController.php';

  class sendMail extends userData {
    //Declare variables used within this class.
    private $sender = null;
    private $receiver = null;
    private $subject = null;
    private $text = null;

    //Execute following functions upon class call.
    public function __construct() {
      $this->sanitizeData();
      $this->createSQLI();
    }

    //Check if send $_POST details are set and/or filled in.
    private function sanitizeData() {
      if (isset($_POST["sendmail"])) {
        if (!empty($_POST["from"]) && !empty($_POST["to"]) && !empty($_POST["subject"]) && !empty($_POST["text"])) {
          $sender = sanitize($_POST["from"]);
          $id = explode("@", $_SESSION["email"]);
          $this->sender = intval($id[0]);
          $this->receiver = sanitize($_POST["to"]);
          $this->subject = sanitize($_POST["subject"]);
          $this->text = sanitize($_POST["text"]);
        }
      }
    }
    
    //Create and execute SQL.
    private function createSQLI() {
      global $conn;

      $salt = $this->salt();
      $sql = "INSERT INTO `mail` (`mailid`, 
                                  `onderwerp`, 
                                  `van`, 
                                  `naar`, 
                                  `createdAt`, 
                                  `updatedAt`, 
                                  `salt`, 
                                  `tekst`)
                          VALUES (NULL, 
                                  '". $this->subject ."', 
                                  '". $this->sender ."', 
                                  '". $this->receiver ."', 
                                  current_timestamp(), 
                                  current_timestamp(), 
                                  '". $salt ."', 
                                  '". $this->text ."');";
      
      $query = mysqli_query($conn, $sql);
      if ($query) {
        //echo "success";
      }
    }
  }
?>