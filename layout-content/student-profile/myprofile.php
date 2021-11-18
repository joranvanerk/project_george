<?php
include("./classes/userController.php");

$stud = new userData;
if (isset($_SESSION)) {
  $stud->selectQuery("student","email", $_SESSION["email"]);
} else if (isset($_COOKIE)) {
  $stud->selectQuery("student","email", $_COOKIE["email"]);
}


?>

<div class="container student-info">
  <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <div class="col-12">
      <h2>My Profile</h2>
      <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
    </div>
  </div>
  <div class="row row-info">
    <div class="col-sm-6 offset-sm-0 col-md-2 offset-md-1">
      <ul class="student-header">
          <li>Student no.:</li>
          <li>Name:</li>
          <li>E-mail:</li>
          <li>Phone number:</li>
          <li>Address:</li>
          <li>Role:</li>
          <li>Teacher:</li>
          <li>Lesson Package:</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-3">
        <ul class="student-info">
        <li><?php echo $stud->queryData["studentnr"]; ?></li>
        <li><?php echo $stud->queryData["voornaam"]. " " .$stud->queryData["achternaam"]; ?></li>
        <li><?php echo $stud->queryData["email"]; ?></li>
        <li><?php echo $stud->queryData["mobiel"]; ?></li>
        <li><?php echo $stud->queryData["straat"]; ?></li>
        <li><?php echo $stud->queryData["rol"]; ?></li>
        <li><?php echo $stud->queryData["docent"]; ?></li>
        <li><?php echo $stud->queryData["lespakket"]; ?></li>
      </ul>
      </div>
    <div class="col-6 vl mt-3 mb-3 mobielhide">
      <img src="./img/student-picture/default.png" class="img-fluid" alt="Student Image">
    </div>
  </div>
</div>

<div class="container student-options">
  <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <div class="col-6 mt-3 mb-3">
      <h1 class="student-text text-upper">Book a work night</h1>
      <a class="btn btn-outline-george btn-lg" href="#bookshift">Book a shift</a>
      <a class="btn btn-outline-george btn-lg" href="#signoff">Sign out of shift</a>
    </div>
    <div class="col-6 vl mt-3 mb-3">
      <h1 class="student-text text-upper">Quick Links</h1>
      <a class="btn btn-outline-george btn-lg" href="https://www.mboutrecht.nl">MBO Utrecht</a>
      <a class="btn btn-outline-george btn-lg" href="https://www.georgemarina.nl">George Marina</a>
    </div>
  </div>
</div>
