<?php

  $host = "localhost";
  $user = "root";
  $password = "";
  $database = "cube";

  if($conn = mysqli_connect($host,$user,$password))
  {
    if(mysqli_select_db($conn,$database))
    {
      // Do something here
    }
  }
  else
  {
    echo "<h2 class='text-danger'> Database Connection Failed ! </h2> ";
  }

 ?>
