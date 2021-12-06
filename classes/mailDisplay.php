<?php
  class mailDisplay {
    protected $id;
    protected $html;

    public function __construct($id) {
      $this->id = $id;
      $this->getMail();
      $this->mailDisplay();
      var_dump($this->id);
      // $this->mailDisplay();
    }

    protected function getMail() {

    }

    //Create HTML for sending mail
    protected function mailDisplay() {
      $this->html =  "<form class='george_modal'>";
      
      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<input class='form-control' id='floatingInput' type='text' value='xxx' readonly>";
      $this->html .= "<label for='floatingInput'>From:</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<input class='form-control' id='floatingInput' type='text' value='xxx' readonly>";
      $this->html .= "<label for='floatingInput'>To:</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<input type='text' class='form-control' id='floatingInput' value='xxx' readonly>";
      $this->html .= "<label for='floatingInput'>Subject</label>";
      $this->html .= "</div>";

      $this->html .= "<div class='form-floating mb-3'>";
      $this->html .= "<textarea class='form-control' name='text' id='floatingInput' cols='30' rows='10' readonly>xxx</textarea>";
      $this->html .= "<label for='floatingInput'>Mail Content:</label>";
      $this->html .= "</div>";
      
      $this->html .= "</form>";
    }

    public function show() {
      echo $this->html;
    }
  }
?>
