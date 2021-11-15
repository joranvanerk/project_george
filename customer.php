<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css" />
  </head>
  <body>
<!-- include framework css and bootstrap basic -->
    <?php include_once("./includes/framework.php");

    // basefile management system for header
    $active_page_filename = basename(__FILE__);

     ?>
    <!-- include header -->
    <?php include_once("./includes/header.php"); ?>

    <?php
    var_dump($_POST);
?>

</body>
  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
</html>