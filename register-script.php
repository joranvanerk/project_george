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
  $register->selectQuery("password", "email", $email);

  //Email does not exist in password table
  if ($register->result === 0) {
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
  // Include connectDB and Functions
  include("./classes/connectDB.php");
  include_once("./classes/functions.php");

  $email = sanitize($_POST["email"]);
  $cemail = sanitize($_POST["cemail"]);
  $role = sanitize($_POST["role"]);
  $name = sanitize($_POST["name"]);
  $lastname = sanitize($_POST["lastname"]);
  $number = sanitize($_POST["phonenumber"]);
  $pw = sanitize($_POST["password"]);
  $cpw = sanitize($_POST["confirmpassword"]);
  $address = sanitize($_POST["address"]);
  $zip = sanitize($_POST["zip"]);

  include_once("./classes/userData.php");
  $finreg = new userRegister;
  $data = $finreg->selectQuery("password", "email", $email);
  //var_dump($data);exit();

  //If mail exists once in the password database
  if ($finreg->result === 1) {
    //Check if email and password values are the same
    if (strcmp($email, $cemail) === 0) {
      if (strcmp($pw, $cpw) === 0) {
        $finreg->email = $email;
        $finreg->cemail = $cemail;
        $finreg->role = $role;
        $finreg->name = $name;
        $finreg->lastname = $lastname;
        $finreg->number = $number;
        $finreg->pw = $pw;
        $finreg->confirmpw = $cpw;
        $finreg->address = $address;
        $finreg->zip = $zip;
        //var_dump($finreg);exit();

        $record = mysqli_fetch_assoc($data);
        //var_dump($record);exit();

        $temp_pw = "temp";
        $finreg->salt = $record["salt"];
        $finreg->hashed_password = $record["passwd"];
        //var_dump($finreg->salt, $finreg->hashed_password);exit();

        //Check if password matches with password saved in database.
        if (password_verify($temp_pw.$finreg->salt, $finreg->hashed_password)) {
          $finreg->updatePassword();
          echo "Password updated";

          if ($finreg->result === true) {
            $finreg->insertUser($finreg->role);
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
        //Passwords do not match
        echo "The entered passwords are not unique to each other.";
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