<?php
session_start();
require_once('../php/connect.php');

$query = " select distinct city_state from cities ORDER BY city_state";
$result = mysqli_query($conn,$query);
 ?>

 <html>

 <head>
     <?php include_once('../include/links.html');?>
 </head>

 <body>

<form method="post" name="form1">

   <select id="state" name="state" onChange="alertTest()"  required>
     <option value="">Select State</option>
     <?php
		foreach($result as $state) {
		?>
		<option value='<?= $state['city_state']; ?>'><?= $state['city_state'] ?></option>
		<?php
		}
		?>
   </select> <br/><br/>

   <select id="city" name="city" required>
     <option value="">Select City</option>
   </select> <br/><br/>

   <input type="submit" value="go" />
 </form>

 </body>


 </html>
