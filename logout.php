<?php
    //Start session
    session_start();
    //Set cookies to a past time (remove cookies)
    setcookie("email", "327068@student.mboutrecht.nl", time()-3600);  /* expired */
    setcookie("logged_in", true, time()-3600);  /* expired */
    setcookie("userrole", "student", time()-3600);  /* expired */
    //Unset variable $_SESSION
    unset($_SESSION);

    //Destroy the session
    session_destroy();

    //Redirect user
    header("Location: ./index");
?>