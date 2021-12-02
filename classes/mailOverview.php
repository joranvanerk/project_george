<?php
  require_once './classes/connectDB.php';

  //This class creates the mail overview.
  class mailOverview {
    protected $html = null;
    protected $user = null;
    protected $data = [];
    public $argument = null;

    //Create overview and display it
    public function __construct() {
      $this->getArgument();
      $this->getDisplayData();
      //If found data is not empty, create an overview.
      if (!empty($this->data)) {
        $this->createOverview();
      } else {
        $this->emptyOverview();
      }
      //Show created overview
      $this->show();
    }

    //Retrieve required arguments to sort e-mails
    protected function getArgument() {
      //Retrieve student number based on session e-mail
      $e = explode("@", $_SESSION["email"]);
      if ($e[1] === "student.mboutrecht.nl") {
        $this->user = $e[0];
      }
      //Retrieve search variable based on user selection
      if (isset($_GET["search"])) {
        $this->argument = strtolower($_GET["search"]);
      } else {
        $this->argument = strtolower("all");
      }
      
      return $this->argument;
    }

    //Put all displayData in an array
    protected function getDisplayData() {
      global $conn;
      if ($this->argument === "all") {
        $sql = "SELECT * FROM `mail` WHERE `van` = '".$this->user."';";
        $query = mysqli_query($conn, $sql);
        $this->data = mysqli_fetch_all($query, MYSQLI_ASSOC);
      } else {
        $sql = "SELECT * FROM `mail` WHERE `van` = ".$this->user." AND `naar` = '".$this->argument."';";
        $query = mysqli_query($conn, $sql);
        $this->data = mysqli_fetch_all($query, MYSQLI_ASSOC);
      }

      return $this->data;
    }

    //Create overview in $html
    protected function createOverview() {
      $this->html =  '<div class="row mail-rows">';
      foreach ($this->data as $d) {
        $this->html .= '<div class="student-mail">';
        $this->html .= '<a href="student-mail?content='.$d["salt"].'">Subject: '.$d["onderwerp"].' <strong>Datum: '.$d["createdAt"].'</strong><strong>To: '.$d["naar"].'</strong><strong>From: '.$d["van"].'</strong></a>';
        $this->html .= '</div>';
      }
      $this->html .= '</div>';

      return $this->html;
    }

    //Create empty mailbox message
    protected function emptyOverview() {
      $this->html = '<div class="row mail-rows">';
      $this->html .= '<div class="student-mail">';
      $this->html .= '<a>No mails found.</a>';
      $this->html .= '</div>';
      $this->html .= '</div>';

      return $this->html;
    }

    //echo HTML
    protected function show() {
      echo $this->html;
    }
  }

  //This class creates the select bar for searching mails based on e-mail addresses.
  class mailSearchBar extends userData{
    protected $html = null;
    protected $data = [];

    //Initialize functions
    public function __construct() {
      $this->getEmployee();
      $this->createHTML();
      $this->show();
    }

    //Retrieve all mboutrecht mail senders in an array
    protected function getEmployee() {
      global $conn;
      $sql = "SELECT * FROM `medewerker`";
      $query = mysqli_query($conn, $sql);
      $this->data = mysqli_fetch_all($query, MYSQLI_ASSOC);

      return $this->data;
    }

    //Create HTML select with all mail senders
    protected function createHTML() {
      $this->html =  "<div class='row'>";
      $this->html .= "<div class='mb-3' style='background-color:#000000; height:1px; width:99%;'></div>";
      $this->html .= "<h1>Mail<a class='btn btn-sendmail' data-bs-toggle='modal' data-bs-target='#sendmail'>Send mail</a></h1>";
      $this->html .= "<div class='mb-3' style='background-color:#000000; height:1px; width:99%;'></div>";
      $this->html .= "<form action='' method='get'>";
      $this->html .= "<input type='hidden' name='page' value='mail'>";
      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<select name='search' class='form-control' id='floatingInput'>";
      $this->html .= "<option value='all'>Alle emails</option>";
      foreach ($this->data as $d) {
        $this->html .= "<option ";
        //Make option selected if it's being searched by the user.
        if (isset($_GET["search"])) {
          if (strtolower($_GET["search"]) === strtolower($d["afkorting"])) {
            $this->html .= " selected ";
          }
        }
        $this->html .= " value='".$d["afkorting"]."'>".$d["voornaam"]." ".$d["achternaam"]."</option>";
      }
      $this->html .= "</select>";
      $this->html .= "<label for='floatingInput'>Search messages from:</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<button type='submit' class='btn btn-outline-george'>Search</button>";
      $this->html .= "<a class='btn btn-cancel' href='student-profile?page=mail'>Remove searchdata</a>";
      $this->html .= "</div></form></div>";
    }

    protected function show() {
      echo $this->html;
    }
  }

  //Creates a form with active employees on the website.
  class mailForm extends mailSearchBar {
    public function __construct() {
      $this->getEmployee();
      $this->createSendMailHTML();
      $this->show();
    }

    //Create HTML for sending mail
    protected function createSendMailHTML() {
      $this->html =  "<form action='' method='POST'>";
      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<input class='form-control' type='text' name='from' placeholder='".$_SESSION["email"]."' value='".$_SESSION["email"]."' readonly>";
      $this->html .= "<label for='floatingInput'>From:</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<select name='to' class='form-control' id='floatingInput'>";
      foreach ($this->data as $d) {
        $this->html .= "<option value='".$d["afkorting"]."'>".$d["email"]."</option>";
      }
      $this->html .= "</select><label for='floatingInput'>To:</label></div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<input type='text' class='form-control' id='floatingInput' name='subject' required>";
      $this->html .= "<label for='floatingInput'>Subject</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<textarea class='form-control' name='text' id='floatingInput' cols='30' rows='10'></textarea>";
      $this->html .= "<label for='floatingInput'>Enter text:</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='modal-footer'>";
      $this->html .= "<button type='submit' name='sendmail' class='btn btn-outline-george'>Submit</button>";
      $this->html .= "<button type='button' class='btn btn-cancel' data-bs-dismiss='modal'>Cancel</button>";
      $this->html .= "</div></form>";
    }
  }
?>