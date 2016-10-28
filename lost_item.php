<?php
session_start();
require_once('php/connect.php');

$state_query = " select distinct city_state from cities ORDER BY city_state";
$result = mysqli_query($conn,$state_query);

$category_query = "select distinct main_category from categories order by main_category";
$result1 = mysqli_query($conn,$category_query);
?>

<html>

<head>
  <?php include_once('include/links.html');?>

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

  <form method="post" action="php/lost.php">


    <label for="title"> Title:</label>
    <input type="text" name="title" id="title" required /> <br/><Br/>

    <label for="state"> State:</label>
    <select id="state" name="state" onChange="getCity(this.value)"  required>
      <option value="">Select State</option>
      <?php
      foreach($result as $state) {
        ?>
        <option value='<?= $state['city_state']; ?>'><?= $state['city_state'] ?></option>
        <?php
      }
      ?>
    </select> <br/><br/>

    <label for="city"> City:</label>
    <select  name="city" id="city" required>
      <option value="">Select City</option>
    </select> <br/><br/>


    <label for="txtdatepicker"> Date Lost:</label>
    <input  type="text"  name="date_lost" id="txtdatepicker" required > <br/> <br>

    <label for="primary"> Primary Color:</label>
    <select id="primary" name="primary"  required>
      <option value="">Select Color</option>
      <option value="Black">Black</option>
      <option value="Blue">Blue</option>
      <option value="Green">Green</option>
      <option value="Indigo">Indigo</option>
      <option value="Grey">Grey</option>
      <option value="Orange">Orange</option>
      <option value="Pink">Pink</option>
      <option value="Red">Red</option>
      <option value="Violet">Violet</option>
      <option value="White">White</option>
      <option value="Yellow">Yellow</option>
      <option value="Other">Other</option>
    </select> <br/><br/>

    <label for="secondary"> Secondary Color:</label>
    <select id="secondary" name="secondary"  required>
      <option value="">Select Color</option>
      <option value="Black">Black</option>
      <option value="Blue">Blue</option>
      <option value="Green">Green</option>
      <option value="Indigo">Indigo</option>
      <option value="Grey">Grey</option>
      <option value="Orange">Orange</option>
      <option value="Pink">Pink</option>
      <option value="Red">Red</option>
      <option value="Violet">Violet</option>
      <option value="White">White</option>
      <option value="Yellow">Yellow</option>
      <option value="Other">Other</option>
    </select> <br/><br/>

    <label for="main_category"> Main Category:</label>
    <select id="main_category" name="main_category"  onChange="getSubcat(this.value)" required>
      <option value="">Select Main Category</option>
      <?php
      foreach($result1 as $main) {
        ?>
        <option value='<?= $main['main_category']; ?>'><?= $main['main_category'] ?></option>
        <?php
      }
      ?>
    </select> <br/><br/>

    <label for="sub_category"> Sub Category:</label>
    <select id="sub_category" name="sub_category"  required>
      <option value="">Select Sub-Category</option>
    </select> <br/><br/>


    <label for="description"> Description:</label>
    <textarea name="description" id="description" required rows="4"/></textarea> <br/><br/>


    <label for="location"> Location:</label>
    <select id="location" name="location"  required>
      <option value="">Select Location</option>
      <option value="Airport">Airport</option>
      <option value="Bus">Bus</option>
      <option value="Cab">Cab/Taxi</option>
      <option value="College">College/School</option>
      <option value="Hospital">Hospital</option>
      <option value="Hotel">Hotel/Lodging</option>
      <option value="Library">Library</option>
      <option value="Museum">Museum</option>
      <option value="Parking">Parking</option>
      <option value="School">School</option>
      <option value="Restaurent">Restaurent</option>
      <option value="Street">Street</option>
      <option value="Train">Train</option>
      <option value="Other">Other</option>
    </select> <br/><br/>

    <label for="pincode"> Pincode </label>
    <input type="number" id="pincode" name="pincode" maxlength="6" /><br/><br/>

    <label for="model"> Make/Model:</label>
    <input type="text" name="model" id="model" required /> <br/><Br/>


    <input type="submit" name="post"/>



  </form>

</div>

</body>


</html>
