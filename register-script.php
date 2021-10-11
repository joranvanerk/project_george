<?php
// Include connectDB and Functions
include("./classes/connectDB.php");
include_once("./classes/functions.php");
// Grabs all the values from the form and puts it in variables.
$email = sanitize($_POST["email"]);
$cemail = sanitize($_POST["confirmemail"]);
$role = sanitize($_POST["roleSelect"]);
$newsletter = (isset($_POST["checkNewsletter"])) ? 1 : 0;
$generalterms = (isset($_POST["checkGeneralterms"])) ? 1 : 0;

// Include register function and creates a new register user.
include_once("./classes/userData.php");
$register = new userRegister;
$checkEmail = $register->selectQuery("password", "email", $email);

//Email does not exist in password table
if ($checkEmail === 0) {
  //General terms has been accepted
  if ($generalterms === 1) {
      //Fill new object with POST details
    $register->email = $email;
    $register->cemail = $cemail;
    $register->role = $role;
    $register->newsletter = $newsletter;
    $register->generalterms = $generalterms;

    //Check if email and confirm email is same string or not
    if (strcmp($register->email, $register->cemail) === 0) {
      //Create a hashed password and insert into password table.
      $createPW = $register->createPassword();
      $insertToPW = $register->insertIntoPassword();
      //Inserted details into password table.
      if ($insertToPW === true) {
        //Send register mail
        include_once("./sendmail.php");
        $registerprocess = true;

        if ($registerprocess === true) {
          include_once("./classes/sendMessage.php");
          $msg = new messageSuccess;
          $msg->generate_msg("You have successfully registered!");
        } else {
          //Finish registering email did not send
          include_once("./classes/sendMessage.php");
          $msg = new messageError;
          $msg->generate_msg("Register email was not send.");
        }

      } else {
        //Did not inject into PW database
        $registerprocess = false;
        $msg = new messageError;
        $msg->generate_msg("We've failed to register your details. (PW)");
      }
    } else {
      //Emails do not match 
      $registerprocess = false;
      $msg = new messageError;
      $msg->generate_msg("Your entered emails do not match.");
    }
  } else {
    // user did not agree to general terms
    $registerprocess = false;
    $msg = new messageError;
    $msg->generate_msg("Accepting the General Terms is required.");
  }
} else {
  //Email exists in password table
  $registerprocess = false;
  $msg = new messageError;
  $msg->generate_msg("Email is already taken.");
}

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