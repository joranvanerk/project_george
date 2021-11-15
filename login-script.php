<?php
    // var_dump($_POST);
    include("./classes/connectDB.php");
    include("./classes/functions.php");

    $email = sanitize($_POST["email"]);
    // $passwd = sanitize($_POST["password"]);

    $sql = "SELECT * from `password` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1){
        $record = mysqli_fetch_assoc($result);
        echo("Successful login");
        $sql = "SELECT * FROM `klant` WHERE `email` = '$email'";
        $query = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION["email"] = $record["email"];
        $_SESSION["id"] = true;
        // $_SESSION["rol"] = $record["rol"];
        header("Location:./customer.php");
    } else {
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; ./login.php");
    }
?>