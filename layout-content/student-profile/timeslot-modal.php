<!-- Modal for Placing a reservation -->
<div class="modal fade" id="reservation" tabindex="-1" aria-labelledby="reservationModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="reservationModal">Reserve a time slot</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <ul class="nav nav-pill">
            <li class="nav-item"><a class="nav-link active" data-toggle="pill" href="#monday">Monday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#tuesday">Tuesday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#wednesday">Wednesday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#thursday">Thursday</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="pill" href="#friday">Friday</a></li>
          </ul>

          <div class="tab-content">
            <div id="monday" class="tab-pane fade in active">
              <div class="form-group">
                <label for="monday">Available timeslots for: Monday</label>
                <select multiple class="form-control" id="monday" name="monday">
                  <option>18:00 - 19:00</option>
                  <option>19:00 - 20:00</option>
                  <option>20:00 - 21:00</option>
                </select>
              </div>
            </div>
            <div id="tuesday" class="tab-pane fade">
            <div class="form-group">
                <label for="tuesday">Available timeslots for: Tuesday</label>
                <select multiple class="form-control" id="tuesday" name="tuesday">
                  <option>18:00 - 19:00</option>
                  <option>19:00 - 20:00</option>
                  <option>20:00 - 21:00</option>
                </select>
              </div>
            </div>
            <div id="wednesday" class="tab-pane fade">
            <div class="form-group">
                <label for="wednesday">Available timeslots for: Wednesday</label>
                <select multiple class="form-control" id="wednesday" name="wednesday">
                  <option>18:00 - 19:00</option>
                  <option>19:00 - 20:00</option>
                  <option>20:00 - 21:00</option>
                </select>
              </div>
            </div>
            <div id="thursday" class="tab-pane fade">
            <div class="form-group">
                <label for="thursday">Available timeslots for: Thursday</label>
                <select multiple class="form-control" id="thursday" name="thursday">
                  <option>18:00 - 19:00</option>
                  <option>19:00 - 20:00</option>
                  <option>20:00 - 21:00</option>
                </select>
              </div>
            </div>
            <div id="friday" class="tab-pane fade">
            <div class="form-group">
                <label for="friday">Available timeslots for: Friday</label>
                <select multiple class="form-control" id="friday" name="friday">
                  <option>18:00 - 19:00</option>
                  <option>19:00 - 20:00</option>
                  <option>20:00 - 21:00</option>
                </select>
              </div>
            </div>
          </div>
            <button style="width: 100%;" type="submit" name="reservation" class="btn btn-outline-george mb-2">Submit</button>
            <button style="width: 100%;" type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>