<?php
    var_dump($_POST);
    include_once("./classes/connectDB.php");
    include_once("./classes/functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * from `klant` WHERE `email` = `$email`";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result)) {
        echo("Eroror lasie");
    } else {
        echo("Alright it works");
    }

    

    




?>