<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php"); ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>
<body>

<!-- bein banner-->
<br>
<img src="./img/banner.jpg" style="width:100%;"  alt="">
<!--einde banner-->

<html>
 <head>
    <style>
    {
        box-sizing: border-box;
    }
    /* style van de columns */
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
        <div class="column" >
            <h2>Column 1</h2>
            
        </div>
        <div class="column">
            <h2>Column 2</h2>
        <!--einde columns-->
        </div>
    </div>
 </body>
</html>
</body>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>