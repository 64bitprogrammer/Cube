<?php
session_start();
require_once("php/connect.php");
$var = $_POST['username'];
if(!empty($_POST["username"])) {
  $result = mysqli_query($conn,"SELECT count(*) FROM signup WHERE email='$var'");

  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
    echo "<span class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>";
  }
  else
  {
    echo "<span class='glyphicon glyphicon-ok form-control-feedback' aria-hidden='true'></span>";
  }
}
?>
