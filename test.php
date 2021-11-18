<?php
//Test variables
  session_start();
  $_SESSION["email"] = "327068@student.mboutrecht.nl";
  $_SESSION["logged_in"] = true;
  $_SESSION["userrole"] = "student";
  setcookie("email", "327068@student.mboutrecht.nl", time()+3600);  /* expire in 1 hour */
  setcookie("logged_in", true, time()+3600);  /* expire in 1 hour */
  setcookie("userrole", "student", time()+3600);  /* expire in 1 hour */

//Checks for log-in and acts as a failsave
//Accessible roles: student, klant, eigenaar, docent, begeleider
include("./classes/logged_in.php");
$is_logged_in = new is_logged_in("student");

var_dump($_SESSION);
var_dump($_COOKIE);

?>