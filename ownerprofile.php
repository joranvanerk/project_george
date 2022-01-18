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
      <h2>My Profile</h2>
      <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
    </div>
  </div>
  <div class="row row-info">
    <div class="col-sm-6 offset-sm-0 col-md-2 offset-md-1">
      <ul class="student-header">
          <li>Name:</li>
          <li>E-mail:</li>
          <li>Phone number:</li>
          <li>Address:</li>
          <li>Role:</li>
        </ul>
      </div>
      <div class="col-sm-6 col-md-3">
        <ul class="student-info">
        <li>Brian Segakindi</li>
        <li>325972@student.mboutrecht.nl</li>
        <li>0622334455</li>
        <li>Teststraat 73</li>
        <li>Eigenaar</li>
      </ul>
      </div>
    <div class="col-6 vl mt-3 mb-3 mobielhide">
      <img src="./img/brian.jpg" class="img-fluid" alt="Owner">
    </div>
  </div>
</div>

<div class="container student-options">
  <div class="mb-2" style="background-color:#000000; height:1px; width:100%;"></div>
  <div class="row">
    <div class="col-6 mt-3 mb-3">
      <h1 class="student-text text-upper">Admin logs</h1>
      <a class="btn btn-outline-george btn-lg" href="#studentlogs">View student logs</a>
      <a class="btn btn-outline-george btn-lg" href="viewapplications.php">View job-applications</a>
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
