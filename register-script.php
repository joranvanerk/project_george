<?php
//Check if user has submitted a form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	//If user send a register $_POST, include userRegister.php
	if (isset($_POST["register"]) || isset($_POST["finregister"])) {
		include_once("./classes/userRegister.php");
		$newregister = new userRegister;
		}
	} else {
		echo "User did not send a valid register form.";
		//header("Refresh: 5; URL=www.george-kanaleneiland.nl");
	}
} else {
	echo "User did not send a valid form.";
	//header("Refresh: 5; URL=www.george-kanaleneiland.nl");
}
?>