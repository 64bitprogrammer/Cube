<?php
  session_start();
  require_once('connect.php');

  if(!isset($_SESSION['uid']))
  {
    $_SESSION['uid'] = "Admin";
  }

  $title = $_POST['title'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $date = $_POST['date_lost'];
  $primary_color = $_POST['primary'];
  $secondary_color = $_POST['secondary'];
  $main_cat = $_POST['main_category'];
  $sub_cat = $_POST['sub_category'];
  $description = $_POST['description'];
  $location = $_POST['location'];
  $pincode = $_POST['pincode'];
  $model = $_POST['model'];

  echo $title . " " . $state  . " " . $city  . " " . $date  . " " .  $primary_color  . " " .  $secondary_color . " " . $main_cat   .
        " " . $sub_cat  . " " .  $description  . " " . $location  . " " . $pincode . " " .  $model . "" .$user;

  $insert_query = "insert into lost_items_tb (title,state,city,main_category,sub_category,primary_color,secondary_color,date,location,pincode,description,model,user)
                  values ('$title','$state','$city','$main_cat','$sub_cat','$primary_color','$secondary_color','$date','$location',$pincode,'$description','$model','$user')";

  if($result = mysqli_query($conn,$insert_query))
  {
    echo " Success !";
  }
  else
  {
      echo " Insert into tb failed !" . mysqli_error($conn) ;
  }

  mysqli_close($conn);

 ?>
