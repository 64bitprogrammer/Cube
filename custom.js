// Global variables
var emailAvailable=false;
var passwordLength=false;
// method to check password errors


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
