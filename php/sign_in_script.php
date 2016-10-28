<?php
  session_start();
  require_once('connect.php');

  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  $directory = "../users/".$email ;

  $insertQuery = "insert into signup_data_tb ( email, password ) values ('$email','$pass') ";

  if (mysqli_query($conn, $insertQuery)) {
    // update the data table , create directory and set session
      $update_userdata_query = "insert into user_data_tb (email) values ('$email')";
      $_SESSION['uid'] = $email;
      mysqli_query($conn,$update_userdata_query) or die(" Failed to setup userdata !".$conn->error);

      if(!is_dir($directory))
      {
        mkdir($directory);
      }

      header('Location: ../signup_success.php');
  } else
  {
      echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);

 ?>
