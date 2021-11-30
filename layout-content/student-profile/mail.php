<?php

?>
<!-- Black line -->
<!-- <div class="mb-3" style="background-color:#000000; height:1px; width:100%;"></div> -->
<div class="container mb-1 george_modal">
  <div class="row">
    <div class="mb-3" style="background-color:#000000; height:1px; width:99%;"></div>
    <h1>Mail</h1>
    <div class="mb-3" style="background-color:#000000; height:1px; width:99%;"></div>
    <form action="" method="get">
      <input type="hidden" name="page" value="mail">
      <div class="form-floating mb-3">
        <select name="search" class="form-control" id="floatingInput">
          <option value='HSOK'>Hans</option>
          <option value='JEMX'>Jesse</option>
          <option value='TAIF'>Taif</option>
        </select> 
        <label for="floatingInput">Search messages from:</label>
      </div>
      <div class="form-floating mb-3">
        <button type="submit" class="btn btn-outline-george">Search</button>
        <a class="btn btn-cancel" href="student-profile?page=mail">Remove searchdata</a>
      </div>
    </form>
  </div>
  <div class="row mail-rows">
    <div class="student-mail">
      <a href="student-mail?content=hashed_number">Subject: Aanpassing lesrooster <strong>Datum: 17-12-2021</strong><strong>Sender: Hans Odijk</strong></a>
    </div>
    <div class="student-mail">
      <a href="student-mail?content=hashed_number">Subject: Aanpassing lesrooster <strong>Datum: 17-12-2021</strong><strong>Sender: Hans Odijk</strong></a>
    </div>
    <div class="student-mail">
      <a href="student-mail?content=hashed_number">Subject: Aanpassing lesrooster <strong>Datum: 17-12-2021</strong><strong>Sender: Hans Odijk</strong></a>
    </div>
  </div>
</div>