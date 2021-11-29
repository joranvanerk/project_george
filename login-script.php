<?php
  session_start();
    // var_dump($_POST);
    include("./classes/connectDB.php");
    include("./classes/functions.php");

    $email = sanitize($_POST["email"]);
    $passwd = sanitize($_POST["passwd"]);
    // $pass = $sql = "SELECT * from `password` WHERE `passwd` = '$passwd'";

    $sql = "SELECT * from `password` WHERE `email` = '$email'";
    // $passwdDB = "SELECT * from `password` WHERE `passwd` = '$passwd'";
    $result = mysqli_query($conn, $sql);
    $record = mysqli_fetch_assoc($result);
    $encpass = $record["passwd"];
    $salt = $record["salt"];
    if (mysqli_num_rows($result) == 1){
        if(password_verify($passwd.$salt, $encpass)) {
            echo("Successful login");

            $sql = "SELECT * FROM `klant` WHERE `email` = '$email'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);

            session_start();

            $_SESSION["email"] = $record["email"];
            $_SESSION["voornaam"] = $data["voornaam"];
            $_SESSION["achternaam"] = $data["achternaam"];
            setcookie("email", $record["email"],+360000);

            include_once("./classes/userController.php");
            $login_user = new userData;
            $login_user->email = $record["email"];
            $user_role = $login_user->selectRole();
            switch ($user_role) {
                case "eigenaar":
                    echo '<meta http-equiv="refresh" content="0; URL=./staff">';
                    break;
                case "student":
                    echo '<meta http-equiv="refresh" content="0; URL=./student-profile">';
                    break;
                case "begeleider":
                    echo '<meta http-equiv="refresh" content="0; URL=./index">';
                    break;
                case "docent":
                    echo '<meta http-equiv="refresh" content="0; URL=./index">';
                    break;
                case "klant":
                    echo '<meta http-equiv="refresh" content="0; URL=./customer">';
                    break;
                default:
                    echo '<meta http-equiv="refresh" content="0; URL=./index">';
            }
        } else {
            // if your password fails
            $message = "Your credentials are not correct.\\nPlease try again.";
            // var_dump($_POST);
            echo "<script type='text/javascript'>alert('$message');</script>";
            header("Refresh: 0; ./login.php");
        }
    } else {
        // if email fails
        $message = "Your credentials are not correct.\\nTry again.";
        // var_dump($_POST);
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; ./login.php");
    }
?>
