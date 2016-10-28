<?php
session_start();
require_once("php/connect.php");
$var = $_POST['username'];
if(!empty($_POST["username"])) {
  $result = mysqli_query($conn,"SELECT count(*) FROM signup_data_tb WHERE email='$var'");

  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
    echo "username-already-taken";
  }
  else
  {
    echo "username-available";
  }
}
?>
