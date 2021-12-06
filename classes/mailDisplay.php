<?php
  require_once './classes/connectDB.php';

  class mailDisplay {
    protected $id;
    protected $html;
    protected $data;

    public function __construct($id) {
      $this->id = $id;
      $this->getMail();
      if ($this->confirmUser()) {
        $this->mailDisplay();
      } else {
        echo '<meta http-equiv="refresh" content="0; URL=./error404">';
      }
    }

    //Retrieves e-mail content from database and returns in $this->data
    protected function getMail() {
      global $conn;

      $sql = "SELECT * FROM `mail` WHERE `salt` = '".$this->id."';";
      $query = mysqli_query($conn, $sql);

      //Fetch data if email id (salt) exists
      if (mysqli_num_rows($query) === 1) {
        $assoc = mysqli_fetch_all($query, MYSQLI_ASSOC);
        $this->data = $assoc;
        return $this->data;
      } else {
        //id bestaat niet, e-mail kan niet worden opgehaald
        echo '<meta http-equiv="refresh" content="0; URL=./error404">';
        return;
      }
    }

    //Checks if current logged in student user is either receiver or sender of the mail.
    protected function confirmUser() {
      $user = $_SESSION["email"];
      $id = explode("@", $_SESSION["email"]);

      foreach ($this->data as $d) {
        if ($d["van"] = $id[0] || $d["naar"] = $id[0]) {
          return true;
        } else {
          return false;
        }
      }
    }

    //Create HTML for displaying e-mail on page
    protected function mailDisplay() {
      foreach ($this->data as $d) {
        $this->html =  "<div class='buttons'>";
        $this->html .= "<a style='width: 49%;' class='btn btn-cancel' href='student-profile?page=mail'>Respond to mail</a>";
        $this->html .= "<a style='width: 49%;' class='btn btn-cancel' href='student-profile?page=mail'>Return to mail overview</a>";
        $this->html .= "</div>";

        $this->html .= "<div class='content'>";
        $this->html .= "<form class='george_modal'>";

        $this->html .= "<div class='form-floating mb-3'>";
        $this->html .= "<input type='text' class='form-control' id='floatingInput' value='".$d["createdAt"]."' readonly>";
        $this->html .= "<label for='floatingInput'>Date</label>";
        $this->html .= "</div>";
        
        $this->html .= "<div class='form-floating mb-3'>";
        $this->html .= "<input class='form-control' id='floatingInput' type='text' value='".$d["van"]."' readonly>";
        $this->html .= "<label for='floatingInput'>From:</label>";
        $this->html .= "</div>";

        $this->html .= "<div class='form-floating mb-3'>";
        $this->html .= "<input class='form-control' id='floatingInput' type='text' value='".$d["naar"]."' readonly>";
        $this->html .= "<label for='floatingInput'>To:</label>";
        $this->html .= "</div>";

        $this->html .= "<div class='form-floating mb-3'>";
        $this->html .= "<input type='text' class='form-control' id='floatingInput' value='".$d["onderwerp"]."' readonly>";
        $this->html .= "<label for='floatingInput'>Subject</label>";
        $this->html .= "</div>";

        $this->html .= "<div class='form-floating mb-3'>";
        $this->html .= "<textarea class='form-control' name='text' id='floatingInput' cols='30' rows='10' readonly>".$d["tekst"]."</textarea>";
        $this->html .= "<label for='floatingInput'>Mail Content:</label>";
        $this->html .= "</div>";
        
        $this->html .= "</form>";
        $this->html .= "</div>";
      }
      

      return $this->html;
    }

    public function show() {
      echo $this->html;
    }
  }
?>
