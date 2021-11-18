<?php
//Checks for log-in and acts as a failsave
//Accessible roles: student, klant, eigenaar, docent, begeleider
include("./classes/logged_in.php");
$is_logged_in = new is_logged_in("student");
?>