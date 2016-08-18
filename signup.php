<!DOCTYPE html>
<?php
  session_start();

  $_SESSION['availaibilityStatus'] = "has-feedback has-success";
  $_SESSION['showSign'] = "";

 ?>

<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Sign-Up</title>

  <!-- Bootstrap & J query links -->
  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/js/jquery-1.12.2.js"></script>
  <link rel="stylesheet" href="bootstrap/css/datepicker.css">
  <script src="bootstrap/js/bootstrap-datepicker.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="custom.css" />
  <script src="custom.php"></script>


</head>

<body>

  <div class="container">

    <h1> Sign-Up </h1>

    <form class="form-horizontal" method="POST" action="php/sign_in_script.php" role="form" onsubmit="return validatePassword()"><!--Form start -->

      <!-- Email input-->
      <div class="form-group" id="statusColor"> <!-- has success , has-feedback -->
        <label class="control-label col-sm-2" for="email">Email:</label>

        <div class="col-sm-4">
          <!-- Email -->
          <input type="email" onblur="checkAvailability()" class="form-control" name="email" id="email" aria-describedby="inputSuccess3Status" placeholder="Enter email" required>
          <span class='' aria-hidden='true' id="statusIcon"></span>
          <!-- <span id='user-availability-status'></span> -->
          <span id="inputSuccess3Status" class="sr-only">(success)</span>
        </div>

      </div>

      <div class="form-group">

        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-4">
          <!-- password -->
          <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password" required>
        </div>

        <div class="text-danger col-sm-2" id="password-status" for="pwd">

        </div>
      </div>

      <div class="form-group">

        <label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
        <div class="col-sm-4">
          <!-- confirm password -->
          <input type="password" class="form-control" name="cpass" id="cpwd" placeholder="Confirm password" required>
        </div>
        <!-- <a href="#" data-toggle="tooltip" data-placement="right" title="Help Text"> <kbd>i</kbd> </a> -->
        <div class="text-danger col-sm-2" for="cpwd">

        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="reset" class="btn btn-danger ">Reset</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>

    </form> <!-- form end -->

  </div><!--  End main container -->

</body>

</html>
