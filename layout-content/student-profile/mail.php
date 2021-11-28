<?php
//Checks if current user is allowed to visit this page
//Accessible roles: student, klant, eigenaar, docent, begeleider
include("./classes/logged_in.php");
new logged_in("student");
?>

<h1>mail</h1>