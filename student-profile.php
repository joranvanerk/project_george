<?php 
// Include framework
include("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

// Include header
include("./includes/header.php"); ?>

<div class="container">
  <ul class="student-nav">
    <li><a href="student-profile">My Profile</a></li>
    <li><a href="student-profile#results">Results</a></li>
    <li><a href="student-profile#progress">Progress</a></li>
    <li><a href="student-profile#mail">Mail</a></li>
    <li><a href="student-profile#edit">Edit</a></li>
  </ul>
</div>

<?php include("./includes/footer.php"); ?>