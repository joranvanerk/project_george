<?php
if (isset($_POST["register"])) {
  // include_once("./classes/functions.php");
  // Grabs all the values from the form and puts it in variables.
  $email = sanitize($_POST["email"]);
  $cemail = sanitize($_POST["confirmemail"]);
  $newsletter = (isset($_POST["checkNewsletter"])) ? 1 : 0;
  $generalterms = (isset($_POST["checkGeneralterms"])) ? 1 : 0;

  // Include register function and creates a new register user.
  include_once("./classes/userController.php");
  $register = new userRegister;
  $register->selectQuery("password", "email", $email);

  //Email does not exist in password table
  if ($register->result === 0) {
    //General terms has been accepted
    if ($generalterms === 1) {
        //Fill new object with POST details
      $register->email = $email;
      $register->cemail = $cemail;
      $register->newsletter = $newsletter;
      $register->generalterms = $generalterms;

      //Check if email and confirm email is same string or not
      if (strcmp($register->email, $register->cemail) === 0) {
        //Create a 
        ed password and insert into password table.
        $createPW = $register->createPassword();
        $insertToPW = $register->insertIntoPassword();
        //Inserted details into password table.
        if ($insertToPW === true) {
          //Send register mail
          $role = $register->selectRole();
          include_once("./sendmail.php");
          $send = true;

          if ($send === true) {
            include_once("./classes/sendMessage.php");
            $msg = new messageSuccess;
            $msg->generate_msg("Successfull! Please check your e-mail to verify.");
          } else {
            //Finish registering email did not send
            include_once("./classes/sendMessage.php");
            $msg = new messageError;
            $msg->generate_msg("Register email was not send.");
          }
        } else {
          //Did not inject into PW database
          include_once("./classes/sendMessage.php");
          $registerprocess = false;
          $msg = new messageError;
          $msg->generate_msg("We've failed to register your details. (PW)");
        }
      } else {
        //Emails do not match 
        include_once("./classes/sendMessage.php");
        $registerprocess = false;
        $msg = new messageError;
        $msg->generate_msg("Your entered emails do not match.");
      }
    } else {
      // user did not agree to general terms
      include_once("./classes/sendMessage.php");
      $registerprocess = false;
      $msg = new messageError;
      $msg->generate_msg("Accepting the General Terms is required.");
    }
  } else {
    //Email exists in password table
    include_once("./classes/sendMessage.php");
    $registerprocess = false;
    $msg = new messageError;
    $msg->generate_msg("Email is already taken.");
  }
} else if (isset($_POST["finregister"])) {
  include_once("./classes/connectDB.php");
  //Sanitize fields
  $email = sanitize($_POST["email"]);
  $cemail = sanitize($_POST["cemail"]);
  $name = sanitize($_POST["name"]);
  $lastname = sanitize($_POST["lastname"]);
  $number = sanitize($_POST["phonenumber"]);
  $pw = sanitize($_POST["password"]);
  $cpw = sanitize($_POST["confirmpassword"]);

  //Sanitize additional fields if form is filled in by student
  if (isset($_POST["role"])) {
    if ($_POST["role"] === "student") {
      $address = sanitize($_POST["address"]);
      $zip = sanitize($_POST["zip"]);
      $region = sanitize($_POST["region"]);
      $teacher = sanitize($_POST["teacher"]);
      $lessonpackage = sanitize($_POST["lessonpackage"]);
    }
  }

  //Send query to check e-mail in our database
  include_once("./classes/userController.php");
  $finreg = new userRegister;
  $finreg->selectQuery("password", "email", $email);
  //var_dump($email);exit();
  //var_dump($finreg->query, $finreg->queryData, $finreg->result);exit();

  //If mail exists once in the password database
  if ($finreg->result === 1) {
    //Check if email and password values are the same
    if (strcmp($email, $cemail) === 0) {
      if (strcmp($pw, $cpw) === 0) {
        if (strlen($number) >= 5) {
          $finreg->email = $email;
          $finreg->cemail = $cemail;
          $finreg->name = $name;
          $finreg->lastname = $lastname;
          $finreg->number = $number;
          $finreg->pw = $pw;
          $finreg->confirmpw = $cpw;

          if (isset($_POST["role"])) {
            if ($_POST["role"] === "student") {
              $finreg->address = $address;
              $finreg->zip = $zip;
              $finreg->region = $region;
              $finreg->teacher = $teacher;
              $finreg->lessonpackage = $lessonpackage;
            }
          }
          //Check if password matches with password saved in database.
          if (password_verify("temp".$finreg->queryData["salt"], $finreg->queryData["passwd"])) {
            $finreg->updatePassword();

            if ($finreg->result === true) {
              $finreg->selectRole();
              $finreg->insertUser();
              //var_dump($finreg);exit();
              if ($finreg->result === true) {
                header("Location: registered?email=".$finreg->email."");
              } else {
                //User was not created in appropiate table
                echo "Failed to create user in respective user table";
              }
            } else {
              //Password was not updated
              echo "Failed to update your password.";
            }
          } else {
            //Password does not match the password in database
            echo "Your password does not match our password.";
          }
        } else {
          //Number is too large for database
          echo "Your phone number can't be longer than 10 numbers!";
        }
      } else {
        //Passwords do not match
        echo "The entered passwords are not identical to each other.";
      }
    } else {
      //Emails do not match
      echo "The entered e-mail does not match the initial e-mail.";
    }
  } else {
    //Email does not exist in database
    echo "Email does not exist in our system.";
  }
} else {
  //If neither register or finish register submit button has been activated
}
?>