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
    <div class = "container-fluid">
    <div class="container">
      <br>
      <div class="row">
        <div class="col-sm-5 col-md-6 col-lg-6">
          <h4>
            <div class="george_title">Contact</div> <br><br>
            Wilt uw contact nemen met ons?
            <br>wij zijn bereikbaar via de mail <br><a href="mailto: contact@george-kanaleneiland.nl">contact@george-kanaleneiland.nl</a><br>
            <br>Uw kunt ook telefonisch met ons contact opnemen,
            <br>Via: 030 – 28 15 100<br>
            <br><br>
            <div class="george_title">Waar zijn wij te vinden?</div>
            <br>Wij zijn gevestigd op Columbuslaan 540
            <br>Maandag tot met vrijdag 18:00 tot 21:00 uur
            <br><br>
            <div class="george_title">Bereikbaarheid</div>
            <br>Wij liggen op loopafstand (ongeveer 10 minuten) afstand van de tramhalte (lijn 22)
            <br>Ook hebben wij gratis parkeergelegenheid achter het pand.
          </h4>
        </div>
        <!-- <div class= "col-sm-4 col-md-1 col-lg-2 vl">
          <div class="vl"></div>
        </div> -->
        <!-- <div class= "col-2">
          <div class= "george_title">Google Maps</div>
        </div> -->
        <!-- <hr style=clear:both;> -->
        <div class="col-sm-1 col-md-1 col-lg-2 vl">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2452.8834394903515!2d5.099663918471286!3d52.06364600999879!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6659441e470cb%3A0x741aaacd4a1e0a0c!2sColumbuslaan%20540%2C%203526%20EP%20Utrecht!5e0!3m2!1snl!2snl!4v1632394215177!5m2!1snl!2snl"
            width="600"
            height="500"
            style="border:0; margin-left: 1rem;"
            allowfullscreen=""
            loading="lazy">
          </iframe>
        </div>
      </div>
    </div>
</div>
</div>
    </div>
  </body>
  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
</html>
