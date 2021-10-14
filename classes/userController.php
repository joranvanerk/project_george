<?php
class userData {
  public $name;
  public $lastname;
  public $email;
  public $cemail;
  public $role;
  public $table;
  public $column;
  public $userDetail;
  public $message;
  public $result;

  // Select query.
  public function selectQuery($table, $column, $userDetail) {
    //Get DBconnection
    global $conn;

    //Create query and put result into $result
    $sql = "SELECT * FROM `".$table."` WHERE `".$column."` = '".$userDetail."'";
    $query = mysqli_query($conn, $sql);
    $this->result = mysqli_num_rows($query);

    return $query;
  }

  public function selectRole() {
    $exp = explode("@", $this->email);
    
    if ($exp) {
    switch ($exp) {
      case $exp[0] === "georgemarina" && $exp[1] === "georgemarina.nl":
        $this->role = "eigenaar";
        break;
      case $exp[1] === "student.mboutrecht.nl":
        $this->role = "student";
        break;
      case $exp[1] === "georgemarina.nl":
        $this->role = "begeleider";
        break;
      case $exp[1] === "mboutrecht.nl":
        $this->role = "docent";
        break;
      case $exp:
        $this->role = "klant";
        break;
      }
    }
    var_dump($exp[0], $exp[1]);

    return $this->role;
  }
}

class userRegister extends userData {
  //Declare extra variables required specific for registering an user.
  public $newsletter;
  public $generalterms;
  public $salt;
  public $temp_password;
  public $hashed_password;

  public $number;
  public $name;
  public $pw;
  public $confirmpw;
  public $address;
  public $zip;

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
                                    CURRENT_TIMESTAMP,
                                    CURRENT_TIMESTAMP)";

    $query = mysqli_query($conn, $sql);
    $this->result = $query;

    return $this->result;
  }

  public function updatePassword() {
    global $conn;

    //Create new salt and hash the pw+salt
    $salt = $this->salt();
    $hashed_password = password_hash($this->pw.$salt, PASSWORD_BCRYPT);

    $sql = "UPDATE `password`
            SET `passwd` = '$hashed_password',
                `salt` = '$salt',
                `updatedAt` = CURRENT_TIMESTAMP
            WHERE `email` = '$this->email'";

    $query = mysqli_query($conn, $sql);
    $this->result = $query;

    return $this->result;
  }

  //Add user into table based on userrole
  public function insertUser($role) {
    global $conn;

    switch ($role) {
      case "klant":
        $insertUserSql = "INSERT INTO `klant` (`id`,
                                      `achternaam`,
                                      `tussenvoegsel`,
                                      `voornaam`,
                                      `email`,
                                      `mobiel`,
                                      `rol`,
                                      `createdAt`,
                                      `updatedAt`,
                                      `emailVerified`)
                VALUES                (NULL,
                                      '$this->lastname',
                                      NULL,
                                      '$this->name',
                                      '$this->email',
                                      '$this->number',
                                      '$role',
                                      CURRENT_TIMESTAMP,
                                      CURRENT_TIMESTAMP,
                                      1)";
        break;
      case "student":
        break;
      case "begeleider":
        break;
      case "docent":
        break;
    }
    echo $insertUserSql;
    $query = mysqli_query($conn, $insertUserSql);
    $this->result = $query;

    return $this->result;
  }
}
?>