<!-- container with content added -->
<div class="container">
  <!-- simple horizontal line -->
  <div style="background-color:#000000; height:1px; width:100%;"></div><br>
    <!-- start of the navbar in the header -->
    <nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a  href="./" style="text-decoration: none;"><h1 class="george_title george_title_animation">George</h1></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="nav">
      <div class="navbar-nav">
        <a class="nav-link george_menu <?php if($active_page_filename == 'index.php'){ echo 'george_menu_active';  }?>" aria-current="page" href="index">Home</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle george_menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About us
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="nav-link george_menu <?php if($active_page_filename == 'aboutus.php'){ echo 'george_menu_active';  }?>" href="aboutus">About us</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'contact.php'){ echo 'george_menu_active';  }?>" href="contact">Contact</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'menu.php'){ echo 'george_menu_active';  }?>" href="menu">Menu</a>
          </div>
        </li>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle george_menu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reservation
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="nav-link george_menu <?php if($active_page_filename == 'reservation.php'){ echo 'george_menu_active';  }?>" href="reservation">Reservation</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'bookevent.php'){ echo 'george_menu_active';  }?>" href="bookevent">Book an event</a>
          </div>
        </li>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a type="button" class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#aanvraag">Register</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a class="nav-link george_menu" href="login">Login</a>
      </div>
    </div>
  </div>
  <!-- end of the navbar in the header -->
</nav>
<!-- simple horizontal line -->
<br><div style="background-color:#000000; height:1px; width:100%;"></div>
</div>

<!-- Modal for Registering -->
<div class="modal fade" id="aanvraag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Register</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <form action=".../register.php" method="POST">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="naam" required placeholder="name@example.com" value="">
                <label for="floatingInput">Naam</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="titel" required placeholder="name@example.com">
                <label for="floatingInput">Titel</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="artiest" required placeholder="name@example.com">
                <label for="floatingInput">Artiest</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="bericht" placeholder="name@example.com">
                <label for="floatingInput">Extra bericht</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="bericht" placeholder="name@example.com">
                <label for="floatingInput">button check xx</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="bericht" placeholder="name@example.com">
                <label for="floatingInput">button check xx</label>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren</button>
            <button type="submit" name="aanvraag" class="btn btn-primary">Aanvragen</button>
            </form>
          </div>
        </div>
      </div>
    </div>