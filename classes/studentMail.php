<?php
  require_once './classes/userController.php';

  class Overview {
    protected $html;

    public function __construct() {
      $this->createOverview();
      $this->show();
    }

    protected function createOverview() {
      $this->html = '<div class="student-mail">';
      $this->html .= '<a href="student-mail?content=hashed_number">Subject: Aanpassing lesrooster <strong>Datum: 17-12-2021</strong><strong>Sender: Hans Odijk</strong></a>';
      $this->html .= '</div>';

      return $this->html;
    }

    //echo HTML
    protected function show() {
      echo $this->html;
    }
  }

?>