<?php
//Security has to be added so only student has access to these pages
//Session has to give me the logged in user
$email = "327068@student.mboutrecht.nl";

//Include required classes for edit process
include_once("./classes/connectDB.php");
include_once("./classes/functions.php");
include_once("./classes/userController.php");

if (isset($_POST["personaldetails"])) {
$edit = new studentEditDetails(
        $email, 
        $_POST["name"], 
        $_POST["phone"], 
        $_POST["region"], 
        $_POST["street"], 
        $_POST["zip"], 
        $_POST["password"]);
} else if (isset($_POST["changepassword"])) {
echo "pw";
} else if (isset($_POST["changepackage"])) {
echo "packge";
} else {
  echo "Error 404";
}
?>