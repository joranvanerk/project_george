<?php
  require_once './classes/connectDB.php';

  class MailOverview {
    protected $html;

    //Create overview and display it
    public function __construct() {
      $this->getRows();
      $this->createOverview();
      $this->show();
    }

    //Retrieve all rows 
    protected function getRows() {

    }

    //Create overview in $html
    protected function createOverview() {
      $this->html = '<div class="row mail-rows">';
      $this->html .= '<div class="student-mail">';
      $this->html .= '<a href="student-mail?content=hashed_number">Subject: Aanpassing lesrooster <strong>Datum: 17-12-2021</strong><strong>Sender: Hans Odijk</strong></a>';
      $this->html .= '</div>';
      $this->html .= '</div>';

      return $this->html;
    }

    //echo HTML
    protected function show() {
      echo $this->html;
    }
  }

  //Create mailsearch select
  class MailSearch extends userData{
    protected $html;
    protected $data = [];

    //Initialize functions
    public function __construct() {
      $this->getUsers();
      $this->createHTML();
      $this->show();
    }

    //Retrieve all mboutrecht mail senders in an array
    protected function getUsers() {
      global $conn;
      $sql = "SELECT * FROM `medewerker`";
      $query = mysqli_query($conn, $sql);
      $this->data = mysqli_fetch_all($query, MYSQLI_ASSOC);
      var_dump($this->data);

      return $this->data;
    }

    //Create HTML select with all mail senders
    protected function createHTML() {
      $this->html =  "<div class='row'>";
      $this->html .= "<div class='mb-3' style='background-color:#000000; height:1px; width:99%;'></div>";
      $this->html .= "<h1>Mail</h1>";
      $this->html .= "<div class='mb-3' style='background-color:#000000; height:1px; width:99%;'></div>";
      $this->html .= "<form action='' method='get'>";
      $this->html .= "<input type='hidden' name='page' value='mail'>";
      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<select name='search' class='form-control' id='floatingInput'>";
      foreach ($this->data as $d) {
        $this->html .= "<option value='".$d["afkorting"]."'>".$d["voornaam"]." ".$d["achternaam"]."</option>";
      }
      $this->html .= "</select>";
      $this->html .= "<label for='floatingInput'>Search messages from:</label>";
      $this->html .= "</div>";
      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<button type='submit' class='btn btn-outline-george'>Search</button>";
      $this->html .= "<a class='btn btn-cancel' href='student-profile?page=mail'>Remove searchdata</a>";
      $this->html .= "</div>";
      $this->html .= "</form>";
      $this->html .= "</div>";
    }

    protected function show() {
      echo $this->html;
    }
  }
?>