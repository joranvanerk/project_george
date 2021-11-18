<?php
  class logged_in 
  {
    public function __construct() 
    {
      if (isset($_SESSION) || isset($_COOKIE)) 
      {
        if ($_SESSION["logged_in"] == true || $_COOKIE["logged_in"] == true) 
        {
          
        }
      }
    }

    public function logged_in() 
    {

    }


  }
?>