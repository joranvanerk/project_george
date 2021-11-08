<?php
// General class used to create and retrieve data of a user.
class userData {
  public $name;
  public $lastname;
  public $email;
  public $cemail;
  public $role;
  public $email_part1;
  public $email_part2;
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

    return $this->role;
  }
}

// Class with functions specific for the registering process
class userRegister extends userData {
  //Declare extra variables required specific for registering an user.
  public $newsletter;
  public $generalterms;
  public $salt;
  public $temp_password;
  public $hashed_password;

  public $number;
  public $pw;
  public $confirmpw;
  public $address;
  public $zip;
  public $region;
  public $teacher;
  public $lessonpackage;
  public $abbrev;

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

  //Break down name and lastname string to create an abbreviation
  public function createAbbrev() {
    $this->abbrev =  substr($this->name, 0, 1);
    $this->abbrev .= substr($this->name, -1, 1);
    $this->abbrev .= substr($this->lastname, 0, 1);
    $this->abbrev .= substr($this->lastname, -1, 1);
    $this->abbrev = strtoupper($this->abbrev);

    return $this->abbrev;
  }

  //Add user into table based on userrole
  public function insertUser() {
    global $conn;

    $exp = explode("@", $this->email);
    $this->email_part1 = $exp[0];
    $this->email_part2 = $exp[1];

    $this->createAbbrev();

    if ($this->role === "student") {
      //Student
      $insertUserSql = "INSERT INTO `student` (`studentnr`,
                                                `voornaam`,
                                                `tussenvoegsel`,
                                                `achternaam`,
                                                `mobiel`,
                                                `email`,
                                                `woonplaats`,
                                                `straat`,
                                                `postcode`,
                                                `rol`,
                                                `docent`,
                                                `lespakket`)
                          VALUES                ('$this->email_part1',
                                                '$this->name',
                                                NULL,
                                                '$this->lastname',
                                                '$this->number',
                                                '$this->email',
                                                '$this->region',
                                                '$this->address',
                                                '$this->zip',
                                                '$this->role',
                                                '$this->teacher',
                                                '$this->lessonpackage')";
    } else if ($this->role === "klant") {
      //Klant
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
                                      '$this->role',
                                      CURRENT_TIMESTAMP,
                                      CURRENT_TIMESTAMP,
                                      1)";
    } else {
      //Begeleider/Docent/Eigenaar
      $insertUserSql = "INSERT INTO `medewerker` (`email`,
                                                  `achternaam`,
                                                  `tussenvoegsel`,
                                                  `voornaam`,
                                                  `mobiel`,
                                                  `afkorting`)
                          VALUES                ('$this->email',
                                                  '$this->lastname',
                                                  NULL,
                                                  '$this->name',
                                                  '$this->number',
                                                  '$this->abbrev')";
    }

    $query = mysqli_query($conn, $insertUserSql);
    $this->result = $query;
    var_dump($insertUserSql, $this->result);

    return $this->result;
  }
}

class studentEditDetails extends userRegister {
  protected $password;

  public function __construct($email, $name, $number, $region, $address, $zip, $password) 
  {
    $this->email = $email;
    $this->name = $name;
    $this->number = $number;
    $this->region = $region;
    $this->address = $address;
    $this->zip = $zip;
    $this->password = $password;

    $this->edit_details();
  }

  public function edit_details() 
  {
    $q = selectQuery("password", "email", $email);
    //Email exists in database
    if ($this->result === 1) {
      $data = mysqli_fetch_assoc($q);
      $this->salt = $data["salt"];
      $this->hashed_password = $data["passwd"];
      //Password matches with database password
      if (password_verify($this->password.$this->salt, $this->hashed_password)) {
        //change query
      }
    }
  }

  public function insert_editdetails()
  {
    $sql = "INSERT INTO";
  }
}

class studentEditPassword extends userRegister {

}

class studentEditPackage extends userRegister {

}
?>