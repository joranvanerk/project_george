<?php
class checkUserData {
  public $name;
  public $email;
  public $cemail;
  public $phonenumber;
  public $newsletter;
  public $generalterms;
  public $message;

  public function hello() {
    return $message = "Function has been successfully initiated from registerAccount.php";
  }


  // Check if all data is filled in and does not match to any existing accounts.
  public function registerControl() {

  }

  // Create a SQL insert for registering the new user to the database.
  public function registerToDB() {

  }

  //Creates a generic register e-mail and sends it to the user for verification purposes.
  public function sendRegisterMail() {

  }
}
?>