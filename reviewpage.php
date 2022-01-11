<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);
?>




<!-- include header -->
<?php include_once("./includes/header.php"); ?>

<!-- Font Awesome Icon Library -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<body>
<div class="container">
  <div class="row">
    <div class ="col">
    </div>
    <div class="col-sm-1-12 col-md-9 ">
    <br>
    <h2>Beoordeel ons!</h2>
    <br>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <br>
    <div class="mb-3">
    <label for="exampleFormControlTextarea1" class="form-label">Voeg hier uw comentaar</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    <button type="submit" class="btn-lg btn-outline-george" name="submit">Verstuur</button>
    </div>
    <div class="col-sm-12 col-md-5">
    <img src="./img/review.jpg" class= "img-fluid"  alt="">
    </div>
  </div>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


<?php include_once("./includes/footer.php");?>



























