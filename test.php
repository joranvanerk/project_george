<?php
  // Remove cookies and session
  // setcookie("email", "327068@student.mboutrecht.nl", time()-3600);  /* expire in 1 hour */

//Checks if current user is allowed to visit this page
//Accessible roles: student, klant, eigenaar, docent, begeleider
// include("./classes/logged_in.php");
// new logged_in("student");

// var_dump($_SESSION);
// var_dump($_COOKIE);

include("./includes/framework.php");
$active_page_filename = basename(__FILE__);
//Test variables
$_SESSION["email"] = "327068@student.mboutrecht.nl";
setcookie("email", "327068@student.mboutrecht.nl", time()+36000);  /* expire in 1 hour */

include("./includes/header.php");
?>

<h1 style="height: 80vh;">Test page</h1>

<?php
include("./includes/footer.php");
?>