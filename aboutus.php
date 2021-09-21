<!-- include framework css and bootstrap basic -->
<?php include_once("./includes/framework.php"); ?>
<!-- include header -->
<?php include_once("./includes/header.php"); ?>
<body>
    
<br>
<img src="./img/banner.jpg" style="width:100%;"  alt="">

<html>
 <head>
    <style>
    {
        box-sizing: border-box;
    }
    /* Set additional styling options for the columns*/
    .column {
    float: left;
    width: 50%;
    }

    .row:after {
    content: "";
    display: table;
    clear: both;
    }
    </style>
 </head>
 <body>
    <div class="row">
        <div class="column" >
            <h2>Column 1</h2>
            
        </div>
        <div class="column">
            <h2>Column 2</h2>
        
        </div>
    </div>
 </body>
</html>
</body>

<!-- include footer -->
<?php include_once("./includes/footer.php"); ?>