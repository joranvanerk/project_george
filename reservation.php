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
            <p>hoeveel persoons wilt u reserveren</p>
            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
            <option selected value="1">1 persoon</option>
            <option selected value="2">2 personen</option>
            <option selected value="3">3 personen</option>
            <option selected value="3">4 personen</option>
            <option selected value="3">5 personen</option>
            <option selected value="3">6 personen</option>
            <option selected value="3">7 personen</option>
            <option selected value="3">8 personen</option>
            <option selected value="3">9 peronen</option>
            <option selected value="3">10 personen</option>
            </select>

            <div class="form-floating mb-3">
            <input type="voornaam" class="form-control" id="floatingInput" placeholder="voornaam">
            <label for="floatingInput">vul hier uw voornaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="achternaam" class="form-control" id="floatingInput" placeholder="achternaam">
            <label for="floatingInput">vul hier uw achternaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="email">
            <label for="floatingInput">vul hier uw email adress in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="telnummer" class="form-control" id="floatingPassword" placeholder="tel nummer">
            <label for="floatingPassword">vul hier uw mobile nummer in</label>
            </div>

            <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">opmerkingen</label>
            </div>

        </div>
        <!-- Foto/tekst -->
        <div class=" vl col-sm-12 col-md-6">
        <h3 style="text-align:center">Informatie</h3>
        </div>
    </div>
</div>
<!-- form einde naam achternaam -->




<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
