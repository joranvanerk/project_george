<?php 

class Message {

  public $html;
  //CSS values set depending on $status
  public $msgType;
  public $msgCSS;
  public $btnCSS;

  //Activate the generate_html function and put it in $this
  // public function __construct() 
  // {
  //   $this->generate_msg();
  // }

  //Function to create HTML content in $this
  public function generate_msg($i) 
  { 
    $this->html = '<div class="message '. $this->msgType .'" id="errorMessage">';
    $this->html .= '<button class="'. $this->msgCSS .'" onclick="disableMessage()">' . $i . ' <span class="' . $this->btnCSS . '">x</span>';
    $this->html .= '</button>';
    $this->html .= '</div>';
  }

  //Echo HTML created in $this->html
  public function show() 
  {
    echo $this->html;
  }
}

class messageError extends Message {
    //CSS values set depending on $status
    public $msgType = "error-message";
    public $msgCSS = "error-button";
    public $btnCSS = "error-btn";
}

class messageSuccess extends Message {
    //CSS values set depending on $status
    public $msgType = "success-message";
    public $msgCSS = "success-button";
    public $btnCSS = "success-btn";
}
?>