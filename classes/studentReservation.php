<?php
  require_once './classes/connectDB.php';

  //Create class studentReservation
  class studentReservation {
    protected $html = null;
    protected $email = null;
    public $message = null;

    //Execute following code block upon invoking class studentReservation
    public function __construct($email) {
      $this->email = $email;
    }

    //Call all required functions to save the selected timeslots
    public function saveTimeslots() {
      $this->verifyData();
      $this->insertTimeslot();
    }

    //Check if correct $_POST is set, sanitize the data and add it into a single dimensional array.
    protected function verifyData() {
      if (isset($_POST["reservation"])) {
        //Declare $data with form data.
        $data = $_POST;
        //Declare lesson package
        $lessonpackage = "Cook";
        //Declare available times a student is able to book.
        $available_times = ["18:00", "19:00", "20:00"];
        //Get first part of e-mail of student.
        $split = explode("@", $email);
        $student = $split[0];
        //Get current weeknumber
        $week = date('W');        

        var_dump($_POST);
        
        //Create an insert into SQL and send it to the database for each timeslot.
        foreach ($data as $date => $miniArr) {
          if ($date !== "reservation") {
            if (is_array($miniArr)) {
              foreach ($miniArr as $v => $timeslot) {
                //Sanitize selected day and timeslot
                $date = sanitize($date);
                $timeslot = sanitize($timeslot);

                //Check if send $_POST timeslot is a valid time
                if (in_array($timeslot, $available_times)) {
                  global $conn;

                  $sql = "INSERT INTO `student-timeslot` (`timeslotid`, 
                                                          `weeknr`, 
                                                          `date`, 
                                                          `timeslot`, 
                                                          `student`, 
                                                          `lessonpackage`, 
                                                          `createdAt`) 
                                                        VALUES (NULL, 
                                                        '".$week."', 
                                                        '".$date."', 
                                                        '".$timeslot."', 
                                                        '".$student."', 
                                                        '".$lessonpackage."', 
                                                        current_timestamp());";

                  $query = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($query) === 1) {
                    $this->message = "Successfully edited";
                  }
                } else {
                  $this->message = "The selected timeslot is not a valid input.";
                  return $this->message;
                }
              }
            }
          }
        }
      } else {
        return false;
      }
    }

    //Create SQL insert and send it ito the database
    public function insertTimeslot() {
      global $conn;

      $sql = "INSERT INTO ``";
    }

    //Create tab content
    public function createTabContent() {
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
        $this->html .= "<select multiple class='form-control' id='".$day."' name='".$day."[]'>";
        $this->html .= "<option value='18:00'>18:00 - 19:00</option>";
        $this->html .= "<option value='19:00'>19:00 - 20:00</option>";
        $this->html .= "<option value='20:00'>20:00 - 21:00</option>";
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