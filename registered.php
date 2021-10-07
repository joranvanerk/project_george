<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

//include header
include_once("./includes/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <p class="george-menu">
      Thank you for finishing your registation process at George Kanaleneiland! We'd like to officially welcome you to the Georgies!
      <br><br>
      If your selected desire role is Student, Companion or Teacher, this will be verified by our staff first. Once verified you will be send an e-mail.
      </p>
    </div>
  </div>
  <div class="row">
    <div class="col-6">
    <ul class="list-group list-group-flush">
      <li class="list-group-item"><a class="george_link" href="">Link to x</a></li>
      <li class="list-group-item"><a class="george_link" href="">Link to x</a></li>
      <li class="list-group-item"><a class="george_link" href="">Link to x</a></li>
      <li class="list-group-item"><a class="george_link" href="">Link to x</a></li>
      <li class="list-group-item"><a class="george_link" href="">Link to x</a></li>
    </ul>
    </div>
    <div class="col-6">
    Did you know: 
    In My George you can check your reservations, current actions, dinner points and many more!
    <br><br>
    xoxo
    George Kanaleneiland
    </div>
  </div>
</div>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>