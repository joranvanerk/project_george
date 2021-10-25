<!DOCTYPE html>
<html>
  <head>
    <title>Contact</title>

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

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="./login-script.php" method="post">
                <div class="form-group">
                    <label for="InputEmail">Vul hier uw e-mailadres in:</label>
                    <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" required autofocus>
                </div>
        </div>
        </div>
    </div>
</div>



</body>
  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
</html>