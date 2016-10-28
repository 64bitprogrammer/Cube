<?php
require_once("connect.php");

if(!empty($_POST["main_cat"]))
{
	$query ="SELECT * FROM categories WHERE main_category = '" . $_POST["main_cat"] . "' order by sub_category";
	$results = mysqli_query($conn,$query);
?>
<option value="">Select Sub Category</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?= $state['sub_category']; ?>"><?= $state['sub_category']; ?></option>
<?php
	}
}
else {
  echo " error ";
}
?>
