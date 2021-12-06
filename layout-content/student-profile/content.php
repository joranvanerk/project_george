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

<div class="container">
  <div class="row">
    <div class="buttons">
      <a style="width: 49%;" class='btn btn-cancel' href='student-profile?page=mail'>Return to mail overview</a>
      <a style="width: 49%;" class='btn btn-cancel' href='student-profile?page=mail'>Return to mail overview</a>
    </div>
    <div class="content">
      <?php $content->show();  ?>
    </div>
  </div>
</div>