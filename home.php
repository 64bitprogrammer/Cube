<!DOCTYPE html>
<?php

  session_start();
#  Validates login credentials, To be enabled later
#  if(!isset($_SESSION['uid']))
#    header('Location: login.php') or die(" Redirection to Login Failed !");

 ?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('include/links.html');?>
    <title> Home </title>


  </head>

  <body>

  <div class="well">

    <h2> Welcome Home </h2>

    <br/><br/>
    <a href="profile.php"> Profile </a>

  </div>



  </body>

</html>
