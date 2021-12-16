<?php
//Required classes
require_once './classes/studentReservation.php';

// Generate Tab content 
$reservation = new studentReservation;
?>

<!-- Modal for Placing a reservation -->
<div class="modal fade" id="reservation" tabindex="-1" aria-labelledby="reservationModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="reservationModal">Reserve a time slot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="test" method="POST">
          <ul class="nav nav-pills">
            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#monday">Monday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tuesday">Tuesday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#wednesday">Wednesday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#thursday">Thursday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#friday">Friday</a></li>
          </ul>

          <div class="tab-content">
            <!-- Display content on student reservation base -->
            <?php $reservation->show(); ?>
          </div>
            <button style="width: 100%;" type="submit" name="reservation" class="btn btn-outline-george mt-2">Submit</button>
            <button style="width: 100%;" type="button" class="btn btn-cancel mt-2" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>