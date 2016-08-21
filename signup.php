<!DOCTYPE html>

<html lang="en">

<head>
  <?php include_once('include/links.html'); ?>
  <title>Sign-Up</title>
</head>

<body>

  <div class="container">

    <h1> Sign-Up </h1>
    <!-- ======= Form============= -->
    <form class="form-horizontal" method="POST" action="php/sign_in_script.php" role="form" onsubmit="return matchPassword()"><!--Form start -->

      <!-- Email input-->
      <div class="form-group" > <!-- has success , has-feedback -->
        <label class="control-label col-sm-2" for="email">Email:</label>

        <div class="col-sm-4" id="statusColor">
          <!-- Email -->
          <input type="email" onblur="checkAvailability()" class="form-control" name="email" id="email" aria-describedby="inputSuccess3Status" placeholder="Enter email" required>
          <span class='' aria-hidden='true' id="statusIcon"></span>
          <span id="inputSuccess3Status" class="sr-only">(success)</span>

        </div><span id='emailError'></span>

      </div>

      <div class="form-group">

        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-4">
          <!-- password -->
          <input type="password" name="pass" class="form-control" id="pwd" placeholder="Enter password" required>

        </div><span id='passwordError'></span>
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

      <!-- Form buttons -->
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
