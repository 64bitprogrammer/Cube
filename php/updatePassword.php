<?php
// For this script to work username in session must be  set
  session_start();

  require_once('connect.php');

  $newPassword = $_POST['new'];
  $oldPassword = $_POST['old'];
  $username = $_SESSION['uid'];

  // confirm old password

  $select_query = "select * from signup_data_tb where email='$username';";
  //var_dump($select_query);
  $result = mysqli_query($conn,$select_query);
  $result_data = mysqli_fetch_array($result);

  if( isset($result_data) && $result_data['email'] == $username)
  {
    if($result_data['password'] == $oldPassword)
    {
      // Update the actual password with new one
      $update_query = " update signup_data_tb set password='$newPassword' where email='$username'";
      if(mysqli_query($conn,$update_query))
      {
        echo " <em class='text-success'> Password Updated Successfully ! </em> ";
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
