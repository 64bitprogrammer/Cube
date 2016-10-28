<?php

session_start();

require_once('connect.php');

# Fetch the data from webpage
$username = $_POST['username'];
$password = $_POST['password'];

$select_query = "select * from signup_data_tb where email='$username';";

$result = mysqli_query($conn,$select_query);
$result_data = mysqli_fetch_array($result);

if( isset($result_data) && $result_data['email'] == $username)
{
  if($result_data['password'] == $password)
  {
    $_SESSION['uid'] = $username;
    header('Location: ..\home.php') or die("<h2> Redirection to Home Page Failed ! </h2>");
  }
}

# Set login error message
$_SESSION['login_status'] = 'Login Failed !  Try Again ';
header("Location: ..\login.php");


echo $select_query;

mysqli_close($conn);

 ?>
