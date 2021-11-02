<?php
session_destroy();

include_once("./includes/framework.php");
include("./classes/functions.php");
include("./classes/connectDB.php");
include_once("./includes/header.php");

?>


<h1 class="george_title">You have logged out!</h1>


<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>