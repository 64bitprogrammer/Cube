// Global variables
var emailAvailable=false;
var passwordLength=false;
// method to check password errors



//function to handle main and sub category
function getSubcat(val)
{
	$.ajax({
	type: "POST",
	url: "php/get_subcat.php",
	data:'main_cat='+val,
	success: function(data){
		$("#sub_category").html(data);
	}
	});
}

// Function to handle city-state listing
function getCity(val)
{
	$.ajax({
	type: "POST",
	url: "php/get_city.php",
	data:'city_name='+val,
	success: function(data){
		$("#city").html(data);
	}
	});
}

// testing function
function alertTest()
{
  alert(" Working ");
}


// method to update security questions
function UpdateSecurity()
{
  var question = document.getElementById("security_question").value;
  var answer = document.getElementById("answer").value;
  var password = document.getElementById("currentPwdForSecQ").value;

  //alert(question+" "+answer+" "+password);
  jQuery.ajax({
    url: "php/updateSecurity.php",
    data:{ q: question, a: answer , p: password },
    type: "POST",
    success:function(data){
      $('div#secMessage').html(data);
    },
    error:function (){

    }
  });
}


// Method to handle update password in profile page
function updatePassword()
{
  var current = document.getElementById("currentPwd").value;
  var newPass = document.getElementById("newPwd").value;
  var confirm = document.getElementById("confirmPwd").value;

  if(newPass.localeCompare(confirm)!=0 )
  {
    alert(" Password Does Not Match !");
  }
  else if( newPass.length<8 )
  {
    alert(" Password is shorter ! ( Min. 8) ");
  }
  else
  {
    jQuery.ajax({
      url: "php/updatePassword.php",
      data:{ old: current, new: newPass },
      type: "POST",
      success:function(data){
        $('span#passwordChangeMessage').html(data);
      },
      error:function (){

      }
    });
  }
}

// Datepicker method (initialization)
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});

// check password length
function checkPasswordLength()
{
  var password = document.getElementById('pwd').value;
  if(password.length < 8)
    passwordLength = false;
  else
    passwordLength = true;
}

// checks for password match
function matchPassword()
{
  var pass = document.getElementById("pwd").value;
  var cpass = document.getElementById("cpwd").value;
  checkPasswordLength();
  //alert(emailAvailable+" "+passwordLength);
  if(pass.localeCompare(cpass)==0 && emailAvailable && passwordLength)
  {

    return true; // insert to db
  }
  else
  {
    if(pass != "" && cpass!="" && pass.localeCompare(cpass)!=0 )
    {
      $('#passwordError').html('<label class="control-label text-danger" for="pwd">Passwords do not match !</label> ');
    }
    if(pass.localeCompare(cpass)==0)
    {
      $('#passwordError').html('<label class="control-label text-success" for="pwd"></label> ');
    }

    if(!passwordLength)
      alert(" Password too short !");


    return false;
  }

}

// Checks for username availability
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
          emailAvailable = true;
          $("#statusColor").removeClass("has-error");
          $("#statusIcon").removeClass("glyphicon glyphicon-remove form-control-feedback");

          $("#statusColor").addClass("has-feedback");
          $("#statusColor").addClass("has-success");
          $("#statusIcon").addClass("glyphicon glyphicon-ok form-control-feedback");
          $('#emailError').html('<label class="control-label text-success" for="email">Username Available !</label> ');

        }
        else
        {
          emailAvailable = false;
          $("#statusColor").removeClass("has-success");
          $("#statusIcon").removeClass("glyphicon glyphicon-ok form-control-feedback");

          $("#statusColor").addClass("has-feedback");
          $("#statusColor").addClass("has-error");
          $("#statusIcon").addClass("glyphicon glyphicon-remove form-control-feedback");
          $('#emailError').html('<label class="control-label text-danger" for="email">Username not available !</label> ');
        }
      },
      error:function (){

      }
    });

  }

}
