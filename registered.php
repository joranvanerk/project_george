<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

//include header
include_once("./includes/header.php");

if (isset($_GET["email"])) {
  $email = $_GET["email"];
  $exp = explode("@", $email);
  $user = $exp[0];
}

?>

<div class="container">
  <div class="row mb-2 mt-4">
    <!-- Thank you text after fully registering your account -->
    <div class="col-12 text-center">
    <h5 class="george_title mb-3">Thank you for registering, <?php echo $user; ?></h5>
    <h5 class="george_menu" style="font-weight: 200; text-transform: none; margin-left: 0; margin-top: 0.2rem;">
      We'd like to officially welcome you to the Georgies! Your account information has been successfully submitted.
    </h5>
    <h5 class="george_menu" style="font-weight: 600; margin-left: 0; color: red !important;">Have a great day! 🎈</h5>
    </div>
  </div>
  <!-- Horizontal Line -->
  <div style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row mt-2 mb-2">
    <div class="col-sm-12 col-md-5">
      <ul class="list-group list-group-flush">
        <li class="list-group-item"><i class="fas fa-user"></i> <a class="george_link" href="./login">Log In</a></li>
        <li class="list-group-item"><i class="far fa-calendar-check"></i> <a class="george_link" href="./bookevent">Book an event</a></li>
        <li class="list-group-item"><i class="fas fa-table"></i> <a class="george_link" href="./reservation">Reserve a table</a></li>
        <li class="list-group-item"><i class="fas fa-phone"></i> <a class="george_link" href="./contact">Contact us</a></li>
        <li class="list-group-item"><i class="fas fa-book-open"></i> <a class="george_link" href="./menu">Our Menu</a></li>
      </ul>
    </div>
    <div class="col-sm-12 col-md-5 vl">
      <h5 class="george_title mt-2 mb-3" style="font-weight: 400; text-transform: none; margin-left: 0; margin-top: 0.2rem;">Did you know:</h5>
      <h5 class="george_menu mb-4" style="font-weight: 400; text-transform: none; margin-left: 0; margin-top: 0.2rem;">In My George you can check your reservations, current actions, dinner points and many more!</h5>
      
      <h5 class="george_menu" style="font-weight: 400; text-transform: none; margin-left: 0; margin-top: 0.2rem;">We would love to hear more from your event and organisation, and always remember, need any help? Just contact us!</h5>
      <h5 class="george_menu" style="font-weight: 600; margin-left: 0; color: red !important;">GOOD LUCK ❤️</h5>
    </div>
  </div>
</div>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>