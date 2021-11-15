
<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");
$active_page_filename = basename(__FILE__);?>
<?php include_once("./includes/header.php");

$datan = date("l");
if ($datan == "Monday"){
  $daytent = "Maandag";
} 
else if ($datan == "Tuesday"){
  $daytent = "Dinsdag";
} 
else if ($datan == "Wensday"){
  $daytent = "Woensdag";
}
else if ($datan == "Thursday"){
  $daytent = "Donderdag";
}
else if ($datan == "Friday"){
  $daytent = "Vrijdag";
}
else if ($datan == "Saturday"){
  $daytent = "Zaterdag";
}
else if ($datan == "Sunday"){
  $daytent = "Zondag";
}

?>
<div class = "container-fluid">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-sm-5 col-md-6 col-lg-6">
          <h1>Uw bent successvol ingelogd</h1>
          <h2>Welkom <?php echo($_SESSION["voornaam"])?> <?php echo($_SESSION["achternaam"])?></h2>
          <h2>Vandaag is het <?php echo $daytent; ?> </h2>

        </div>


  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>