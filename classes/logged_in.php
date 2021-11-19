<?php
  //Purpose of this page: Userrole gets checked for correct roles
  //1. On the page, the class is_logged_in gets called with the required variable (4 allowed roles)
  //2. Variable gets checked on validity (Does it match with the roles available in database?)
  //3. User gets send away if he does not have the right role

  //DB connection
  if (!isset($conn)) {
    include("./classes/connectDB.php");
  }
  //Test information

  class is_logged_in 
  {
    public $valid_roles = [];

    public function __construct() 
    {
      //Retrieve userroles from database
      $this->get_roles();
      //Check if session or cookie varable is set.
      //If set, check if ["userrole"] variable is available in the array.
      //If no variables are set, user will be denied from the page and sent towards homepage.
      $this->check_session();
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
          if (in_array($_SESSION["userrole"], $this->valid_roles)) {
            echo "<br>it's in! Session ftw";
          } else {
            echo "<br>You do not have the correct userrole to visit this page.";
            header("Refresh:5; url=index.php");
          }
        } else {
          echo "<br>You're not logged in.";
          header("Refresh:5; url=login.php");
        }
      } 
      //Case if $_COOKIE logged in variable is active
      else if (isset($_COOKIE)) {
        if ($_COOKIE["logged_in"] === '1') {
          if (in_array($_COOKIE["userrole"], $this->valid_roles)) {
            echo "<br>it's in! Cookies ftw";
          } else {
            echo "<br>You do not have the correct userrole to visit this page.";
            header("Refresh:5; url=index.php");
          }
        } else {
          echo "<br>You're not logged in.";
          header("Refresh:5; url=login.php");
        }
      } 
      //Case if neither $_COOKIE nor $_SESSION is set.
      else 
      { 
        echo "You're not logged in.";
        header("Refresh:5; url=index.php");
      }
    }
  }
?>