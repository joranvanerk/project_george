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
    <!--Google maps fix later-->
    <div id="black_line">
    
    <div  id="map"></div>
      <h3>
        Wilt uw contact nemen met ons?
        <br>Dat kunt uw op: contact@george-kanaleneiland.nl
        <br>Uw kunt met ons telefonisch contact nemen.
        <br>Dat kan op: 030 – 28 15 100<br>
        <br>Waar kunt ons bezoeken?
        <br>Dat kan op de Columbuslaan 540
        <br>Maandag tot met vrijdag 18 tot 21 uur
      </h3>
      
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