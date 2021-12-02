<?php
require_once './classes/mailOverview.php';
?>
<!-- Black line -->
<!-- <div class="mb-3" style="background-color:#000000; height:1px; width:100%;"></div> -->
<div class="container mb-1 george_modal">
  <!-- Generate searchbar mail and overview -->
  <?php new mailSearchBar; new mailOverview; ?>
</div>

<!-- Modal for Sending mail -->
<div class="modal fade" id="sendmail" tabindex="-1" aria-labelledby="sendmailModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content george_modal">
      <div class="modal-header">
        <h5 class="modal-title george_title" id="sendmailModal">Send Mail</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Echo HTML created in mailForm -->
        <?php new mailForm; ?>
      </div>
    </div>
  </div>
</div>