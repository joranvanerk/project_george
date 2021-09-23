<!DOCTYPE html>
<html>
  <head>
    <title>Contact</title>

    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <script src="./js/app.js"></script>
  </head>
  <body>
    <!-- include framework css and bootstrap basic -->
    <?php include_once("./includes/framework.php"); ?>
    <!-- include header -->
    <?php include_once("./includes/header.php"); ?>
    <!--The div element for the map -->
    <div class="container">
      <br>
      <div class="row">
        <div class="col-5">
          <h3>
            Wilt uw contact nemen met ons?
            <br>wij zijn bereikbaar via de mail <br><a href="mailto: contact@george-kanaleneiland.nl">contact@george-kanaleneiland.nl</a><br>
            <br>Uw kunt ook telefonisch met ons contact opnemen,
            <br>Via: 030 – 28 15 100<br>
            <br>Waar zijn wij te vinden?
            <br>Wij zijn gevestigd op Columbuslaan 540
            <br>Maandag tot met vrijdag 18:00 tot 21:00 uur
          </h3>
        </div>
        <div class= "col-2">
          <div id="black_line"></div>
        </div>
        <div class="col-5">
          <div  id="map"></div>
        </div>
      </div>
    </div>
</div>
    <!--Google maps fix later-->




    </div>
    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC5mH2r2cVrDH2p3n97i4tqFCa3wrACXSo&callback=initMap&libraries=&v=weekly"
      async
    ></script>

    <script
      function initMap() {
          var location = {lat: 52.063780, lng:5.100000};
          var map = new google.maps.Map(document.getElementById("map"), {
              zoom: 4,
              center: location
          });
      }
    ></script>

  </body>
  <!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
</html>