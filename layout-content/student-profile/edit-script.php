<?php
//Includes
if (!isset($conn)) {
  include("./classes/connectDB.php");
}
include("./classes/userController.php");

//Security has to be added so only student has access to these pages
//Session has to give me the logged in user

if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
  } else if (isset($_POST["changepassword"])) {
    new studentEditPassword(
            $_SESSION["email"],
            $_POST["oldpassword"],
            $_POST["newpassword"],
            $_POST["confirmnewpassword"]);
  } else if (isset($_POST["changepackage"])) {
    new studentEditPackage(
            $_SESSION["email"], 
            $_POST["lessonpackage"], 
            $_POST["teacher"]);
  } else {
  echo "Error 404";
  }
} else {
echo "Error, user did not send a POST value.";
}


?>