<?php
session_start();

if(!isset($_SESSION['uid']))
  $user = "Not Set";
else
  $user = $_SESSION['uid'];

  require_once('connect.php');

  $type = $_POST['search_type'];
  $state = $_POST['state'];
  $city = $_POST['city'];
  $main_cat = $_POST['main_category'];
  $sub_cat = $_POST['sub_category'];

  if($type = "Found")
    $table = "found_items_tb";
    else
    $table = "lost_items_tb";

//  echo $state . " " . $city . " " . $main_cat . " " . $sub_cat . " " . $user . " " . $type . " " .$table;

  $search_query = "select * from $table where state='$state' and city='$city' and main_category = '$main_cat' and sub_category='$sub_cat' ";

  if($search_results = mysqli_query($conn,$search_query))
{
  ?> <div class="panel-group" id="accordion"> <?php
  foreach($search_results as $row)
  {
    ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title"> <strong> Title : </strong>
          <a data-toggle="collapse" data-parent="#accordion" href="#<?=$row['lost_id']?>">
          <?=$row['title']?></a> <span style="float:right;"> <strong> Date : </strong> <?=$row['date']?> </span>
        </h4>
      </div>
      <div id="<?=$row['lost_id']?>" class="panel-collapse collapse in">
        <div class="panel-body">
          <p>
            <strong> State : </strong> <?=$row['state']?> <span style="float:right;"> <strong> Location: </strong> <?=$row['location']?></span> <br/>
            <strong> City : </strong> <?=$row['city']?> <br/>
            <hr/>
            <strong> Description : </strong> <?=$row['description']?> <br/>

          </p>
      </div>
      <div class="panel-footer">
        <p>
          <div style="text-align:left;  display:inline;">
            <?php
            $val = $row['user'];
              if($result = mysqli_query($conn,"select mobile,email from user_data_tb where email='$val'"))
              {
                $result_data = mysqli_fetch_array($result);
                $mobile = $result_data['mobile'];
                $email = $result_data['email'];
              }
             ?>
            <strong> Email : </strong>  <?= $email ?>

          </div>
          <div style="float:right;" >
            <strong> Contact : </strong>  <?= $mobile ?>
          </div>
        </p>
      </div>
    </div>
  </div>

      <?php
  }

  ?> </div>
  <!-- Modal -->


   <?php
}






?>
