<?php
//Security has to be added so only student has access to these pages
//Session has to give me the logged in user
if (isset($_POST["personaldetails"])) {
$edit = new studentEditDetails(
        $_SESSION["email"], 
        $_POST["name"], 
        $_POST["phone"], 
        $_POST["region"], 
        $_POST["street"], 
        $_POST["zip"], 
        $_POST["password"]);
        
        header("LOcation: ./student-profile?page=myprofile");
} else if (isset($_POST["changepassword"])) {
echo "pw";
} else if (isset($_POST["changepackage"])) {
echo "packge";
} else {
  echo "Error 404";
}
?>