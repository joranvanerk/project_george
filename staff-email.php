
<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");
// include the basefile for clean navigation
$active_page_filename = basename(__FILE__);?>
<!-- include the header -->
<?php include_once("./includes/header.php");

// execute query
$get_users_query = mysqli_query($conn, "SELECT * FROM `student`");

// make a list of the users from the query
$get_users_list = '';

// looping everyone in the list to a variable
while($get_users_data = mysqli_fetch_assoc($get_users_query)){

  // set the variable while looping the query answers
  $get_users_list .= '<option value="' . $get_users_data["email"] . '">' . $get_users_data["voornaam"] . '</option>';

}

if(isset($_POST["submit"])){

  // set the email adress to the right one from the form
  $to = $_POST["email"];

  // set the subject of the mail
  $subject = "Nieuw bericht van beheerder GEORGE";

  // set the content of the email to the content that matches the form
  $bericht = "Bericht van beheerder: " . $_POST["bericht"];

  // META mime version included
  $headers = "MIME-Version: 1.0\r\n";

  // META content type included
  $headers .= "Content-type: text/html; charset=UTF-8\r\n";

  // META the from email that the end-user sees
  $headers .= "From: info@george-kanaleneiland.nl\r\n";

  // META confirmation and moderation of the mail goes through this email
  $headers .= "Cc: moderator@george-kanaleneiland.nl\r\n";

  // META the invisible confirmation email of the root
  $headers .= "Bcc: root@george-kanaleneiland.nl";

  mail($to, $subject, $bericht, $headers);

  header("location: ./staff-email.php?success");

}

if(isset($_GET["success"])){

  $success = "Je formulier is succesvol verzonden!";

}else{

  $success = "";

}

?>


<form class="form-control" action="" method="POST">

  <div class="container">

    <?php

    // check if the mail was succesfully sended
    echo $success;

     ?>

    <div class="mb-3">

      <br>

      <h5 class="george_title bookeventani text-center">Contact persoon</h5>

      <select class="form-select" name="email">

        <option selected>Selecteer persoon</option>

        <?php

        // print the list of users in option format
        echo $get_users_list;

        ?>

      </select>

      <div class="mb-3">

        <br>

        <h5 class="george_title bookeventani text-center">Bericht aan gebruiker</h5>

        <textarea class="form-control" name="bericht" rows="8" style="width: 100%;"></textarea>

      </div>

      <div class="d-grid gap-2">

      <!-- send all data collected in the form to the email sending option -->
      <button type="submit" name="submit" class="btn formstyle btn-h">VERZENDEN</button>

      </div>

    </div>

  </div>

</form>


<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
