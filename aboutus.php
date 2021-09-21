<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php"); ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>
<body>

<!-- begin banner-->
<br>
<img src="./img/banner.jpg" style="width:100%;"  alt="">
<!--einde banner-->

<html>
 <head>
    <style>
    {
        box-sizing: border-box;
    }
    /* begin style van de columns */
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    /* einde style van de colmuns */

    </style>
 </head>
 <body>
     <!--begin columns-->
    <div class="row">
        <div class="col-6" >
            <br>
            <!-- dit is de titel van de tekst -->
            <h2> titel</h2>
            <!--tekst die je kan aanpassen tussen h2 tags-->
            <p> 
                about us about us about us about us about us 
                about us about us about us about us about us 
                about us about us about us about us about us 
                about us about us about us about us about us 
                about us about us about us about us about us
                about us about us about us about us about us
                about us about us about us about us about us
            </P>
        </div>
        <div class="col-6" >
            <br>
            <!-- dit is de titel van de tekst -->
            <h2>titel</h2>
            <!--tekst die je kunt aanpassen tussen h2 tags-->
            <p> 
                about us about us about us about us about us 
                about us about us about us about us about us 
                about us about us about us about us about us 
                about us about us about us about us about us
                about us about us about us about us about us
                about us about us about us about us about us
                about us about us about us about us about us
            </p>
            
        <!--einde columns-->
        </div>
    </div>
 </body>
</html>
</body>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>