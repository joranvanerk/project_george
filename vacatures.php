<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);

 ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>

<body>
  <!-- Include Landing Page -->
  <div class="container">
  <h1 id="title_menu"> George Vacatures </h1>

  <div class="card-group">
  <div class="card">
    <img class="card-img-top" src="./img/kok.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Chef</h5>
      <p class="card-text">Sed vulputate odio ut enim blandit volutpat maecenas volutpat blandit.
         Diam sollicitudin tempor id eu nisl nunc mi ipsum faucibus. Vulputate mi sit amet mauris.
          Augue mauris augue neque gravida in fermentum et sollicitudin ac.
         Magnis dis parturient montes nascetur ridiculus. Augue eget arcu dictum varius.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      <button type="button" data-toggle="modal" data-target="#modalchef" class="btn-lg btn-outline-george">Solliciteer nu!</button>
      <div class="modal fade" id="modalchef" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Solliciteren als chef!</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="bookeventani" action="" method="POST">
        <div class="form-floating mb-3">
          <input type="text" name="naam" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Volledige naam</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="postcode" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Postcode</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name=email class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="telefoonnummer" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Phone number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" name="geboortedatum" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Geboortedatum</label>
        </div>
        <div class="d-grid gap-2">
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Sollicitatie verzenden</button>
      </div>
      </form>
    </div>
  </div>
</div>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="./img/serveerder.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Serveerder/Serveerster</h5>
      <p class="card-text">Sit amet aliquam id diam maecenas ultricies. Semper quis lectus nulla at.
         Magna fermentum iaculis eu non diam phasellus vestibulum lorem sed.
          Et malesuada fames ac turpis egestas maecenas pharetra convallis.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      <button type="button" data-toggle="modal" data-target="#serveerdermodal" class="btn-lg btn-outline-george">Solliciteer nu!</button>
      <div class="modal fade" id="serveerdermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle"> Solliciteren als serveerder/serveerster</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="bookeventani">
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Volledige naam</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Postcode</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Phone number</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control formstyle" id="floatingInput" placeholder="George">
          <label for="floatingInput">Hoeveel dagen in de week ben je beschikbaar?</label>
        </div>
        <label for="exampleFormControlFile1">Importeer hier uw cv en uw motivatie brief!</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1">
        <div class="d-grid gap-2">
      </div>
      </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Solliciteer</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
  <div class="card">
    <img class="card-img-top" src="./img/manager.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Restaurant Manager</h5>
      <p class="card-text">Malesuada nunc vel risus commodo viverra maecenas accumsan lacus vel.
         Mattis ullamcorper velit sed ullamcorper morbi tincidunt.
          Auctor elit sed vulputate mi sit amet. Ac turpis egestas sed tempus urna et pharetra pharetra massa.
           Senectus et netus et malesuada.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
      <button type="button" d ata-toggle="modal" data-target="#managermodal" class="btn-lg btn-outline-george">Solliciteer nu!</button>
      <div class="modal fade" id="managermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h
        on type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Solliciteer</button>
      </div>
    </div>
  </div>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Solliciteer</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>

</div>
</div>

</body>

<?php 

if(isset($_POST["submit"])){
$naam = $_POST["naam"];
$postcode = $_POST["postcode"];
$email = $_POST["email"];
$telefoonnummer = $_POST["telefoonnummer"];
$geboortedatum = $_POST["geboortedatum"];

$sql = "INSERT INTO `application` (`applicationid`, `naam`, `postcode`, `telefoonnummer`, `geboortedatum`) VALUES (NULL , '$naam', '$postcode', '$telefoonnummer', '$geboortedatum');";

mysqli_query($conn, $sql);

}

?>
<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>