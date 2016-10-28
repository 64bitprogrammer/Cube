<?php
require_once("connect.php");

if(!empty($_POST["city_name"]))
{
	$query ="SELECT * FROM cities WHERE city_state = '" . $_POST["city_name"] . "' order by city_name";
	$results = mysqli_query($conn,$query);
?>
<option value="">Select City</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?= $state['city_name']; ?>"><?= $state['city_name']; ?></option>
<?php
	}
}
else {
  echo " error ";
}
?>
