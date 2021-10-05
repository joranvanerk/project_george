<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

 ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>

<div class="container">
  <br>
  <div class="row">
    <div class="col-sm-12 col-md-7">
      <br>
      <h3 class="george_title bookeventani" style="margin-top: 4rem; margin-bottom: 4rem;">Your perfect event solution with a bit of <u>Amsterdam flare</u> organized at our top of the line location in <u>The Netherlands</u></h3>
      <br>
      <h3 class="george_menu bookeventani" style="font-weight: 400; text-transform: none; margin-left: 0;">We believe that your event has that <u>little sparkle</u> everyone needs at their own moment, go for that sparkle. Let them "smile" for a little moment.</h3>
      <br>
      <h3 class="george_menu bookeventani" style="font-weight: 600; margin-left: 0; margin-top: 5rem;">Greetings from <u>Amsterdam</u></h3>
      <h3 class="george_menu bookeventani" style="font-weight: 600; margin-left: 0; color: red !important;">XOXO 💋</h3>
    </div>
    <div class="col-1" style="margin-right: -5rem;">
      <div class="vl mobielhide" style="height: 95%;"></div>
    </div>
    <div class="col-md-4 col-sm-12">
      <br>
      <h3 class="george_title bookeventani" style="margin-top: 1.5rem; margin-bottom: 1.5rem;">Let us know</h3>
      <form class="bookeventani">
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Name of your event</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Type of event</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Your full name</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Phone number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Email adress</label>
        </div>
        <div class="d-grid gap-2">
        <button type="submit" class="btn formstyle btn-h">BOOK</button>
      </div>
      </form>
    </div>
  </div>
    <div style="background-color:#000000; height:1px; width:100%;"></div>
    <br>
    <div class="row">
      <div class="col-md-2 col-sm-12">
        <br>
        <br>
        <h3 class="george_menu bookeventani" style="font-weight: 400; text-transform: none; margin-left: 0; margin-top: -20px;">Follow us on</h3>
        <i class="fab fa-facebook fa-2x bookeventani"></i>
        <i class="fab fa-instagram fa-2x bookeventani"></i>
        <img class="mobielhide bookeventani imgani" src="./img/flower.png" alt="" style="max-width: 8rem; margin-top: 20px;">
      </div>
      <div class="col-1" style="margin-right: -5rem;">
        <div class="vl mobielhide" style="height: 95%;"></div>
      </div>
      <div class="col-md-6 col-sm-12">
        <br>
        <h3 class="george_title bookeventani" style="margin-top: 1rem; margin-bottom: 1.5rem;">Or contact us directly</h3>
        <form class="bookeventani">
          <div class="form-floating mb-3">
            <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
            <label for="floatingInput">Your message</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
            <label for="floatingInput">Email adress</label>
          </div>
          <div class="d-grid gap-2">
          <button type="submit" class="btn formstyle btn-h">SEND</button>
        </div>
        </form>
        <br>
        <br>
      </div>
      <div class="col-md-1" style="margin-right: -5rem;">
        <div class="vl mobielhide" style="height: 95%;"></div>
      </div>
      <div class="col-md-3 col-sm-12">
        <br>
        <h4 class="george_menu bookeventani" style="font-weight: 400; text-transform: none; margin-left: 0; margin-top: 0.2rem;">We would love to hear more from your event and organisation, and always remember, need any help? Just contact us!</h4>
        <h4 class="george_menu bookeventani" style="font-weight: 600; margin-left: 0; color: red !important;">GOOD LUCK ❤️</h4>
      </div>
    </div>
</div>
<br><br>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
