<?php
session_start();
?>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});



function validatePassword()
{
  var pass = document.getElementById("pwd").value;
  var cpass = document.getElementById("cpwd").value;

  if(pass.localeCompare(cpass)==0)
  {
    return true; // insert to db
  }
  else
  {
    <?php
    // set error message
    ?>
    alert("papa");
    return false;
  }
}

function checkAvailability()
{

  var email = document.getElementById('email').value;
  if(email == "")
  {
    alert("HHello");
    <?php

      $_SESSION['availaibilityStatus'] = "";
      $_SESSION['showSign'] = "";
    ?>
  }
  else
  {
    jQuery.ajax({
      url: "check_availability.php",
      data:'username='+$("#email").val(),
      type: "POST",
      success:function(data){
        $("#user-availability-status").html(data);

      },
      error:function (){

      }
    });
  }

}
