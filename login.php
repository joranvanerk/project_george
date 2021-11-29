<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");
$active_page_filename = basename(__FILE__);?>
<?php include_once("./includes/header.php"); ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-6">
            <form action="./login-script.php" method="post">
                <div class="form-group">
                    <label for="InputEmail">Vul hier uw e-mailadres in:</label>
                    <input name="email" type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp" required autofocus>
                </div>
                <div class="form-group">
                    <label for="InputPassword">Vul hier uw wachtwoord in:</label>
                    <input name="passwd" type="password" class="form-control" id="InputPassword" aria-describedby="passwordHelp" required autofocus>
                </div>
                <button type="submit" class="btn btn-lg btn-outline-secondary">Login</button>
        </div>
        </div>
    </div>
</div>

  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>