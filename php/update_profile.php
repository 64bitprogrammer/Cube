<?php

  session_start();
  require_once('connect.php');

  $firstName = $_POST['fname'];
  $lastName = $_POST['lname'];
  $sex = $_POST['gender'];
  $dob = $_POST['txtdob'];
  $mobile = $_POST['mobile'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $state = $_POST['state'];
  $pincode = $_POST['pincode'];
  $email = $_SESSION['uid'];

  $image  = basename($_FILES['image1']['name']);
  $target = "../users/" . $_SESSION['uid'] . "/" . $image ;
  echo "==>" . $image;


  # echo $firstName ."+". $lastName ."+". $sex ."+". $dob . $mobile ."+". $address ."+". $city ."+". $state ."+". $pincode;

  $update_query = " update user_data_tb set fname='$firstName', lname='$lastName', gender='$sex', dob='$dob', mobile='$mobile', address='$address', city='$city', state='$state', pincode='$pincode' , image='$image' where email='$email' ;";
  //echo $update_query;
  if(mysqli_query($conn,$update_query))
  {
    if($image != "")
        move_uploaded_file($_FILES['image1']['tmp_name'],$target) or die(" Image Storage Failed !");

    $_SESSION['update_msg'] = " Update Successful !";
    header("Location: ..\profile.php");
  }
  else
  {
    $_SESSION['update_msg'] = " Update Failed !";
    die(" User data Update Failed ! ".$conn->error);
    header("Location: ..\profile.php");
  }
 ?>
