<?php
//Check if user has submitted a form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  //If user send a register $_POST, include register.php
  if (isset($_POST["register"])) {
    //Include required PHP scripts for register process
    include_once("./register-script.php");

  //If user send a login $_POST, include login.php
  } elseif (isset($_POST["login"])) {
    //Include required PHP scripts for login process
    include_once("./login-script.php");

  } else {
    // $_POST value is not register or login
    include_once("./classes/sendMessage.php");
    $msg = new messageError;
    $msg->text = "User did not send a POST value.";
  }
}
?>

<!-- container with content added -->
<div class="container">
  <div style="background-color:#000000; height:1px; width:100%;"></div>
    <div class="text-center" style="margin-bottom: -10px;"><p>Read about <u>Covid-19 virus</u> on our <a><u>information</u></a> page, to get to know about our current rules. 🧍↔️🧍</p></div>
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
          <a class="nav-link dropdown-toggle george_menu <?php if($active_page_filename == 'aboutus.php'){ echo 'george_menu_active';  }?>" href="aboutus" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About us
          </a>
          <div class="dropdown-menu" style="border-radius: 0px; border: 0;" aria-labelledby="navbarDropdown">
            <a class="nav-link george_menu <?php if($active_page_filename == 'aboutus.php'){ echo 'george_menu_active';  }?>" href="aboutus">About us</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'contact.php'){ echo 'george_menu_active';  }?>" href="contact">Contact</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'menu.php'){ echo 'george_menu_active';  }?>" href="menu">Menu</a>
            <a class="nav-link george_menu <?php if($active_page_filename == 'vacatures.php'){ echo 'george_menu_active';  }?>" href="vacatures">Vacatures</a>
          </div>
        </li>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle george_menu" href="reservation" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

        <?php
        if (isset($_SESSION["login"])) {
          if ($_SESSION["login"] === true) {
            echo '<a class="nav-link george_menu" href="mygeorge">My George</a>' ;
            echo '<div class="vl"></div>';
            echo '<a class="nav-link george_menu" href="logout">Log Out</a>';
          } else {
            echo '<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle george_menu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        My George
                      </a>
                      <div class="dropdown-menu" style="border-radius: 0px; border: 0;" aria-labelledby="navbarDropdown">
                        <a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                        <a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                      </div>
                    </li>';
          }
        } else {
          echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle george_menu" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      My George
                    </a>
                    <div class="dropdown-menu" style="border-radius: 0px; border: 0;" aria-labelledby="navbarDropdown">
                      <a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#register">Register</a>
                      <a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#login">Login</a>
                    </div>
                  </li>';
        }?>
        <div class="vl"></div>

      </div>
    </div>
  </div>
  <!-- end of the navbar in the header -->
</nav>
<!-- simple horizontal line -->
<br><div style="background-color:#000000; height:1px; width:100%;"></div>
</div>

<!-- Display message for registration or login situations -->
<div class="msg">
  <?php
    if (isset($_POST["register"])) {
      $msg->show();
      unset($_POST["register"], $_SERVER["REQUEST_METHOD"]);
    } elseif (isset($_POST["login"])) {
      $msg->show();
      unset($_POST["login"], $_SERVER["REQUEST_METHOD"]);
    } elseif (isset($_POST["finregister"])) {
      $msg->show();
      unset($_POST["register"], $_SERVER["REQUEST_METHOD"]);
    } else {
      //Nothing is even set KEKW.
    }
  ?>
</div>

<!-- Modal for Registering -->
<div class="modal fade" id="register" tabindex="-1" aria-labelledby="registerModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="registerModal">Register</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" required>
            <label for="floatingInput">E-mail Address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="confirmemail" >
            <label for="floatingInput">Confirm E-mail Address</label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="checkNewsletter" name="checkNewsletter">
            <label class="form-check-label" for="checkNewsletter">
            Subscribe to our <a class="registerlink" href="./newsletter">Newsletter</a>!
            </label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="checkbox" id="checkGeneralterms" name="checkGeneralterms" >
            <label class="form-check-label" for="checkGeneralterms">
            I agree to the <a class="registerlink" href="./generalterms">General Terms</a> of George Marina.
            </label>
          </div>
          <div class="modal-footer">
            <button type="submit" name="register" class="btn btn-outline-george">Register</button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
