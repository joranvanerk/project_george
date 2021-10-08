<?php
// Include connectDB and Functions
include("./classes/connectDB.php");
include_once("./classes/functions.php");
// Grabs all the values from the form and puts it in variables.
$name = sanitize($_POST["name"]);
$email = sanitize($_POST["email"]);
$cemail = sanitize($_POST["confirmemail"]);
$phonenumber = sanitize($_POST["phonenumber"]);
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
    $register->name = $name;
    $register->email = $email;
    $register->cemail = $cemail;
    $register->phonenumber = $phonenumber;
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

      } else {
        //Did not inject into PW database
        echo "insertIntoPassword Function did not work";
      }
    } else {
      //Emails do not match 
      echo "entered emails do not match";
    }
  } else {
    // user did not agree to general terms
    echo "you have to accept the general terms";
  }
} else {
  //Email exists in password table
  echo "email already exists";
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