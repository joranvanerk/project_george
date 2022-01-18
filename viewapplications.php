<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);

 ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>

<body>
<div class="container student-info">
  <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <div class="col-12">
      <h2>Job Applications</h2>
      <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Serveerster sollicitatie, ....... ........</h5>
    <p class="card-text">Brian Segakindi, 3438HJ, brian.segakindi@gmail.com, 0622334455, / </p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Chef sollicitatie, ....... ........</h5>
    <p class="card-text">Test Test, 1111AA, test@mail.com, 0611111111, / </p>
  </div>
</div>
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Chef sollicitatie, ....... ........</h5>
    <p class="card-text">Jan Test, 2222AA, testmail@mail.com, 0611111111, / </p>
  </div>
</div>

<div class="container student-options">
  <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <div class="col-6 mt-3 mb-3">
      <h1 class="student-text text-upper">Admin logs</h1>
      <a class="btn btn-outline-george btn-lg" href="#studentlogs">View student logs</a>
      <a class="btn btn-outline-george btn-lg" href="#jobapplications">View job-applications</a>
    </div>
    <div class="col-6 vl mt-3 mb-3">
      <h1 class="student-text text-upper">Quick Links</h1>
      <a class="btn btn-outline-george btn-lg" href="https://www.mboutrecht.nl">MBO Utrecht</a>
      <a class="btn btn-outline-george btn-lg" href="https://www.georgemarina.nl">George Marina</a>
    </div>
  </div>
</div>

</body>
<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>
