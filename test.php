<?php
//Test variables
  session_start();
  $_SESSION["email"] = "327068@student.mboutrecht.nl";
  setcookie("email", "327068@student.mboutrecht.nl", time()+3600);  /* expire in 1 hour */

  // Remove cookies and session
  // setcookie("email", "327068@student.mboutrecht.nl", time()-3600);  /* expire in 1 hour */

//Checks for log-in and acts as a failsave
//Accessible roles: student, klant, eigenaar, docent, begeleider
include("./classes/logged_in.php");
new logged_in("student");

var_dump($_SESSION);
var_dump($_COOKIE);

?>