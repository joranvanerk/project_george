<?php
//Check if user has submitted a form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	//If user send a register $_POST, include userRegister.php
	if (isset($_POST["register"])) {
		include_once("./classes/userRegister.php");
		$newregister = new userRegister;
		if ($newregister->status === "Success") {
			echo "User has been created successfully. Please verify your account via e-mail.";
			header("Refresh: 5; URL=www.george-kanaleneiland.nl");
		}
	} else {
		echo "User did not send a register form";
		header("Refresh: 5; URL=www.george-kanaleneiland.nl");
	}
} else {
	echo "User did not send a valid form.";
	header("Refresh: 5; URL=www.george-kanaleneiland.nl");
}
?>