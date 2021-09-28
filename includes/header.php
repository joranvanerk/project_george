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
        <a class="nav-link george_menu <?php if($active_page_filename == 'aboutus.php'){ echo 'george_menu_active';  }?>" href="aboutus">About us</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a class="nav-link george_menu <?php if($active_page_filename == 'contact.php'){ echo 'george_menu_active';  }?>" href="contact">Contact</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a class="nav-link george_menu <?php if($active_page_filename == 'menu.php'){ echo 'george_menu_active';  }?>" href="menu">Menu</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a class="nav-link george_menu <?php if($active_page_filename == 'reservation.php'){ echo 'george_menu_active';  }?>" href="reservation">Reservation</a>
        <!-- simple vertical line -->
        <div class="vl"></div>
        <!-- navigation element for redirection to page -->
        <a class="nav-link george_menu <?php if($active_page_filename == 'bookevent.php'){ echo 'george_menu_active';  }?>" href="bookevent">Book an event</a>
      </div>
    </div>
  </div>
  <!-- end of the navbar in the header -->
</nav>
<!-- simple horizontal line -->
<br><div style="background-color:#000000; height:1px; width:100%;"></div>
</div>
