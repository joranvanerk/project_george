<?php
// Start Registration
$name = $_POST["name"];
$email = $_POST["email"];
$cemail = $_POST["confirmemail"];
$phonenumber = $_POST["phonenumber"];
$newsletter = $_POST["checkNewsletter"];
$generalterms = $_POST["checkGeneralterms"];
var_dump($name, $email, $cemail, $phonenumber, $newsletter, $generalterms);
exit();

?>