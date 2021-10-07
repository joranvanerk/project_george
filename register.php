<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

// basefile management system for header
$active_page_filename = basename(__FILE__);

//include header
include_once("./includes/header.php");
?>

<div class="container">
  <div class="row">
    <div class="col-12 text-center">
      <h3 class="george_title mt-4 mb-4">Finish Registering</h3>
    </div>
  </div>
  <!-- Black line -->
  <div class="mt-2 mb-4" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <!-- Form to fill out the required information to finish registering -->
    <div class="offset-sm-0 offset-md-1 col-sm-6 col-md-5 george_modal">
      <form action="./register-script.php" method="POST">
        <div class="form-floating mb-3">
          <input type="email" class="form-control" id="floatingInput" name="email" value="emailisalreadyset" required>
          <label for="floatingInput">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput" name="password" required>
          <label for="floatingInput">Enter Password</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="floatingInput" name="confirmpassword" required>
          <label for="floatingInput">Enter password again</label>
        </div>
        <div class="form-floating mb-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="roleSelect">Role</label>
            </div>
            <select class="custom-select" id="roleSelect">
              <option value="customer" selected>Customer</option>
              <option value="student">Student</option>
              <option value="companion">Companion</option>
              <option value="teacher">Teacher</option>
            </select>
          </div>
        </div>
        <div class="form-floating mb-3">
          <button type="submit" name="changepassword" class="btn btn-outline-george">Finish Register Process</button>
        </div>
      </form>
    </div>
    <div class="col-sm-6 col-md-5">
      <img src="./img/almostthere.png" alt="Almost There!" class="img-fluid">
    </div>
  </div>
</div>


<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>