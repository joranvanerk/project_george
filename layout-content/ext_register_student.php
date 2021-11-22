<?php
//Get userrole based on email
include_once("./classes/userController.php");
$role = new userRegister;
$role->email = $_GET["email"];
$role->selectRole();

//Extend register.php page with more Fields for required information if userrole is student
if ($role->role === "student") {
  
  $html =  '<div class="form-floating mb-3">';
  $html .= '<input type="text" class="form-control" id="floatingInput" name="address" required>';
  $html .= '<label for="floatingInput">Address</label>';
  $html .= '</div>';
  $html .= '<div class="form-floating mb-3">';
  $html .= '<input type="text" class="form-control" id="floatingInput" name="zip" required>';
  $html .= '<label for="floatingInput">ZIP Code</label>';
  $html .= '</div>';
  $html .= '<div class="form-floating mb-3">';
  $html .= '<input type="text" class="form-control" id="floatingInput" name="region" required>';
  $html .= '<label for="floatingInput">Region</label>';
  $html .= '</div>';
  $html .= '<div class="form-floating mb-3">';
  $html .= '<select name="teacher" class="form-control">';
  $html .= '<option selected>HSOK</option>';
  $html .= '<option>ANTOL</option>';
  $html .= '<option>TAIF</option>';
  $html .= '</select>';
  $html .= '<label for="floatingInput">Select your Teacher</label>';
  $html .= '</div>';
  $html .= '<div class="form-floating mb-3">';
  $html .= '<select name="lessonpackage" class="form-control">';
  $html .= '<option>Cook</option>';
  $html .= '<option>Bartender</option>';
  $html .= '<option>Waiter</option>';
  $html .= '<option selected>General</option>';
  $html .= '</select>';
  $html .= '<label for="floatingInput">Select your Lesson Package</label>';
  $html .= '</div>';
  $html .= '<input type="hidden" value="student" name="role">';
  
  echo $html;
}
?>