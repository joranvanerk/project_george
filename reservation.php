<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php"); ?>
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
            <input type="text" class="form-control mb-2" placeholder="voornaam" aria-label="First name">
            <input type="text" class="form-control mb-2" placeholder="achternaam" aria-label="Last name">
            <input type="text" class="form-control mb-2" placeholder="vul hier uw email in" aria-label="e-mail">
            <input type="text" class="form-control mb-2" placeholder="+31 mobiel" aria-label="tel">
        </div>
        <!-- Foto/tekst -->
        <div class=" vl col-sm-12 col-md-6">
        <h3 style="text-align:center">je kanker moeder</h3>
        </div>
    </div>
</div>
<!-- form einde naam achternaam -->



       
<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>