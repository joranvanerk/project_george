<?php
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
  $str .= '<option selected>Hans Odijk</option>';
  $str .= '<option>Taif Xeo</option>';
  $str .= '<option>Marja van Hombergh</option>';
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
}
?>