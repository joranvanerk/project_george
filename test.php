<?php
require_once './classes/studentReservation.php';
$reservation = new studentReservation($_POST["email"]);

$reservation->saveTimeslots();
?>