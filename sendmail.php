<?php
$to = "random1@user.com";
$subject = "Register process George-kanaleneiland.nl";
include_once("./layout-content/email.php");

$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: info@george-kanaleneiland.nl\r\n";
$headers .= "Cc: moderator@george-kanaleneiland.nl\r\n";
$headers .= "Bcc: root@george-kanaleneiland.nl";

mail($to, $subject, $registermail, $headers);
?>