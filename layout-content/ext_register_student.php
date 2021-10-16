<?php
//Get userrole based on email
include_once("./classes/userController.php");
$role = new userRegister;
$role->email = $_GET["email"];
$role->selectRole();

//Extend register.php page with more Fields for required information if userrole is student
if ($role->role === "student") {
  
  $str =  '<div class="form-floating mb-3">';
  $str .= '<input type="text" class="form-control" id="floatingInput" name="address" required>';
  $str .= '<label for="floatingInput">Address</label>';
  $str .= '</div>';
  $str .= '<div class="form-floating mb-3">';
  $str .= '<input type="text" class="form-control" id="floatingInput" name="zip" required>';
  $str .= '<label for="floatingInput">ZIP Code</label>';
  $str .= '</div>';
  $str .= '<div class="form-floating mb-3">';
  $str .= '<input type="text" class="form-control" id="floatingInput" name="region" required>';
  $str .= '<label for="floatingInput">Region</label>';
  $str .= '</div>';
  $str .= '<div class="form-floating mb-3">';
  $str .= '<select name="teacher" class="form-control">';
  $str .= '<option selected>HSOK</option>';
  $str .= '<option>ANTOL</option>';
  $str .= '<option>TAIF</option>';
  $str .= '</select>';
  $str .= '<label for="floatingInput">Select your Teacher</label>';
  $str .= '</div>';
  $str .= '<div class="form-floating mb-3">';
  $str .= '<select name="lessonpackage" class="form-control">';
  $str .= '<option>Cook</option>';
  $str .= '<option>Bartender</option>';
  $str .= '<option>Waiter</option>';
  $str .= '<option selected>General</option>';
  $str .= '</select>';
  $str .= '<label for="floatingInput">Select your Lesson Package</label>';
  $str .= '</div>';
  $str .= '<input type="hidden" value="student" name="role">';
  
  echo $str;
}
?>