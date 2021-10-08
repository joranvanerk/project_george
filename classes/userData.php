<?php
class userData {
  public $name;
  public $email;
  public $cemail;
  public $table;
  public $column;
  public $userDetail;
  public $message;

  // Select query based on email.
  public function selectQuery($table, $column, $userDetail) {
    $sql = "SELECT * FROM `".$table."` WHERE `".$column."` = '".$userDetail."'";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($query);
    return $result;
  }

  // Check if all data is filled in and does not match to any existing accounts.
  public function registerControl() {

  }

  // Create a SQL insert for registering the new user to the database.
  public function registerToDB() {

  }

  //Creates a generic register e-mail and sends it to the user for verification purposes.
  public function sendRegisterMail() {

  }
}

class registerUser extends userData {
  //Declare extra variables required specific for registering an user.
  public $phonenumber;
  public $newsletter;
  public $generalterms;
}
?>