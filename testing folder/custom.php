<?php
session_start();
?>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

function checkPassword()
{
  if()
  {
    // set success message
    return true;
  }
  else
  {
    // Set error message
    return false;
  }
}


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
    return false;
  }
}

function checkAvailability()
{

  var email = document.getElementById('email').value;
  if(email == "")
  {
    $("#statusColor").removeClass("has-error");
    $("#statusIcon").removeClass("glyphicon glyphicon-remove form-control-feedback");
    $("#statusColor").removeClass("has-success");
    $("#statusIcon").removeClass("glyphicon glyphicon-ok form-control-feedback");
  }
  else
  {
    jQuery.ajax({
      url: "check_availability.php",
      data:'username='+$("#email").val(),
      type: "POST",
      success:function(data){
        if(data == "username-available")
        {
          $("#statusColor").removeClass("has-error");
          $("#statusIcon").removeClass("glyphicon glyphicon-remove form-control-feedback");

          $("#statusColor").addClass("has-feedback");
          $("#statusColor").addClass("has-success");
          $("#statusIcon").addClass("glyphicon glyphicon-ok form-control-feedback");
        }
        else
        {
          $("#statusColor").removeClass("has-success");
          $("#statusIcon").removeClass("glyphicon glyphicon-ok form-control-feedback");

          $("#statusColor").addClass("has-feedback");
          $("#statusColor").addClass("has-error");
          $("#statusIcon").addClass("glyphicon glyphicon-remove form-control-feedback");
        }
      },
      error:function (){

      }
    });

  }

}
