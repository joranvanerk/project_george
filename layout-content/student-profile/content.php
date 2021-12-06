<?php
if (isset($_GET["display"]) && isset($_GET["id"])) {
  if ($_GET["display"] = "mail") {
    if ($_GET["id"]) {
      require_once './classes/mailDisplay.php';
      $content = new mailDisplay($_GET["id"]);
    }
  }
} else {
  echo "Error 404";
}

?>

<!-- Display content based on requested information -->
<div class="container">
  <div class="row">
    <?php $content->show(); ?>
  </div>
</div>