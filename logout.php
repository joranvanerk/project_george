<?php
    //Start session
    session_start();
    //Set cookies to a past time (remove cookies)
    //Unset variable $_SESSION
    unset($_SESSION);
    unset($_COOKIE["email"]);

    //Destroy the session
    session_destroy();

    //Redirect user
    header("Location: ./index");
?>