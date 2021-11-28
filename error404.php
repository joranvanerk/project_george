<?php
header("Refresh:3; url=index");
include("./includes/framework.php");
$active_page_filename = basename(__FILE__);
include("./includes/header.php");
?>

<div class="container">
  <h1>You do NOT have the required permissions to visit this page.</h1>
  <h3>You will be redirected to our homepage.</h3>
</div>


<?php include("./includes/footer.php"); ?>