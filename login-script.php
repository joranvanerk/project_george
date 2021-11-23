<?php
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
    if (mysqli_num_rows($result) == 1){
        if(password_verify($passwd, $encpass)) {
            echo("Successful login");
    
            $sql = "SELECT * FROM `klant` WHERE `email` = '$email'";
            $query = mysqli_query($conn, $sql);
            $data = mysqli_fetch_assoc($query);
    
            session_start();
            $_SESSION["email"] = $record["email"];
            $_SESSION["id"] = true;
            $_SESSION["voornaam"] = $data["voornaam"];
            $_SESSION["achternaam"] = $data["achternaam"];
            // $_SESSION["rol"] = $record["rol"];
            header("Location:./customer.php");
        } else {
            $message = "Error password.";
            var_dump($_POST);


            echo "wachtwoord klopt niet";
        }

    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        // var_dump($_POST);
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; ./login.php");
    }
?>