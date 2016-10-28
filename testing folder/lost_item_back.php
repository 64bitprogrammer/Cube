<?php
session_start();
require_once('php/connect.php');

$query = " select distinct city_state from cities ORDER BY city_state";
$result = mysqli_query($conn,$query);
?>

<html>

<head>
  <?php include_once('include/links.html');?>
</head>

<body>

  <div class="container">

  <div class="form-horizontal" role="form">
    <div class="form-group">
      <div class="col-xs-3">
        <label for="state"> State:</label>
        <select class="form-control" id="state" name="state" onChange="getCity(this.value)"  required>
          <option value="">Select State</option>
          <?php
          foreach($result as $state) {
            ?>
            <option value='<?= $state['city_state']; ?>'><?= $state['city_state'] ?></option>
            <?php
          }
          ?>
        </select>
      </div>
    </div>
    <br/>
    <div class="form-group">
      <div class="col-xs-3">
        <label for="city"> City:</label>
        <select class="form-control" name="city" id="city" required>
          <option value="">Select City</option>
        </select> <br/><br/>
      </div>
    </div>
  </div>

</div>

</body>


</html>
