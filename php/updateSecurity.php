<?php
// Updates the security questions
session_start();
require_once('connect.php');

// fetch form data here
$question = $_POST['q'];
$answer = $_POST['a'];
$password = $_POST['p'];
$username = $_SESSION['uid'];

//echo  $question . $answer . $password ;

// fetch email and then update data
$select_query = "select * from signup_data_tb where email='$username';";
//var_dump($select_query);
$result = mysqli_query($conn,$select_query);
$result_data = mysqli_fetch_array($result);

if( isset($result_data) && $result_data['email'] == $username)
{
  if($result_data['password'] == $password)
  {
    // Update security details for recovery
    $update_query = " update signup_data_tb set secQ='$question' , secA='$answer' where email='$username'";
    if(mysqli_query($conn,$update_query))
    {
      echo " <em class='text-success'> Security Question Updated Successfully ! </em> ";
    }
    else
    {
      echo " <i class='text-danger'> Update Failed ! </i> ";
    }
  }
  else
          echo " <em class='text-danger'> Incorrect Password !  </em>";
}
else {
  echo " <i class='text-danger'> Retrival Failed ! </i> ";
}

  mysqli_close($conn);
 ?>
