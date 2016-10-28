<?php
  session_start();
  require_once('php/connect.php');

  if(isset($_POST['upload']))
  {
    $filename  = basename($_FILES['image1']['name']);
    $extension = pathinfo($filename, PATHINFO_EXTENSION);
    $new       = $_SESSION['uid'].'.'.$extension;

    $target = "images/".$new;

    //$image = $_FILES['image1']['name'];

    $text = $_POST['text'];

    //$sql = "insert into images (image, text) value ('$image','$text')";
    //mysqli_query($conn,$sql);

    if(move_uploaded_file($_FILES['image1']['tmp_name'],$target))
    {
      $msg = "Image Upload Succeeded !";
    }
    else {
      $msg = " Error in upload ";
    }


  }

?>

<html>

  <head>
  </head>

  <body>

    <form method="post" action="image_test.php" enctype="multipart/form-data">
      <input type="hidden" name="size" value="1000000">
      <input type="file" name="image1">

      <textarea name="text" cols="40" rows="4" palceholder="add text" > </textarea>
      <input type="submit" name="upload" value="Upload image">

  </body>

</html>
