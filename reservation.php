<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);

 ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>

        <!-- begin banner-->
        <div class="container">
            <br>
        <img src="./img/reserveren.jpg" class= "img-fluid"  alt="">
        </div>
         <!--einde banner-->


        <!--begin columns-->
        <br><br>
<!-- form begin naam achternaam  -->
<div class="container">
    <div class=" row"> <div style="background-color:#000000; height:1px; width:100%;"></div>
        <!-- Formulier voor reserveren -->
        <div class="col-sm-12 col-md-6 ">
            <h3 style="text-align: center">Reserveren</h3>
            <br>
            <p>Hoeveel persoons wilt u reserveren</p>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="1">1 Persoon</option>
            <option selected value="2">2 Personen</option>
            <option selected value="3">3 Personen</option>
            <option selected value="4">4 Personen</option>
            <option selected value="5">5 Personen</option>
            <option selected value="6">6 Personen</option>
            <option selected value="7">7 Personen</option>
            <option selected value="8">8 Personen</option>
            <option selected value="9">9 Peronen</option>
            <option selected value="10">10 Personen</option>
            </select>

            <div class="form-floating mb-3">
            <input type="voornaam" class="form-control" id="floatingInput" placeholder="voornaam">
            <label for="floatingInput">Vul hier uw voornaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="achternaam" class="form-control" id="floatingInput" placeholder="achternaam">
            <label for="floatingInput">Vul hier uw achternaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email">
            <label for="floatingInput">Vul hier uw email adress in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="telnummer" class="form-control" id="floatingPassword" placeholder="tel nummer">
            <label for="floatingPassword">Vul hier uw mobile nummer in</label>
            </div>

            <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Opmerkingen</label>
            </div>
            </div>
            <!-- einde formelier voor reserveren -->
            
        <!-- Foto/tekst -->
        <div class=" vl col-sm-12 col-md-6">
        <h3 style="text-align:center">Informatie</h3>
        <br>
        <img src="./img/corona.jpg" class= "img-fluid"  alt="">
        <br> <br>
        <!-- begin text voor corona informatie -->
        <p> U dient een geldig corona toegangs bewijst te hebben om binnen plaats te kunnen nemen.
            Voor het teras heeft u geen corona toegangs bewijs te hebben maar u kunt dan geen gebruik
            maken van de toilet helaas.
        </p>
        <!-- einde corona informatie -->
        </div>
    </div>
</div>





<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
