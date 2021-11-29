<?php
  require_once './classes/userController.php';

  class navbarRedirect extends userData
  {
    public $html = null;

    public function __construct() 
    {
      //Get current session e-mail, display in $this->email
      $this->getSessionEmail();
      //Get current session e-mail's role, display in $this->role
      $this->selectRole();
      //Creates navbar HTML based on selected role
      $this->createHTML();
    }

    //Show created navbar HTML
    public function show() 
    {
      echo $html;
    }

    //Create HTML based on $this->role
    protected function createHTML()
    {
      switch ($this->role) 
      {
        case "eigenaar":
          $this->html = "<a class='nav-link george_menu' href='#'>My George</a>";
          $this->html .= "<div class='vl'></div>";
          $this->html .= "<a class='nav-link george_menu' href='logout'>Log Out</a>";
        break;
        case "student":
          $this->html = "<a class='nav-link george_menu' href='student-profile'>My George</a>";
          $this->html .= "<div class='vl'></div>";
          $this->html .= "<a class='nav-link george_menu' href='logout'>Log Out</a>";
        break;
        case "begeleider":
        case "docent":
          $this->html = "<a class='nav-link george_menu' href='#'>My George</a>";
          $this->html .= "<div class='vl'></div>";
          $this->html .= "<a class='nav-link george_menu' href='logout'>Log Out</a>";
        break;
        case "klant":
          $this->html = "<a class='nav-link george_menu' href='customer'>My George</a>";
          $this->html .= "<div class='vl'></div>";
          $this->html .= "<a class='nav-link george_menu' href='logout'>Log Out</a>";
        break;
        default:
          $this->html = "<li class='nav-item dropdown'>";
          $this->html .= "<a class='nav-link dropdown-toggle george_menu' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>";
          $this->html .= "My George";
          $this->html .= "</a>";
          $this->html .= "<div class='dropdown-menu' style='border-radius: 0px; border: 0;' aria-labelledby='navbarDropdown'>";
          $this->html .= "<a class='nav-link george_menu' data-bs-toggle='modal' data-bs-target='#register'>Register</a>";
          $this->html .= "<a class='nav-link george_menu'  href='login' >Login</a>";
          $this->html .= "</div></li>";
      }
    }
    
  }
?>