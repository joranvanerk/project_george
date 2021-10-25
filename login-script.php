<?php
    // var_dump($_POST);
    include("./classes/connectDB.php");
    include("./classes/functions.php");

    $email = sanitize($_POST["email"]);

    $sql = "SELECT * from `klant` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (!mysqli_num_rows($result) == 1){
        $message = "Username and/or Password incorrect.\\nTry again.";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header("Refresh: 0; ./login.php");
        
    } else {
        $record = mysqli_fetch_assoc($result);
        echo("Successful login");
        
        header("Location:./index.php");
        // sleep(1);
    }
?>