<?php
//Security has to be added so only student has access to these pages
if (isset($_POST["personaldetails"])) {
echo "personald";
} else if (isset($_POST["changepassword"])) {
echo "pw";
} else if (isset($_POST["changepackage"])) {
echo "packge";
} else {
  echo "Error 404";
}
?>