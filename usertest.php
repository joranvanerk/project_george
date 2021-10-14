User test here
<?php
include_once("./classes/userController.php");
$test = new userData;
$test->email = "georg@georina.nl";
$test->selectRole();

var_dump($test);
var_dump($test->selectRole());

?>