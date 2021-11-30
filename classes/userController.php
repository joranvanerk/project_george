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
  public $query;
  public $queryData;

  

  // Select query.
  public function selectQuery($table, $column, $userDetail) {
    //Get DBconnection
    global $conn;

    //Create query and put result into $result
    $sql = "SELECT * FROM `".$table."` WHERE `".$column."` = '".$userDetail."'";
    $this->query = mysqli_query($conn, $sql);
    $this->result = mysqli_num_rows($this->query);
    $this->queryData = mysqli_fetch_assoc($this->query);

    return $this->query;
  }

  //Get session e-mail and put it in $this->email
  public function getSessionEmail() 
  {
    if (isset($_SESSION["email"]))
    {
      $this->email = $_SESSION["email"];
    } 
    else if (isset($_COOKIE["email"]))
    {
      $this->email = $_COOKIE["email"];
    } else {
      return false;
    }
  }

  //switch case statement determing roles.
  public function selectRole() 
  {
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
      default:
        $this->role = "klant";
      }
    }

    return $this->role;
  }

  //Create a random 10 letter string (salt)
  public function salt($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
  }
}

// Class with functions specific for editing personal student information
class studentEditDetails extends userData {
  public function __construct($email, $name, $number, $region, $address, $zip, $password) 
  {
    $expname = explode(" ", $name);
    $this->name = $expname[0];
    $this->lastname = $expname[1];
    $studentnr = explode("@", $email);
    $id = intval($studentnr[0]);
    $this->edit_details($email, $number, $region, $address, $zip, $id, $password);
  }

  public function edit_details($email, $number, $region, $address, $zip, $id, $password) 
  {
    $this->selectQuery("password", "email", $email);
    //Email exists in database
    if ($this->result === 1) {
      //Password matches with database password
      if (password_verify($password.$this->queryData["salt"], $this->queryData["passwd"])) {
        //change query
        global $conn;

        $sql = "UPDATE `student` 
              SET `voornaam` = '$this->name', 
                  `achternaam` = '$this->lastname', 
                  `mobiel` = '$number', 
                  `woonplaats` = '$region', 
                  `straat` = '$address', 
                  `postcode` = '$zip' 
              WHERE `student`.`studentnr` = $id;";

        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "Personal details have been successfully edited";
        }

      }
    }
  }

}

// Class with functions specific for changing password
class studentEditPassword extends userData {
  public function __construct($email, $oldpassword, $newpassword, $confirmnewpassword) 
  {
    $this->edit_password($email, $oldpassword, $newpassword, $confirmnewpassword);
  }

  public function edit_password($email, $oldpassword, $newpassword, $confirmnewpassword) 
  {
    $this->selectQuery("password", "email", $email);
    //Email exists in database
    if ($this->result === 1) {
      //Password matches with database password
      if (password_verify($oldpassword.$this->queryData["salt"], $this->queryData["passwd"])) {
        //newpassword and confirm new password are identical strings
        if (strcmp($newpassword, $confirmnewpassword) === 0) {
          
          //change password query
          global $conn;

          $salt = $this->salt();
          $blowfish = password_hash($newpassword.$salt, PASSWORD_BCRYPT);

          $sql = "UPDATE `password`
                  SET `passwd` = '$blowfish',
                      `salt` = '$salt',
                      `updatedAt` = CURRENT_TIMESTAMP
                  WHERE `email` = '$email'";

          $result = mysqli_query($conn, $sql);

          if ($result) {
            echo "Password has been successfully edited";
          }
        } else {
          echo "Passwords do not match";
        }
      } else {
        echo "Password could not be verified";
      }
    } else {
      echo "email does not exist in database";
    }
  }

}

//Class with functions specific for editing lessonpackage and teacher information
class studentEditPackage extends userData {
  public function __construct($email, $lessonpackage, $teacher, $password) 
  {
    $this->edit_package($email, $lessonpackage, $teacher, $password);
  }

  public function edit_package($email, $lessonpackage, $teacher, $password) 
  {
    $studentnr = explode("@", $email);
    $id = intval($studentnr[0]);

    $this->selectQuery("password", "email", $email);
    //Email exists in database
    if ($this->result === 1) {
      //Password matches with database password
      if (password_verify($password.$this->queryData["salt"], $this->queryData["passwd"])) {
        //edit lessonpackage info
        global $conn;

        $sql = "UPDATE `student` 
              SET `docent` = '$teacher', 
                  `lespakket` = '$lessonpackage' 
              WHERE `student`.`studentnr` = $id;";

        $result = mysqli_query($conn, $sql);

        if ($result) {
          echo "Lessonpackage and teacher details have been successfully edited";
        }

      } else {
        echo "Password could not be verified";
      }
    } else {
      echo "email does not exist in database";
    }
  }

}

//Create select data for a form
class createSelectData extends userData {
  public $html;

  //Create table with database available data
  public function __construct($table, $column, $name) {
    $data = $this->get_column_data($table, $column);
    $this->create_select($data, $column, $name);
  }

  public function get_column_data($table, $column) {
    global $conn;

    $sql = "SELECT `$column` FROM `$table`;";
    $result = mysqli_query($conn, $sql);

    $temp_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $temp_arr;
  }

  //Create select with array data
  public function create_select($data, $column, $name) {

    $this->html = '<div class="form-floating mb-3">';
    $this->html .= '<select name="'. $name .'" class="form-control">';
    foreach ($data as $d) {
      $this->html .= '<option value='. $d["$column"] .'>'. $d["$column"] .'</option>';
    }
    $this->html .= '</select>';
    $this->html .= '<label for="floatingInput">'. $name .'</label>';
    $this->html .= '</div>';
  }

  public function show() {
    echo $this->html;
  }
}
?>