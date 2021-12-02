<?php
require_once './classes/studentMail.php';
?>
<!-- Black line -->
<!-- <div class="mb-3" style="background-color:#000000; height:1px; width:100%;"></div> -->
<div class="container mb-1 george_modal">
  <!-- Generate searchmail row -->
  <?php new MailSearch; ?>
  <!-- Generate mailoverview row(s)-->
  <?php new MailOverview; ?>
</div>