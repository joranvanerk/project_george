<?php
//Include student-edit.php if user submitted an edit form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  if (isset($_POST["personaldetails"]) || isset($_POST["changepassword"]) || isset($_POST["changepackage"])) {
    include_once("./layout-content/student-profile/edit-script.php");
  } else {
    // $_POST value is not register or login
    include_once("./classes/sendMessage.php");
    $msg = new messageError;
    $msg->text = "User did not send a POST value.";
  }
}

include("./classes/connectDB.php");
include("./classes/userController.php");
$_SESSION["email"] = "327068@student.mboutrecht.nl";

$s = new userData;
$s->selectQuery("student","email", $_SESSION["email"]);

?>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-6">
      <ul>
        <li><a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#personaldetails">Edit personal details</a></li>
        <li><a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#changepassword">Change password</a></li>
        <li><a class="nav-link george_menu" data-bs-toggle="modal" data-bs-target="#changepackage">Change lesson package / teacher</a></li>
      </ul>
    </div>
    <div class="col-sm-12 col-md-6"></div>
  </div>
</div>

<!-- Modal for Personal Details -->
<div class="modal fade" id="personaldetails" tabindex="-1" aria-labelledby="personaldetailsModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="personaldetailsModal">Personal Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="name" value="<?php echo $s->queryData["voornaam"]." ".$s->queryData["achternaam"]; ?>" required>
            <label for="floatingInput">Naam</label>
          </div>
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" name="email" value="<?php echo $s->queryData["email"]; ?>" required>
            <label for="floatingInput">E-mail Address</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="floatingInput" name="phone" value="<?php echo $s->queryData["mobiel"]; ?>" required>
            <label for="floatingInput">Phonenumber</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="region" value="<?php echo $s->queryData["woonplaats"]; ?>" required>
            <label for="floatingInput">Region</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="street" value="<?php echo $s->queryData["straat"]; ?>" required>
            <label for="floatingInput">Streetname + number</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="zip" value="<?php echo $s->queryData["postcode"]; ?>" required>
            <label for="floatingInput">ZIP Code</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="password" required>
            <label for="floatingInput">Enter Password</label>
          </div>
          <div class="modal-footer">
            <button type="submit" name="personaldetails" class="btn btn-outline-george">Submit</button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Change Password -->
<div class="modal fade" id="changepassword" tabindex="-1" aria-labelledby="changepasswordModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="changepasswordModal">Change password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="oldpassword" required>
            <label for="floatingInput">Current Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="newpassword" required>
            <label for="floatingInput">New Password</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="confirmnewpassword" required>
            <label for="floatingInput">Confirm New Password</label>
          </div>
          <div class="modal-footer">
            <button type="submit" name="changepassword" class="btn btn-outline-george">Submit</button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Change Lesson Package / Teacher -->
<div class="modal fade" id="changepackage" tabindex="-1" aria-labelledby="changepackageModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="changepackageModal">Change lesson package</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="lessonpackage" required>
            <label for="floatingInput">Lessonpackage</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" name="teacher" required>
            <label for="floatingInput">Teacher</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" name="password" required>
            <label for="floatingInput">Enter Password</label>
          </div>
          <div class="modal-footer">
            <button type="submit" name="changepackage" class="btn btn-outline-george">Submit</button>
            <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>