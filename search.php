<?php
  session_start();

  if(!isset($_SESSION['uid']))
    $user = "Not Set";
  else
    $user = $_SESSION['uid'];

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

  function search()
  {
    var typex = document.getElementById("search_type").value;;
  	var statex = document.getElementById("state").value;;
  	var cityx = document.getElementById("city").value;;
  	var main_categoryx = document.getElementById("main_category").value;;
  	var sub_categoryx = document.getElementById("sub_category").value;;
  	$.ajax({
  	type: "POST",
  	url: "php/search_records.php",
  	data:{ search_type: typex, state: statex , city: cityx ,main_category:main_categoryx ,sub_category:sub_categoryx},
  	success: function(data){
  		$("#search_results").html(data);
  	}
  	});

  }

  
  </script>
</head>

<body>

  <div class="container">
    <div class="well">
      <h2> Search </h2>
    </div>



    <label for="search_type"> Search Category:</label>
    <input type="radio" name="search_type" id="search_type" value="Found"> Found &nbsp;&nbsp;
    <input type="radio" name="search_type" id="search_type" value="Lost"> Lost <br/> <br/>

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

    <input type="button" onclick="search()" name="search" value="Search" />

  <br/>
  <h2> Search Results </h2>

  <div id="search_results">

  </div>



</div>

</div>

</body>


</html>
