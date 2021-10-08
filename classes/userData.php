<?php
class userData {
  public $name;
  public $email;
  public $cemail;
  public $table;
  public $column;
  public $userDetail;
  public $message;
  public $result;

  public $comparedinput;

  // Select query based on email.
  public function selectQuery($table, $column, $userDetail) {
    //Get DBconnection
    global $conn;

    //Create query and put result into $result
    $sql = "SELECT * FROM `".$table."` WHERE `".$column."` = '".$userDetail."'";
    $query = mysqli_query($conn, $sql);
    $this->result = mysqli_num_rows($query);

    return $this->result;
  }
}

class registerUser extends userData {
  //Declare extra variables required specific for registering an user.
  public $phonenumber;
  public $newsletter;
  public $generalterms;

  // Check if all data is filled in and does not match to any existing accounts.
  public function insertToPassword() {
    global $conn;
    $date = date("Y.m.d");

    $sql = "INSERT INTO `password` (`email`,
                                    `passwd`,
                                    `news`,
                                    `terms`,
                                    `createdAt`,
                                    `updatedAt`)
            VALUES                  ('$email',
                                    '',
                                    '$newsletter',
                                    '$generalterms',
                                    '$date',
                                    '$date')";

    $query = mysqli_query($conn, $sql);
    $this->result = $query;
    
    return $this->result;
  }
}
?>