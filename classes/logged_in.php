<?php
  class logged_in 
  {
    public $userrole;

    public function __construct() 
    {
      $this->check_session();
    }

    //Checks for a session and determites if user is logged in.
    public function check_session() 
    {
      //Case if $_SESSION logged in variable is active
      if (isset($_SESSION)) 
      {
        if ($_SESSION["logged_in"] === true)
        {
          $userrole = $_SESSION["userrole"];
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
      else 
      {
        return "User is not logged in using session nor cookie.";
      }

      if (isset($_SESSION) || isset($_COOKIE)) 
      {
        if ($_SESSION["logged_in"] == true || $_COOKIE["logged_in"] == true) 
        {
          
        }
      }
    }

    public function has_access($userrole) 
    {
      
    }


  }
?>