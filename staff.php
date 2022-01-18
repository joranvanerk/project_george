
<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");
// include the basefile for clean navigation
$active_page_filename = basename(__FILE__);?>
<!-- include the header -->
<?php include_once("./includes/header.php");

// create a simple variabele with the dutch date
$datan = date("l");
if ($datan == "Monday"){
  $daytent = "Maandag";
}
else if ($datan == "Tuesday"){
  $daytent = "Dinsdag";
}
else if ($datan == "Wednesday"){
  $daytent = "Woensdag";
}
else if ($datan == "Thursday"){
  $daytent = "Donderdag";
}
else if ($datan == "Friday"){
  $daytent = "Vrijdag";
}
else if ($datan == "Saturday"){
  $daytent = "Zaterdag";
}
else if ($datan == "Sunday"){
  $daytent = "Zondag";
}

// loading the navigation
if(isset($_GET["load"])){
  // loading the reservation content
  if($_GET["load"] == 'reserveringen'){
    $content_section = '
        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card border-dark" style="border-radius: 0px;">
          <div class="card-body">
            <h4 class="text-dark text-center">ALLE RESERVERINGEN</h4>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Datum</th>
                    <th scope="col">Tijd</th>
                    <th scope="col">Tafelnummer</th>
                    <th scope="col">Email</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark Rose</td>
                    <td>22-06-2022</td>
                    <td>16:20</td>
                    <td>17</td>
                    <td>Mark.Rose@outlook.com</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Frank Otto</td>
                    <td>06-02-2022</td>
                    <td>14:50</td>
                    <td>2</td>
                    <td>Frankotto.1998@gmail.com</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Kyan Dine</td>
                    <td>28-08-2022</td>
                    <td>10:30</td>
                    <td>9</td>
                    <td>K.dine@radboutuniversity.nl</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>';
  }
  // loading the restaurant content
  if($_GET["load"] == 'restaurant'){
    $content_section = '
    <div class="card border-dark" style="border-radius: 0px;">
      <div class="card-body">
        <h4 class="text-dark text-center">RESTAURANT OPTIES</h4>
          <form action="" method="POST">
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control formstyle" name="titel" id="floatingInput" value="George">
                  <label for="floatingInput">Restaurant naam</label>
                </div>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control formstyle" name="updates" id="floatingInput" value="12 december gaan wij open!">
                  <label for="floatingInput">Latest update</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6">
                <select class="form-select formstyle" name="status" aria-label="Default select example">
                  <option selected>Selecteer website status</option>
                  <option value="open">Open</option>
                  <option value="gesloten">Gesloten</option>
                  <option value="onderhoud">Onderhoud</option>
                </select>
              </div>
              <div class="col-sm-12 col-md-6 col-lg-6">
                <select class="form-select formstyle" name="lovetext" aria-label="Default select example">
                  <option selected>Selecteer love tekst</option>
                  <option value="XOXO">XOXO</option>
                  <option value="GREETINGS">GREETINGS</option>
                  <option value="LOVE">LOVE</option>
                </select>
              </div>
            </div>
            <div class="d-grid gap-2" style="margin-top: 20px;">
              <button class="btn btn-h formstyle" name="submit" type="submit">INSTELLINGEN BIJWERKEN</button>
            </div>
          </form>
        </div>
      </div>
    </div>';
  }
  // loading the users content
  if($_GET["load"] == 'gebruikers'){
    $content_section = '  <div class="col-sm-12 col-md-12 col-lg-12">
    <div class="card border-dark" style="border-radius: 0px;">
      <div class="card-body">
        <a style="text-decoration: none;" class="text-dark text-center" href="#"><h4>Nieuwe gebruiker aanmaken</h4></a>
      </div>
      </div>
      <br>
      <div class="card border-dark" style="border-radius: 0px;">
        <div class="card-body">
        <h4 class="text-dark text-center">ALLE GEBRUIKERS</h4>
          <table class="table text-center">
            <thead>
              <tr>
                <th scope="col">Acties</th>
                <th scope="col">Naam</th>
                <th scope="col">rol</th>
                <th scope="col">Email</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><a class="btn formstyle btn-h bookeventani" href="#">Bewerk</a></th>
                <td>Mark Rose</td>
                <td>Bezoeker</td>
                <td>Mark.Rose@outlook.com</td>
              </tr>
              <tr>
                <th scope="row"><a class="btn formstyle btn-h bookeventani" href="#">Bewerk</a></th>
                <td>Frank Otto</td>
                <td>Student</td>
                <td>Frankotto.1998@gmail.com</td>
              </tr>
              <tr>
                <th scope="row"><a class="btn formstyle btn-h bookeventani" href="#">Bewerk</a></th>
                <td>Kyan Dine</td>
                <td>Eigenaar</td>
                <td>K.dine@radboutuniversity.nl</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>';
  }
  // loading the statistics content
  if($_GET["load"] == 'statistieken'){
    $content_section = '  <div class="col-sm-7 col-md-4 col-lg-4">
        <div class="card border-dark" style="border-radius: 0px;">
          <div class="card-body">
            <h4 class="text-dark">RESERVERINGEN (TOTAAL)</h4>
            <h3 class="text-dark">27</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-md-4 col-lg-4">
        <div class="card border-dark" style="border-radius: 0px;">
          <div class="card-body">
            <h4 class="text-dark">BEZOEKERS VANDAAG</h4>
            <h3 class="text-dark">528</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-md-4 col-lg-4" style="margin-bottom: 20px;">
        <div class="card border-dark" style="border-radius: 0px;">
          <div class="card-body">
            <h4 class="text-dark">AANTAL MEDEWERKERS</h4>
            <h3 class="text-dark">3</h3>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
      <div class="card border-dark" style="border-radius: 0px;">
        <div class="card-body">
        <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
        	animationEnabled: true,
        	theme: "light2",
        	title:{
        		text: "STATISTIEKEN"
        	},
        	data: [{
        		type: "line",
              	indexLabelFontSize: 16,
        		dataPoints: [
        			{ y: 450 },
        			{ y: 414},
        			{ y: 530, indexLabel: "\u2191 Hoogste",markerColor: "red", markerType: "triangle" },
        			{ y: 460 },
        			{ y: 450 },
        			{ y: 500 },
        			{ y: 480 },
        			{ y: 480 },
        			{ y: 410 , indexLabel: "\u2193 Laagste",markerColor: "DarkSlateGrey", markerType: "cross" },
        			{ y: 500 },
        			{ y: 480 },
        			{ y: 510 },
              { y: 490 },
              { y: 520 },
              { y: 510 , indexLabel: "\u2193 Vandaag",markerColor: "DarkSlateGrey", markerType: "cross" }
        		]
        	}]
        });
        chart.render();

        }
        </script>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>
      </div>
    </div>
      ';
  }
}else{
  // loading the basic content for if something goes wrong or the field isn't full
  $content_section = '
  <div class="col-sm-7 col-md-4 col-lg-4">
    <div class="card border-dark" style="border-radius: 0px;">
      <div class="card-body">
        <h4 class="text-dark">RESERVERINGEN (TOTAAL)</h4>
        <h3 class="text-dark">27</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-7 col-md-4 col-lg-4">
    <div class="card border-dark" style="border-radius: 0px;">
      <div class="card-body">
        <h4 class="text-dark">BEZOEKERS VANDAAG</h4>
        <h3 class="text-dark">528</h3>
      </div>
    </div>
  </div>
  <div class="col-sm-7 col-md-4 col-lg-4" style="margin-bottom: 20px;">
    <div class="card border-dark" style="border-radius: 0px;">
      <div class="card-body">
        <h4 class="text-dark">AANTAL MEDEWERKERS</h4>
        <h3 class="text-dark">3</h3>
      </div>
    </div>
  </div>

  <div class="col-sm-12 col-md-12 col-lg-12">
  <div class="card border-dark" style="border-radius: 0px;">
    <div class="card-body">
    <h4 class="text-dark text-center">LAATSTE RESERVERINGEN</h4>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Naam</th>
            <th scope="col">Datum</th>
            <th scope="col">Tijd</th>
            <th scope="col">Tafelnummer</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark Rose</td>
            <td>22-06-2022</td>
            <td>16:20</td>
            <td>17</td>
            <td>Mark.Rose@outlook.com</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Frank Otto</td>
            <td>06-02-2022</td>
            <td>14:50</td>
            <td>2</td>
            <td>Frankotto.1998@gmail.com</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Kyan Dine</td>
            <td>28-08-2022</td>
            <td>10:30</td>
            <td>9</td>
            <td>K.dine@radboutuniversity.nl</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
';
}

 ?>

<!-- container with the basic navigation -->
<div class="container">
 <br>
 <div class="row">
   <div class="col-sm-5 col-md-5 col-lg-5">
     <!-- the title for welcoming the user in dutch -->
     <h3 class="george_title bookeventani">Welkom <?php
     // echo($_SESSION["voornaam"]) echo($_SESSION["achternaam"])
     ?>Joran van Erk</h3>
     <!-- the date that is created in the top part of the page -->
     <h5 class="george_menu bookeventani" style="margin-left: 0;">Het is vandaag <?php echo $daytent; ?> </h5>

   </div>
   <!-- simple columns for the navigation of the page -->
   <div class="col-sm-5 col-md-6 col-lg-6">
     <nav class="nav nav-pills flex-column flex-sm-row">
       <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff">Overzicht</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff?load=statistieken">Statistieken</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff?load=gebruikers">Gebruikers</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff?load=restaurant">Restaurant</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff?load=reserveringen">Reserveringen</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="staff-email">Mailing</a>
      <a class="flex-sm-fill text-sm-center btn formstyle btn-h bookeventani" style="margin-left: 5px; margin-right: 5px;" href="supervisoragenda">Agenda begeleider</a>
    </nav>
   </div>
   <div style="background-color:#000000; height:1px; width:100%; margin-bottom: 10px;"></div>
 </div>
 <div class="row">
   <!-- the content-section, where the content is, managed in the top part of the page -->
   <?php echo $content_section; ?>
 </div>
</div>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
