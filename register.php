<?php
// Start Registration
$name = $_POST["name"];
$email = $_POST["email"];
$cemail = $_POST["confirmemail"];
$phonenumber = $_POST["phonenumber"];
// Created booleans of the Newsletter and Generalterms questions
$newsletter = (isset($_POST["checkNewsletter"])) ? true : false;
$generalterms = (isset($_POST["checkGeneralterms"])) ? true : false;

// Include register function
include_once("./classes/registerAccount");
$user = new registerAccount();
$user->name = $name;
$user->email = $email;
$user->cemail = $cemail;
$user->phonenumber = $phonenumber;
$user->newsletter = $newsletter;
$user->generalterms = $generalterms;

if ($user) {
  //Check if all data is filled in and does not match to any existing accounts.
  $checkData = $user->registerControl();

  if ($checkData) {
    $registerUser = $user->registerToDB();

    if ($registerUser) {
      $registermail = $user->registerMail();

      header("Refresh:5 ; index.php");
    } else {
      // Error for unable to send e-mail
    }
  } else {
    // Error for not being able to register user in database
  }
} else {
  // Error for $checkdata registerControl()
}


?>