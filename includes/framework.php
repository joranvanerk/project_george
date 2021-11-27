<?php
  if (!isset($conn)) {
    include("./classes/connectDB.php");
  }
  include("./classes/functions.php");
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <!-- fontawsome icons -->

    <!-- app.js -->
    <script src="./js/app.js"></script>

<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
</script>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>George Kanaleneiland</title>
  </head>

<style>
@font-face {
  font-family: 'George-title';
  src: URL('../css/george-title.ttf') format('truetype');
}

@font-face {
  font-family: 'George-menu';
  src: URL('../css/george-menu.ttf') format('truetype');
}

.george_title {
  transform: scaleY(2);
  font-family: 'George-title',sans-serif;
  letter-spacing: -1px;
  text-transform: uppercase;
  color: #333333;
}

.george_title_animation:hover{
  /* text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000; */
  -webkit-text-stroke: 1px black;
  color: white;
  transition-duration: 0.3s;
}

.george_title_animation{
  -webkit-text-stroke: 1px black;
  color: #333333;
  transition-duration: 0.3s;
}

.vl {
  border-left: 1px solid black;
  /* height: 500px; */
}

.vll {
  border-left: 1px solid black;
  /* height: 500px; */
}

.george_menu{
  text-transform: uppercase;
  font-family: george_menu;
  margin-left: 30px;
  margin-right: 30px;
  color: #333333 !important;
}

.george_menu:hover{
  text-transform: uppercase;
  font-family: george_menu;
  margin-left: 30px;
  margin-right: 30px;
  color: #878787 !important;
}

.george_menu_active{
  text-transform: uppercase;
  font-family: george_menu;
  margin-left: 30px;
  margin-right: 30px;
  color: #000000 !important;
  text-decoration: underline;
}

@media screen and (max-width: 768px) {
.mobielhide {
visibility: hidden;
clear: both;
float: left;
margin: 10px auto 5px 20px;
width: 28%;
display: none;
}
}

.formstyle{
  border-radius: 0;
  border-color: black;
  transition: 0.5s;
}

.btn-h:hover{
  border-radius: 10px;
  background-color: black;
  color: white;
}

.fab{
  transition: 0.5s;
}

.fab:hover{
  color: red;
  transition: 0.5s;
}

.fab{
  padding-right: 10px;
}

@keyframes drop_Joran {
  0% {
    opacity: 0%;
    margin-top: -10px;
    margin-bottom: 10px;
  }

  100% {
    opacity: 100%;
  }
}

.bookeventani{
  animation: drop_Joran 250ms ease-in-out;
}

.imgani:hover{
  transition: 0.5s;
  transform: rotate(360deg);
}

.imgani{
  transition: 0.5s;
}
</style>
