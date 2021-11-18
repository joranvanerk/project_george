<?php
  //DB connection
  include("./classes/connectDB.php");
  //Test information
  session_start();
    $_SESSION["email"] = "327068@student.mboutrecht.nl";
    $_SESSION["logged_in"] = true;
    $_SESSION["userrole"] = "student";
    $_SESSION["voornaam"] = "Steven";
    $_SESSION["achternaam"] = "Li";
    setcookie("email", "327068@student.mboutrecht.nl", time()+3600);  /* expire in 1 hour */
    setcookie("logged_in", true, time()+3600);  /* expire in 1 hour */
    setcookie("userrole", "student", time()+3600);  /* expire in 1 hour */

  class is_logged_in 
  {
    public $userrole;
    public $valid_roles;

    public function __construct($xo) 
    {
      var_dump($xo);
      $this->get_roles();
      $this->userrole = $xo;
      $this->check_session($this->userrole);
    }

    //Checks for a session and determites if user is logged in.
    public function check_session() 
    {
      //Case if $_SESSION logged in variable is active
      if (isset($_SESSION)) 
      {
        if ($_SESSION["logged_in"] === true)
        {
          
        }
      } 
      //Case if $_COOKIE logged in variable is active
      else if (isset($_COOKIE)) 
      {
        if ($_COOKIE["logged_in"] === true)
        {
          $userrole = $_COOKIE["userrole"];
        }
      } 
      //Case if neither $_COOKIE nor $_SESSION is set.
      else 
      {
        return "User is not logged in using session nor cookie.";
      }
    }

    //Retrieves all roles from the database and adds it in $this->valid_roles
    public function get_roles()
    {
      global $conn;
      $sql = "SELECT `rol` FROM `rol`;";
      $result = mysqli_query($conn, $sql);

      $this->valid_roles = mysqli_fetch_all($result, MYSQLI_ASSOC);

      if ($this->userrole == $this->valid_roles) {
        echo "yes";
      } else {
        echo "no";
      }
      var_dump($this->userrole, $this->valid_roles);

    }

    public function has_access($userrole) 
    {
      
    }


  }
?>