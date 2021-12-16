<?php
  require_once './classes/connectDB.php';

  // echo date( 'Y-m-d', strtotime( "this monday" ));
  // echo date( 'Y-m-d', strtotime( "previous monday" ));
  // echo date( 'Y-m-d', strtotime( "today" ));
  // echo date( 'Y-m-d', strtotime( "next friday" ));
  // echo date( 'Y-m-d', strtotime( "previous friday" ));
  // echo date( 'Y-m-d', strtotime( 'wednesday this week' ) );

  // echo date( 'Y-m-d', strtotime( "monday this week" ));echo "<br>";
  // echo date( 'Y-m-d', strtotime( "tuesday this week" ));echo "<br>";
  // echo date( 'Y-m-d', strtotime( "wednesday this week" ));echo "<br>";
  // echo date( 'Y-m-d', strtotime( "thursday this week" ));echo "<br>";
  // echo date( 'Y-m-d', strtotime( "friday this week" ));echo "<br>";

  // //Today
  // echo "<br>";
  // echo date('l', strtotime('today'));

  //Create class studentReservation
  class studentReservation {
    protected $html = null;

    //Execute following code block upon invoking class studentReservation
    public function __construct() {
      $this->createTabContent();
    }

    //Create tab content
    protected function createTabContent() {
      //Get current weeknumber
      $week = date('W');

      //Get current weekdates (year, month, day)
      $weekdays = array(
        "monday" => date( 'Y-m-d', strtotime( "monday this week" )),
        "tuesday" => date( 'Y-m-d', strtotime( "tuesday this week" )),
        "wednesday" => date( 'Y-m-d', strtotime( "wednesday this week" )),
        "thursday" => date( 'Y-m-d', strtotime( "thursday this week" )),
        "friday" => date( 'Y-m-d', strtotime( "friday this week" ))
      );

      $this->html = "";

      foreach ($weekdays as $day => $date) {
        if ($date != date( 'Y-m-d', strtotime( "monday this week" ))) {
          $this->html .= "<div id='".$day."' class='tab-pane fade'>";
        } else {
          $this->html .= "<div id='".$day."' class='tab-pane fade in active'>";
        }
        $this->html .= "<div class='form-group'>";
        $this->html .= "<label for='".$day."'>Available timeslots for: ".$day."</label>";
        $this->html .= "<select multiple class='form-control' id='".$date."' name='".$day."'>";
        $this->html .= "<option>18:00 - 19:00</option>";
        $this->html .= "<option>19:00 - 20:00</option>";
        $this->html .= "<option>20:00 - 21:00</option>";
        $this->html .= "</select>";
        $this->html .= "</div>";
        $this->html .= "</div>";
      }
    }

    //Echo created html
    public function show() {
      echo $this->html;
    }

  }
?>