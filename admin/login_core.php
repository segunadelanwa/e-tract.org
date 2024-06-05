<!DOCTYPE html>
<html lang="en">
<head>
	
    <?php
    require("header.php");
    ?>
 
<link rel="stylesheet" href="css/style_002.css">


</head>
<body>
<div class="d-lg-flex half">
<div class="bg order-1 order-md-2" style="background-image: url('assets/img/mang.jpg');" style="height:70px" ></div>
<div class="contents order-2 order-md-1">
<div class="container">
<div class="row align-items-center justify-content-center">
<div class="col-md-7">
<center><br />
<h5> DASHBOARD</h5>
<i></i>
</center>
<p class="mb-4">Admin Login</p>


                                       
<span id="message"></span>
										   
										   
    <form method="POST"   id="user_login_form">
    <div class="form-group">
    <label> <i class="fa fa-user" style="color:#007bff;font-size:18px;"></i> Username  </label>
    <input type="text" name="user_email_address" placeholder="emaill address"  id="user_email_address" class="form-control" data-parsley-checkemail data-parsley-checkemail-message='Email address does not exist' />
    </div>


    <div class="form-group">
    <label class="col-form-label"><i class="fa fa-lock"style="color:#007bff; font-size:18px;"></i> Password</label>
    <input type="password" class="form-control" placeholder="**********" id="user_password"   name="user_password"  data-parsley-password data-parsley-password-message='Wrong password inserted' />
    </div>

    <input type="hidden" name="page"   value='login' />
    <input type="hidden" name="action" value="login_check" />

<div class="d-flex mb-5 align-items-center">
<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
<input type="checkbox" checked="checked">
<div class="control__indicator"></div>
</label>

<span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
</div>
<input type="submit" name="user_login" id="user_login" class="btn btn-block btn-primary" value="Sign In">
                  
<a href='../index.php' class="">  
    <div class="btn btn-block btn-success mt-4" >	 	
    Goto Home
    </div>	
 </a> 


</form>



</div>
</div>
</div>
</div>
</div>
 
</body>
</html>

<script>
 

$(document).ready(function(){
	
  const btn = document.querySelector('#loading');

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
	  
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
      $.ajax({
        url:"../pageajax.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function()
        {
			
		 // btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
          $('#user_login').attr('disabled', 'disabled');
		  $('#user_login').addClass('btn-info');
          $('#user_login').val('Please wait...');
		  
        },
        success:function(data)
        {
          if(data.success)
          {
                location.href='index.php';
                $('#user_login').attr('disabled', false);

                $('#user_login').val('Login Success!!');
          }
          else
          {
			  
                $(btn).html('<div>    </div>');
                $('#message').html('<div class="alert alert-danger">Login Failed!! <br>'+data.error+'</div>');

                $('#user_login').attr('disabled', false);

                $('#user_login').val('Sign In');
                $('#user_login').addClass('btn-primary');

                //alert("Login Failed!!");
                //window.location.reload();
		 
          }


        }
      })
    }

  });

});


</script>