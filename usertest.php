User test here
<?php
include_once("./classes/userController.php");
$test = new userRegister;
$test->name = "zteveT";
$test->lastname = "QararS";

$test->createAbbrev();
var_dump($test);
echo $test->abbrev."<br>";


$number = 1234567890;
strlen($number);
if (strlen($number) >= 5) {
  echo "number is 10 or shorter";
} else {
  echo "Number is too large";
}




// $test->email = "georg@georina.nl";
// $test->selectRole();

// var_dump($test);
// var_dump($test->selectRole());

?>