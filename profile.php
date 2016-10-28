<!DOCTYPE html>
<?php

  session_start();
  require_once('php/connect.php');
  if(!isset($_SESSION['uid']))
    $_SESSION['uid'] = "Session Unset";
#  Validates login credentials, To be enabled later
#  if(!isset($_SESSION['uid']))
#    header('Location: login.php') or die(" Redirection to Login Failed !");

  // Session variable to store data update message
  if(!isset($_SESSION['update_msg']))
    $_SESSION['update_msg'] = "";



# fetch the default values
  $username = $_SESSION['uid'];
  $select_query = "select * from user_data_tb where email='$username';";

  $result = mysqli_query($conn,$select_query);
  $result_data = mysqli_fetch_array($result);

  if(isset($result_data) && $result_data['email'] == $username)
  {

    $imageName = "users/" . $_SESSION['uid'] . "/" . $result_data['image'];
    $firstName = $result_data['fname'];
    $lastName = $result_data['lname'];
    $gender = $result_data['gender'];
    $dob = $result_data['dob'];
    $mobile = $result_data['mobile'];
    $address = $result_data['address'];
    $city = $result_data['city'];
    $state = $result_data['state'];
    $pincode = $result_data['pincode'];
  }
  else
  {
    $imageName = "NA";
    $firstName = "NA";
    $lastName = "NA";
    $gender = "NA";
    $dob = "NA";
    $mobile = "NA";
    $address = "NA";
    $city = "NA";
    $state = "NA";
    $pincode = "NA";
  }

 ?>

<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php include_once('include/links.html');?>
    <title>Profile Settings</title>
    <script type="text/javascript">
      // When the document is ready
      $(document).ready(function () {
        $('#txtdatepicker').datepicker({
          format: "dd/mm/yyyy"
        });
      });


    </script>


  </head>

  <body>

  <div class="well">
    <h2> Manage Profile Here </h2>
  </div>

  <div class="container">
    <h2>Account Settings</h2> <br/>
    <ul class="nav nav-tabs">
      <li class="active"><a data-toggle="tab" href="#home">Personal Details</a></li>
      <li><a data-toggle="tab" href="#menu1">Change Password</a></li>
      <li><a data-toggle="tab" href="#menu2">Security Question</a></li>
      <li><a data-toggle="tab" href="#menu3">Misc.</a></li>
    </ul>

    <div class="tab-content">

      <div id="home" class="tab-pane fade in active">

      <form method="post" action="php/update_profile.php" class="form-horizontal"  enctype="multipart/form-data" role="form"> <br/>
       <br/><br/>
          <h4> Profile Picture </h4>
          <hr>
          <div style="">
            <img src="<?= $imageName ?>"  class="img-rounded" alt="Image" width="150" height="150">
            <!-- <h1> <?= $imageName . "xx" ?> -->
            <label class="btn btn-default btn-file" title="Change Picture">
              <span class="glyphicon glyphicon-cog" value=""> <input type="file"  name="image1" style="display: none;" /> </span>
            </label>

          </div>
          <br><h4 style="display:inline-block;"> Personal Info </h4>
          <hr>
          <div class="form-group">
            <div class="col-xs-3">
              <label for="fname">First Name:</label>
              <input class="form-control" id="fname" type="text" name="fname" value='<?=$firstName?>'/>
            </div>
            <div class="col-xs-3">
              <label for="lname">Last Name:</label>
              <input class="form-control" id="lname" type="text" name="lname" value='<?=$lastName?>'/>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="email">Email:</label>
              <input class="form-control" id="email" type="text" name="email" disabled value="<?= $_SESSION['uid']?>" />
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="gender"> Gender:</label>
                <select class="form-control" id="gender" required name="gender" >
                  <option <?php if($gender=='Male') echo 'selected'; ?>  value="Male" >Male</option>
                  <option <?php if($gender=='Female') echo 'selected'; ?> value="Female">Female</option>
                </select>
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="txtdatepicker"> DOB:</label>
              <input  type="text" class="form-control" name="txtdob" id="txtdatepicker" value='<?=$dob?>' required >
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="Mobile"> Mobile:</label>
              <input  type="number" maxlength="10" class="form-control" name="mobile" id="mobile" required value='<?=$mobile?>' >
            </div>
          </div>

          <br>
          <h4> Address Details</h4>
          <hr>

          <div class="form-group">
            <div class="col-xs-4">
              <label for="textarea"> Address:</label>
              <textarea id="address" name="address" rows="5" class="form-control" ><?= $address ?></textarea>
            </div>
          </div>

          <div class="form-group form-horizontal">
            <div class="col-xs-3">
              <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control" value='<?=$city?>'/>
              </div>
              <div class="col-xs-3">
                <label for="state"> State:</label>
                <input type="text" id="state" name="state" class="form-control" value='<?=$state?>' />
            </div>
          </div>


          <div class="form-group">
            <div class="col-xs-3">
              <label for="pincode">Pincode:</label>
              <input type="text" id="pincode" name="pincode" rows="5" value='<?=$pincode?>' maxlength="6" class="form-control"/>
            </div>
          </div>
          <br/>
          <div id="saveInfo" class="text-success">
            <?php echo $_SESSION['update_msg'] ; unset($_SESSION['update_msg']); ?>
          </div>
          <br/>
          <br/>
          <div class="form-group">
            <!-- <div class="col-xs-2">
              <button type="reset" class="form-control btn btn-danger" name="reset">Reset</button>
            </div> -->
            <div class="col-xs-2">
              <button type="submit" class="form-control btn btn-primary"  name="save">Save</button>
            </div>
          </div>

         <!-- End of form tag -->
      </form>


      </div>
      <!-- The password reset form -->
      <div id="menu1" class="tab-pane fade">
        <div role="form"  class="form-horizontal"><br/>
          <div class="form-group">
            <div class="col-xs-3">
              <label for="current">Current Password:</label>
              <input class="form-control" id="currentPwd" type="password" name="current">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-3">
              <label for="new">New Password:</label>
              <input class="form-control" id="newPwd" type="password" name="new">
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-3">
              <label for="confirm">Confirm New Password:</label>
              <input class="form-control" id="confirmPwd" type="password" name="confirm">
            </div>
          </div>
          <span id='passwordChangeMessage'>  </span> <br/> <br/>
          <div class="form-group">
            <div class="col-xs-3">
              <button class="btn btn-warning" onclick="updatePassword()">Update Password</button>
            </div>
          </div>
        </div>
          <form method="post" role="form"  class="form-horizontal"><br/>
        </form>

      </div>

      <div id="menu2" class="tab-pane fade">
      <div class="form-horizontal" role="form"> <br/><br>
          <div class="form-group">
            <div class="col-xs-5">
              <label for="security_question">Select Security Question:</label>
                <select class="form-control" id="security_question" name="security_question" required>
                  <option>Whats your mothers maiden name?</option>
                  <option>What is your nickname?</option>
                  <option>Whats your favorite hobby?</option>
                  <option>Whats was your first gift ever?</option>
                  <option>Your best friends name?</option>
                </select>
              </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="answer">Answer:</label>
              <input class="form-control" id="answer" type="text" id="answer" name="answer">
            </div>
          </div>

          <div class="form-group">
            <div class="col-xs-3">
              <label for="answer">Current Password:</label>
              <input class="form-control" id="currentPwdForSecQ" type="password" name="currentPwdForSecQ">
            </div>
          </div>
          <br/>
          <div id="secMessage" >

          </div>
          <br/><br/>
          <button class="btn btn-warning" onclick="UpdateSecurity()"> Update Information </button>
        </div>
      </div>

      <div id="menu3" class="tab-pane fade">
        <br/>
        <h3>Other Settings</h3>

      </div>

    </div>
  </div>

  </body>

</html>
