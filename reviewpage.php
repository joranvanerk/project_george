<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php");

$active_page_filename = basename(__FILE__);

//database
if(isset($_POST["submit"])){
  //$sterren = sanitize($_POST["sterren"]);
  $commentaar = sanitize($_POST["commentaar"]); 
  $email = sanitize($_POST["email"]);
  

  mysqli_query($conn, "SELECT * FROM `reviewklant` WHERE ``='$commentaar $email`");

  $mail= mysqli_query($conn, "INSERT INTO `reviewklant` (`commentaar`, `email`) VALUES
  (NULL, '$commentaar', '$email');");

 if ($mail) {
        echo '<script> alert("succesvol verzonden"); </script>';
        $to      = $email;
        $headers = 'MIME-Version: 1.0';
        $headers = 'From: george-kanaleneiland@outlook.com' . "\r\n" .
        $headers = 'Content-type: text/html; charset=iso-8859-1';
        $subject = 'review george kanaleneiland';
        $message = '
        
        <!doctype html> 
        <html lang="en">

        <head>

        
        </head>
        <body>
        
        
        
        
        
        hallo '.$email.',
        <br>
        <p> bedankt voor uw review  <p>
        
        
        

        
        
        
        </body>
        
        
        </html>
        
        ';

                
    
        mail($to, $subject, $message, $headers);
     }
    } 


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
<form action="" method="POST">
<div class="container">
  <div class="row">
    <div class ="col-5">
    </div>
    <div class="col-sm-12 col-md-9 ">
    <br>
    <h2>Beoordeel ons!</h2>
    <br>
    <span name="sterren">
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    <span class="fa fa-star"></span>
    </span>
    <br>
    <br>
    <dic class="row-2">
    <div class="col-mb-6 col-sm-12">
    <div class="form-floating">
    <textarea class="form-control" name="commentaar" placeholder="Leave a comment here" id="commentaar" style="height: 200px"></textarea>
    <label for="commentaar">typ hier uw commentaar</label>
    </div>
    <div class="form-floating mb-3">
    <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput" >voeg hier uw email address</label>
    </div>
    <button type="submit" class="btn-lg btn-outline-george" name="submit">Verstuur</button>
    </div>
    <div class="col-sm-12 col-md-5">
    <img src="./img/review.jpg" class= "img-fluid"  alt="">
    </div>
  </div>





</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


<?php include_once("./includes/footer.php");?>

