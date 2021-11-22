<?php
//Security has to be added so only student has access to these pages
//Session has to give me the logged in user
$_SESSION["email"] = "327068@student.mboutrecht.nl";

//Includes
if (!isset($conn)) {
  include("./classes/connectDB.php");
}
include("./classes/userController.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //Start studentEditDetails class and a header to student-profile
  if (isset($_POST["personaldetails"])) {
    new studentEditDetails(
      $_SESSION["email"], 
      $_POST["name"], 
      $_POST["phone"], 
      $_POST["region"], 
      $_POST["street"], 
      $_POST["zip"], 
      $_POST["password"]);
    header("Location: ./student-profile?page=myprofile");
    //Start studentEditPassword class and a header to student-profile
  } else if (isset($_POST["changepassword"])) {
    new studentEditPassword(
      $_SESSION["email"],
      $_POST["oldpassword"],
      $_POST["newpassword"],
      $_POST["confirmnewpassword"]);
    header("Location: ./student-profile?page=myprofile");
    //Start studentEditPackage class and a header to student-profile
  } else if (isset($_POST["changepackage"])) {
    new studentEditPackage(
      $_SESSION["email"], 
      $_POST["lessonpackage"], 
      $_POST["teacher"],
      $_POST["password"]);
    //header("Location: ./student-profile?page=myprofile");
  } else {
  echo "Error 404";
  }
} else {
echo "Error, user did not send a POST value.";
}
?>