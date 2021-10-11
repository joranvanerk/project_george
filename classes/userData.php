<?php
class userData {
  public $name;
  public $email;
  public $cemail;
  public $role;
  public $table;
  public $column;
  public $userDetail;
  public $message;
  public $result;

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

class userRegister extends userData {
  //Declare extra variables required specific for registering an user.
  public $phonenumber;
  public $newsletter;
  public $generalterms;
  public $salt;
  public $temp_password;
  public $hashed_password;

  //Create a random 10 letter string
  public function salt($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }

  //Create a salt and password
  public function createPassword() {
    //Create a random 10 letter string
    $this->salt = $this->salt();
    $this->temp_password = "temp";

    //Add salt to password and hash them
    $this->hashed_password = password_hash($this->temp_password.$this->salt, PASSWORD_BCRYPT);
  }

  // Check if all data is filled in and does not match to any existing accounts.
  public function insertIntoPassword() {
    global $conn;
    $date = date("Y.m.d");

    $sql = "INSERT INTO `password` (`email`,
                                    `passwd`,
                                    `salt`,
                                    `news`,
                                    `terms`,
                                    `createdAt`,
                                    `updatedAt`)
            VALUES                  ('$this->email',
                                    '$this->hashed_password',
                                    '$this->salt',
                                    '$this->newsletter',
                                    '$this->generalterms',
                                    '$date',
                                    '$date')";

    $query = mysqli_query($conn, $sql);
    $this->result = $query;

    return $this->result;
  }
}
?>