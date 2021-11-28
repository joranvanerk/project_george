<?php
  include("./classes/userController.php");
  //Purpose of this page: Userrole gets checked for correct roles
  //1. On the page, the class is_logged_in gets called with the required variable (4 allowed roles)
  //2. Variable gets checked on validity (Does it match with the roles available in database?)
  //3. User gets send away if he does not have the right role

  //DB connection
  if (!isset($conn)) {
    include("./classes/connectDB.php");
  }

  class logged_in extends userData
  {
    public $valid_roles = [];
    public $required_role;

    public function __construct($required_role) 
    {
      $this->required_role = $required_role;
      //Get current user's e-mail based on session or cookie
      $this->get_session_email();
      //Get current user's userrole based on e-mail
      $this->selectRole();
      //Retrieve all available userroles from database in an array
      $this->get_database_roles();
      //Check if session or cookie varable is set.
      //If set, check if ["userrole"] variable is available in the array.
      //If no variables are set, user will be denied from the page and sent towards homepage.
      $this->check_login();
    }

    //Get user userrole based on set $_SESSION or $_COOKIE email variable.
    public function get_session_email()
    {
      if (isset($_SESSION["email"])) {
        $this->email = $_SESSION["email"];
      } else if (isset($_COOKIE["email"])) {
        $this->email = $_COOKIE["email"];
        $_SESSION["email"] = $_COOKIE["email"];
      } else {
        echo '<meta http-equiv="refresh" content="0; URL=./error404">';
      }

      return $this->email;
    }

    //Retrieves all roles from the database and adds it in $this->valid_roles
    public function get_database_roles()
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

    //Check if the e-mail userrole matches with the required userrole to visit this page.
    public function check_login() 
    {
      //var_dump($this->role, $this->required_role);
      if (strcmp($this->role, $this->required_role) === 0) {
        //echo "role and required_role match";
      } else {
        //echo "role and required_role DO NOT match";
        echo '<meta http-equiv="refresh" content="0; URL=./error404">';
      }
    }
  }
?>