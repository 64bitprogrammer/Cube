<?php

  $host = "localhost";
  $usernm = "root";
  $password = "";
  $database = "cube";

  if($conn = mysqli_connect($host,$usernm,$password))
  {
    mysqli_select_db($conn,$database) or die(" <h2> Database Selection Failed !");
  }
  else
  {
    echo "<h2 class='text-danger'> Database Connection Failed ! </h2> ";
  }

 ?>
