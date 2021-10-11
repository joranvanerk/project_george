<?php
if (isset($_POST["register"])) {
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
} else if (isset($_POST["finregister"])) {
  $email = sanitize($_POST["email"]);
  $cemail = sanitize($_POST["cemail"]);
  $role = sanitize($_POST["role"]);
  $name = sanitize($_POST["name"]);
  $number = sanitize($_POST["phonenumber"]);
  $pw = sanitize($_POST["password"]);
  $cpw = sanitize($_POST["confirmpassword"]);
  $address = sanitize($_POST["address"]);
  $zip = sanitize($_POST["zip"]);

  include_once("./classes/userData.php");
  $finreg = new userUpdate;
  $checkMail = $finreg->selectQuery("password", "email", $email);

  //If mail exists once in the password database
  if ($checkMail === 1) {
    //Check if email and password values are the same
    if (strcmp($email, $cemail) === 0) {
      if (strcmp($pw, $cpw) === 0) {
        $finreg->email = $email;
        $finreg->cemail = $cemail;
        $finreg->role = $role;
        $finreg->name = $name;
        $finreg->number = $number;
        $finreg->pw = $pw;
        $finreg->confirmpw = $cpw;
        $finreg->address = $address;
        $finreg->zip = $zip;

      } else {
        //Passwords do not match
        $registerprocess = false;
        $msg = new messageError;
        $msg->generate_msg("The entered passwords are not unique to each other.");
      }
    } else {
      //Emails do not match
      $registerprocess = false;
      $msg = new messageError;
      $msg->generate_msg("The entered e-mail does not match the initial e-mail.");
    }
  } else {
    //Email does not exist in database
    $registerprocess = false;
    $msg = new messageError;
    $msg->generate_msg("Email does not exist in our system.");
  }
} else {
  //If neither register or finish register submit button has been activated
}
?>