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

<div class="container student-info">
  <div class="row">
    <div class="col-2">
      <ul>
        <li>Studentnr:</li>
        <li>Name:</li>
        <li>E-mail:</li>
        <li>Phone number:</li>
        <li>Address:</li>
        <li>Role:</li>
        <li>Teacher:</li>
        <li>Lesson Package:</li>
      </ul>
    </div>
    <div class="col-8">
      <ul>
        <li>327068</li>
        <li>Steven Li</li>
        <li>327068@student.mboutrecht.nl</li>
        <li>06123568</li>
        <li>Teststraat 73</li>
        <li>Student</li>
        <li>HSOK</li>
        <li>Chef</li>
      </ul>
    </div>
    <div class="col-2">
      Profile picture
    </div>
  </div>
</div>

<?php include("./includes/footer.php"); ?>