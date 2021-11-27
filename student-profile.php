<?php 
//Checks for log-in and acts as a failsave
include("./classes/logged_in.php");
$is_logged_in = new is_logged_in();

// Include framework
include("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

// Include header
include("./includes/header.php"); ?>

<!-- Student navigation bar -->
<div class="container">
  <ul class="student-nav">
    <li><a href="student-profile?page=myprofile">My Profile</a></li>
    <li><a href="student-profile?page=results">Results</a></li>
    <li><a href="student-profile?page=progress">Progress</a></li>
    <li><a href="student-profile?page=mail">Mail</a></li>
    <li><a href="student-profile?page=edit">Edit</a></li>
  </ul>
</div>

<?php 
//Include page data based on second navbar
if(isset($_GET["page"])) {
  $page = $_GET["page"];
  switch($page) {
    case "myprofile":
      include("./layout-content/student-profile/myprofile.php");
      break;
    case "results":
      include("./layout-content/student-profile/results.php");
      break;
    case "progress":
      include("./layout-content/student-profile/progress.php");
      break;
    case "mail":
      include("./layout-content/student-profile/mail.php");
      break;
    case "edit":
      include("./layout-content/student-profile/edit.php");
      break;
    default:
      include("./layout-content/student-profile/myprofile.php");
      break;
  }
} else {
  //Default include without $_GET
  include("./layout-content/student-profile/myprofile.php");
}

include("./includes/footer.php"); 
?>