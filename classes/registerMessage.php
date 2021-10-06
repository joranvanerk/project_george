<?php 

class Message {

  public $html;

  //Status must be defined by an error or success.
  public $status;
  //CSS values set depending on $status
  public $msgType;
  public $msgCSS;
  public $btnCSS;

  public $msg;

  //Activate the generate_html function and put it in $this
  public function __construct() 
  {
    $this->generate_msg();
  }

  //Function to create HTML content in $this
  public function generate_msg() 
  { 
    $this->html = '<div class="register '. $this->msgType .'" id="errorMessage">';
    $this->html .= '<button class="'. $this->msgCSS .'" onclick="disableError()">' . $this->msg . ' <span class="' . $this->btnCSS . '">x</span>';
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
    //Status must be defined by an error or success.
    public $status = "error";
    //CSS values set depending on $status
    public $msgType = "error-message";
    public $msgCSS = "error-button";
    public $btnCSS = "error-btn";
    //Message string that should be send with the popup.
    public $msg = "Something went wrong whilst registering. Please try again.";
}

class registerSuccess extends Message {
    //Status must be defined by an error or success.
    public $status = "success";
    //CSS values set depending on $status
    public $msgType = "";
    public $msgCSS = "";
    public $btnCSS = "";
    //Message string that should be send with the popup.
    public $msg = "";
}

class loginError extends Message {
    //Status must be defined by an error or success.
    public $status;
    //CSS values set depending on $status.
    public $msgType = "";
    public $msgCSS = "";
    public $btnCSS = "";
    //Message string that should be send with the popup.
    public $msg = "";
}

class loginSuccess extends Message {
  //Status must be defined by an error or success.
  public $status;
  //CSS values set depending on $status.
  public $msgType = "";
  public $msgCSS = "";
  public $btnCSS = "";
  //Message string that should be send with the popup.
  public $msg = "";
}
?>