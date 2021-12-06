<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);

if(isset($_POST["submit"])){
    $tijd = sanitize($_POST["tijd"]);
    $datum = sanitize($_POST["datum"]);
    $personen = sanitize($_POST["personen"]);
    $voornaam = sanitize($_POST["voornaam"]);
    $achternaam = sanitize($_POST["achternaam"]);
    $email = sanitize($_POST["email"]);
    $mobiel = sanitize($_POST["mobiel"]);
    $opmerkingen = sanitize($_POST["opmerkingen"]);
    $tafelnummer = sanitize($_POST["tafelnummer"]);

    $check_time_query = mysqli_query($conn, "SELECT * FROM `reserveringen` WHERE `datum`='$datum $tijd' AND `tafelnummer`='$tafelnummer'");
    if(mysqli_num_rows($check_time_query)){
        echo '<script>alert("De tijd of tafel is niet meer beschikbaar probeer het opnieuw!")</script>';
    }else{

    mysqli_query($conn, "INSERT INTO `reserveringen` (`id`, `personen`, `datum`, `voornaam`, `achternaam`, `email`, `mobiel`, `opmerkingen`, `tafelnummer`) VALUES
     (NULL, '$personen', '$datum $tijd', '$voornaam', '$achternaam', '$email', '$mobiel', '$opmerkingen', '$tafelnummer');");
     echo '<script> alert("succesvol verzonden"); </script>';
    }

    

    $to      = $email;
    $subject = 'reservering george kanaleneiland';
    $message = 'uw reservering is succesvol ontvangen en verwerkt ';
    $headers = 'From: george-kanaleneiland@outlook.com' . "\r\n" .
         
               'X-Mailer: PHP/' . phpversion();

    mail($to, $subject, $message, $headers);

}

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
    <form action="" method="POST">
    <div class=" row"> <div style="background-color:#000000; height:1px; width:100%;"></div>
        <!-- Formulier voor reserveren -->
        <div class="col-sm-12 col-md-6 ">
            <h3 style="text-align: center">Reserveren</h3>
            <br>
            <p>Hoeveel persoons wilt u reserveren</p>
            <select class="form-select form-select-lg mb-3" name="personen" required aria-label=".form-select-lg example">
            <option value="1">1 Persoon</option>
            <option value="2">2 Personen</option>
            <option value="3">3 Personen</option>
            <option value="4">4 Personen</option>
            <option value="5">5 Personen</option>
            <option value="6">6 Personen</option>
            <option value="7">7 Personen</option>
            <option value="8">8 Personen</option>
            <option value="9">9 Peronen</option>
            <option value="10">10 Personen</option>
            <option selected value=""></option>
            </select>

            <div class="form-floating mb-3">
            <input type="date" class="form-control" name="datum" required id="floatingInput" placeholder="datumtijd">
            <label for="floatingInput">Vul hier de datum en tijd</label>
            </div>

            <div class="form-floating mb-3">
            <input type="voornaam" class="form-control" name="voornaam" required id="floatingInput" placeholder="voornaam">
            <label for="floatingInput">Vul hier uw voornaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="achternaam" class="form-control" name="achternaam" required id="floatingInput" placeholder="achternaam">
            <label for="floatingInput">Vul hier uw achternaam in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" required id="floatingInput" placeholder="email">
            <label for="floatingInput">Vul hier uw email adress in</label>
            </div>

            <div class="form-floating mb-3">
            <input type="telnummer" class="form-control" name="mobiel" required id="floatingPassword" placeholder="tel nummer">
            <label for="floatingPassword">Vul hier uw mobile nummer in</label>
            </div>

            <div class="form-floating">
            <textarea class="form-control" name="opmerkingen" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Opmerkingen</label>
            </div>
            </div>

            <!-- einde formelier voor reserveren -->

        <!-- Foto/tekst -->
        <div class=" vl col-sm-12 col-md-6">
        <h3 style="text-align:center">Reserveer hier uw zitplaatsen</h3>
        <br>
        <img src="./img/seating.png" class= "img-fluid"  alt="">
        <br>
        <p>Tijd</p>
            <select class="form-select form-select-lg mb-3" name="tijd" required aria-label=".form-select-lg example">
            <option value="9:20">9:20</option>
            <option value="9:50">9:50</option>
            <option value="10:10">10:10</option>
            <option value="10:30">10:30</option>
            <option value="12:20">12:20</option>
            <option value="13:10">13:10</option>
            <option value="14:50">14:50</option>
            <option value="15:40">15:40</option>
            <option value="16:20">16:20</option>
            <option value="16:30">16:30</option>
            <option selected value="Kies een tijd"></option>
            </select>
        <!-- zit plaatsen form tafel nummers -->
        <p>Kies hier uw tafel nummer</p>
            <select class="form-select form-select-lg mb-3" name="tafelnummer" required aria-label=".form-select-lg example">
            <option selected value="1">tafel 1</option>
            <option selected value="2">tafel 2</option>
            <option selected value="3">tafel 3</option>
            <option selected value="4">tafel 4</option>
            <option selected value="5">tafel 5</option>
            <option selected value="6">tafel 6</option>
            <option selected value="7">tafel 7</option>
            <option selected value="8">tafel 8</option>
            <option selected value="9">tafel 9</option>
            <option selected value="10">tafel 10</option>
            <option selected value="11">tafel 11</option>
            <option selected value="12">tafel 12</option>
            <option selected value="13">tafel 13</option>
            <option selected value="14">tafel 14</option>
            <option selected value="15">tafel 15</option>
            <option selected value="16">tafel 16</option>
            <option selected value="17">tafel 17</option>
            <option selected value="18">tafel 18</option>
            <option selected value=""></option>
            </select>
            <button type="submit" class="btn-lg btn-outline-george" name="submit">Verstuur</button>
            <!-- einde form zitplaatsen -->

        </div>
    </div>
</form>
</div>






