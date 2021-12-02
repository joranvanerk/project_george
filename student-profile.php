<?php 
// Include framework
include_once("./includes/framework.php");

//Checks if current user is allowed to visit this page
//Accessible roles: student, klant, eigenaar, docent, begeleider
include_once("./classes/logged_in.php");
new logged_in("student");

// basefile management system for header
$active_page_filename = basename(__FILE__);

// Include header
include_once("./includes/header.php"); ?>

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
      include_once("./layout-content/student-profile/myprofile.php");
      break;
    case "results":
      include_once("./layout-content/student-profile/results.php");
      break;
    case "progress":
      include_once("./layout-content/student-profile/progress.php");
      break;
    case "mail":
      include_once("./layout-content/student-profile/mail.php");
      break;
    case "edit":
      include_once("./layout-content/student-profile/edit.php");
      break;
    default:
      include_once("./layout-content/student-profile/myprofile.php");
      break;
  }
} else {
  //Default include without $_GET
  include_once("./layout-content/student-profile/myprofile.php");
}

include_once("./includes/footer.php"); 
?>