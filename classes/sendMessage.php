<?php 

class Message {

  public $html;
  //CSS values set depending on $status
  public $msgType;
  public $msgCSS;
  public $btnCSS;

  public $text;

  //Activate the generate_html function and put it in $this
  public function __construct() 
  {
    $this->generate_msg();
  }

  //Function to create HTML content in $this
  public function generate_msg() 
  { 
    $this->html = '<div class="register '. $this->msgType .'" id="errorMessage">';
    $this->html .= '<button class="'. $this->msgCSS .'" onclick="disableMessage()">' . $this->text . ' <span class="' . $this->btnCSS . '">x</span>';
    $this->html .= '</button>';
    $this->html .= '</div>';
  }

  //Echo HTML created in $this->html
  public function show() 
  {
    echo $this->html;
  }
}

class registerError extends Message {
    //CSS values set depending on $status
    public $msgType = "error-message";
    public $msgCSS = "error-button";
    public $btnCSS = "error-btn";
    //Message string that should be send with the popup.
    public $text = "Error during registering. Try again.";
}

class registerSuccess extends Message {
    //CSS values set depending on $status
    public $msgType = "success-message";
    public $msgCSS = "success-button";
    public $btnCSS = "success-btn";
    //Message string that should be send with the popup.
    public $text = "Successfully registered. Check your e-mail to verify.";
}

class loginError extends Message {
    //CSS values set depending on $status.
    public $msgType = "";
    public $msgCSS = "";
    public $btnCSS = "";
    //Message string that should be send with the popup.
    public $text = "";
}

class loginSuccess extends Message {
  //CSS values set depending on $status.
  public $msgType = "";
  public $msgCSS = "";
  public $btnCSS = "";
  //Message string that should be send with the popup.
  public $text = "";
}
?>