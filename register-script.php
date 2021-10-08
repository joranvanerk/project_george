<?php
// Include connectDB and Functions
include("./classes/connectDB.php");
include_once("./classes/functions.php");
// Grabs all the values from the form and puts it in variables.
$name = sanitize($_POST["name"]);
$email = sanitize($_POST["email"]);
$cemail = sanitize($_POST["confirmemail"]);
$phonenumber = sanitize($_POST["phonenumber"]);
$newsletter = (isset($_POST["checkNewsletter"])) ? true : false;
$generalterms = (isset($_POST["checkGeneralterms"])) ? true : false;

// Include register function and creates a new register user.
include_once("./classes/userData.php");
$user = new registerUser;
$user->name = $name;
$user->email = $email;
$user->cemail = $cemail;
$user->phonenumber = $phonenumber;
$user->newsletter = $newsletter;
$user->generalterms = $generalterms;




exit();

// // Start register process
// if ($user) {
//   //Check if all data is filled in and does not match to any existing accounts. If not successfull, return an error message.
//   $checkData = $user->registerControl();

//   if ($checkData) {
//     //Add User to Database. If not successfull, return an error message regarding database fail.
//     $registerUser = $user->registerToDB();

//     if ($registerUser) {
//       //Send e-mail for verification of the register process. If not successfull, return error message unable to send verify e-mail.
//       $registermail = $user->registerMail();

//       //If successfull, automatically log in the user and save his details.
//       session_start();ob_start();
//       $_SESSION["login"] === true;
//       $_SESSION["name"] = $user->name;
//       $_SESSION["email"] = $user->email;
//     } else {
//       // Error for unable to send e-mail
//     }
//   } else {
//     // Error for not being able to register user in database
//   }
// } else {
//   // Error for $checkdata registerControl()
// }
?>