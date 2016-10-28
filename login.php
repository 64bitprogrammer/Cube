
<?php
session_start();
if(!isset($_SESSION['login_status']))
  $_SESSION['login_status']=""

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <?php include_once('include/links.html');?>
  <title>Login</title>
</head>

<body>
  <div class="container">

    <h1> Login </h1>

    <form class="form-horizontal" method="POST" action="php/login_script.php" role="form">

      <div class="form-group ">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-4">
          <input type="email" name="username" class="form-control" id="email" placeholder="Email Address" aria-describedby="inputSuccess3Status">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-4">
          <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <label class="text-danger"> <?php echo $_SESSION['login_status']; unset($_SESSION['login_status']) ; ?></label>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button href="signup.php" type="button" class="btn btn-warning" onclick="location.href='signup.php';" >Sign-Up</button>
          <button type="submit" class="btn btn-primary">Login</button>
        </div>
      </div>


    </form>

  </div>

</body>

</html>
