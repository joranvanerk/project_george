<?php
  require_once './classes/userController.php';
  require_once './classes/connectDB.php';
  require_once './classes/functions.php';

  //Registering functionality
  class userRegister extends userData 
  {
    //Declare variables
    protected $registerType = null;
    private $salt = null;
    private $temp_password = null;
    private $hashed_password = null;

    public $userdata = [];
    
    protected $number = null;
    private $pw = null;
    private $confirmpw = null;
    protected $abbrev = null;

    public function __construct()
    {
      //Check if POST is send, put it in $this->registerType
      $this->registerType = $this->checkPOST();
      //if POST is send, sanitize all fields and start register process
      if ($this->registerType != false) {
        $this->sanitizeFields();
        var_dump($this->registerType != false);
        var_dump($this->registerType);
        $this->register();
      }
    }

    //Check if $_POST is send
    protected function checkPOST() 
    {
      if (isset($_POST["register"])) {
        return "register";
      } else if (isset($_POST["finregister"])) {
        return "finregister";
      } else {
        return false;
      }
    }

    //Sanitize all $_POST fields
    protected function sanitizeFields()
    {
      switch ($this->registerType)
      {
        case "register":
          $email = sanitize($_POST["email"]);
          $cemail = sanitize($_POST["confirmemail"]);
          $newsletter = (isset($_POST["checkNewsletter"])) ? 1 : 0;
          $generalterms = (isset($_POST["checkGeneralterms"])) ? 1 : 0;

          array_push($this->userdata, $email, $cemail, $newsletter, $generalterms);

          return $this->userdata;
        break;
        case "finregister":
          $email = sanitize($_POST["email"]);
          $cemail = sanitize($_POST["cemail"]);
          $name = sanitize($_POST["name"]);
          $lastname = sanitize($_POST["lastname"]);
          $number = sanitize($_POST["phonenumber"]);
          $pw = sanitize($_POST["password"]);
          $cpw = sanitize($_POST["confirmpassword"]);

          array_push($this->userdata, $email, $cemail, $name, $lastname, $number, $pw, $cpw);

          if (isset($_POST["role"])) {
            if ($_POST["role"] === "student") {
              $address = sanitize($_POST["address"]);
              $zip = sanitize($_POST["zip"]);
              $region = sanitize($_POST["region"]);
              $teacher = sanitize($_POST["teacher"]);
              $lessonpackage = sanitize($_POST["lessonpackage"]);

              array_push($this->userdata, $address, $zip, $region, $teacher, $lessonpackage);
            }
          }
          return $this->userdata;
        break;
        default:
        false;
      }
    }

    //Complete register process
    protected function register()
    {
      switch ($this->registerType)
      {
        case "register":
          $this->selectQuery("password", "email", $this->userdata[0]);
          if ($this->result === 0 && $this->userdata[3] === 1) {
            if (strcmp($this->userdata[0], $this->userdata[1]) === 0) {
              $this->tempPassword();
              $this->insertIntoPassword();
              if ($this->result === true) {
                //Send e-mail
                $email = $this->userdata[0];
                include_once("./sendmail.php");
              } else {
                //Email did not send
                return false;
              }
            } else {
              //Input e-mails do not match
              return false;
            }
          } else {
            //not in database / general terms not accepted
            return false;
          }
          break;
        case "finregister":
          $this->selectQuery("password", "email", $this->userdata[0]);
          if ($this->result === 1) {
            if (strcmp($this->userdata[0], $this->userdata[1]) === 0) {
              if (strcmp($this->userdata[5], $this->userdata[6]) === 0) {
                if (password_verify("temp".$this->queryData["salt"], $this->queryData["passwd"])) {
                  $this->updatePassword();
                  if ($this->result === true) {
                    $this->email = $this->userdata[0];
                    $this->selectRole();
                    $this->insertUser();
                    //Meta refreshes based on 
                    if ($this->result === true) {
                      echo '<meta http-equiv="refresh" content="0; URL=./registered?email='.$this->userdata[0].'">';
                    } else {
                      // User was not created in the table
                      return false;
                    }
                  } else {
                    // Updating password failed
                    return false;
                  }
                } else {
                  //Password does not match with database
                  return false;
                }
              } else {
                // Password strings do not match
                return false;
              }
            } else {
              // Emails do not match
              return false;
            }
          } else {
            // Not in password database
            return false;
          }
          break;
        default:
        false;
      }
    }

    //Create a temp password
    protected function tempPassword() {
      //Create a random 10 letter string
      $this->salt = $this->salt();
      $this->temp_password = "temp";

      //Add salt to password and hash them
      $this->hashed_password = password_hash($this->temp_password.$this->salt, PASSWORD_BCRYPT);
    }

    // Check if all data is filled in and does not match to any existing accounts.
    protected function insertIntoPassword() {
      global $conn;

      $sql = "INSERT INTO `password` (`email`,
                                    `passwd`,
                                    `salt`,
                                    `news`,
                                    `terms`,
                                    `createdAt`,
                                    `updatedAt`)
              VALUES                  ('".$this->userdata[0]."',
                                    '".$this->hashed_password."',
                                    '".$this->salt."',
                                    '".$this->userdata[2]."',
                                    '".$this->userdata[3]."',
                                    CURRENT_TIMESTAMP,
                                    CURRENT_TIMESTAMP)";

      $query = mysqli_query($conn, $sql);
      $this->result = $query;

      return $this->result;
    }

    //Create a new salt and hashed password
    protected function updatePassword() {
      global $conn;

      //Create new salt and hash the pw+salt
      $salt = $this->salt();
      $hashed_password = password_hash($this->userdata[5].$salt, PASSWORD_BCRYPT);

      $sql = "UPDATE `password`
              SET `passwd` = '$hashed_password',
                  `salt` = '$salt',
                  `updatedAt` = CURRENT_TIMESTAMP
              WHERE `email` = '".$this->userdata[0]."'";

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
      $email_part1 = $exp[0];
      $email_part2 = $exp[1];

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
                            VALUES                ('".$email_part1."',
                                                  '".$this->userdata[2]."',
                                                  NULL,
                                                  '".$this->userdata[3]."',
                                                  '".$this->userdata[4]."',
                                                  '".$this->userdata[0]."',
                                                  '".$this->userdata[9]."',
                                                  '".$this->userdata[7]."',
                                                  '".$this->userdata[8]."',
                                                  '".$this->role."',
                                                  '".$this->userdata[10]."',
                                                  '".$this->userdata[11]."')";
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
                                        '".$this->userdata[3]."',
                                        NULL,
                                        '".$this->userdata[2]."',
                                        '".$this->userdata[0]."',
                                        '".$this->userdata[4]."',
                                        '".$this->role."',
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
                            VALUES                ('".$this->userdata[0]."',
                                                    '".$this->userdata[3]."',
                                                    NULL,
                                                    '".$this->userdata[2]."',
                                                    '".$this->userdata[4]."',
                                                    '".$this->abbrev."')";
      }

      $query = mysqli_query($conn, $insertUserSql);
      $this->result = $query;

      return $this->result;
    }
  }

?>