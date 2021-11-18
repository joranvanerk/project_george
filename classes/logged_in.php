<?php
  //Purpose of this page: Userrole gets checked for correct roles
  //1. On the page, the class is_logged_in gets called with the required variable (4 allowed roles)
  //2. Variable gets checked on validity (Does it match with the roles available in database?)
  //3. User gets send away if he does not have the right role

  //DB connection
  include("./classes/connectDB.php");
  //Test information

  class is_logged_in 
  {
    public $required_userrole;
    public $valid_roles = [];

    public function __construct($required_userrole) 
    {
      //Declare required userrole in $role and available roles
      $this->required_userrole = $required_userrole;
      $this->get_roles();
      //Check if session or cookie variables are set
      if ($this->check_session()) {
        echo "session valid";
        $this->check_roles();
      } else {
        echo "session invalid";
      }

      if (in_array($this->required_userrole, $this->valid_roles)) {
        echo "<br>it's in!";
      } else {
        echo "<br>it's not in :(";
      }

      //var_dump($this->required_userrole);
      //var_dump($this->valid_roles[0]);
    }

    //Retrieves all roles from the database and adds it in $this->valid_roles
    public function get_roles()
    {
      global $conn;

      $sql = "SELECT `rol` FROM `rol`;";
      $result = mysqli_query($conn, $sql);

      $temp_arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

      foreach ($temp_arr as $role) 
      { 
        array_push($this->valid_roles, $role["rol"]); 
      }
    }

    //Checks for a session and determites if variable logged_in is true/active.
    public function check_session() 
    {
      //Case if $_SESSION logged in variable is active
      if (isset($_SESSION)) {
        if ($_SESSION["logged_in"] === true) {
          return true;
        }
      } 
      //Case if $_COOKIE logged in variable is active
      else if (isset($_COOKIE)) {
        if ($_COOKIE["logged_in"] === '1') {
          return true;
        }
      } 
      //Case if neither $_COOKIE nor $_SESSION is set.
      else { return false; }
    }

    public function check_roles()
    {

    }

    public function has_access($userrole) 
    {
      
    }

  }
?>