<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title> Christ Cornerstone Society Etract </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="fontawesome/css/all.min.css" type="text/css" /> 
    <link rel="stylesheet" href="css/slick.css" type="text/css" />   
    <link rel="stylesheet" href="css/tooplate-simply-amazed.css" type="text/css" />
<!--

Tooplate 2123 Simply Amazed

https://www.tooplate.com/view/2123-simply-amazed

-->

<script src="scripts/jquery.min.js"></script>
	<script src="scripts/parsley.js"></script>
	<script src="scripts/popper.min.js"></script>
	<script src="scripts/bootstrap.min.js"></script>
	<script src="scripts/jquery.dataTables.min.js"></script>
	<script src="scripts/dataTables.bootstrap4.min.js"></script>
</head>

<body>
    <div id="outer">
        <header class="header order-last" id="tm-header">
            <nav class="navbar">
                <div class="collapse navbar-collapse single-page-nav">
                    <ul class="navbar-nav">
                    
                        <li class="nav-item">
                            <a class="nav-link" href="index.php"><span class="icn"><i class="fas fa-2x fa-air-freshener"></i></span> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section-1"><span class="icn"><i class="fas fa-2x fa-air-freshener"></i></span> Registeration</a>
                        </li>
                
                    </ul>
                </div>
            </nav>
        </header>
        
        <button class="navbar-button collapsed" type="button">
            <span class="menu_icon">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </span>
        </button>
        
        <main id="content-box" class="order-first">
            <div class="banner-section section parallax-window" data-parallax="scroll" data-image-src="img/section-1-bg.jpg" id="section-1">
                <div class="container">
                    <div class="item" >
                        <center>
                        <div class="bg-blue-transparent logo-fa"><span><i class="fas fa-2x fa-atom"></i></span> E-Tract<br/> Account Registration</div>
                   
                       </center>
                    </div>
                </div>
            </div>
        
            <section class="work-section section" id="section-2">
                <div class="container">

                    <div class="title">
                         <span id="message"></span>
                       <center> <h2>Register</h2></center>
                      
                    </div>
                    
                    <div class="row">
                    <form  method="POST"  id="equipmentRegistration">
                                    <div class="form-group">
                                    <label style="color:#fff;">Enter fullname  </label> 
                                        <input name="fullname"  id="fullname" type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    <label style="color:#fff;">Enter email  </label> 
                                        <input name="email"  id="email" type="text" class="form-control" required>
                                    </div> 
                                    <div class="form-group">
                                    <label style="color:#fff;">Enter phone no </label> 
                                        <input name="phone"  id="phone" type="text" class="form-control" required>
                                    </div> 

                                    <input type="hidden" name="page"   value='Register' />
									<input type="hidden" name="action" value="Register" /> 


                                    <div class="form-group text-right">
                                        <input type="submit" name="add_equip" id="add_equip"  class="btn btn-primary" value="Submit">
                                    </div>
                                </form>
                    </div>                    
                </div>
            </section>

    

           
        </main>
    </div>

  
 
    <script src="js/bootstrap.bundle.min.js"></script>
    <script rc="js/jquery.singlePageNav.min.js"></script>
    <script src="js/slick.js"></script>
    <script src="js/parallax.min.js"></script>
    <script src="js/templatemo-script.js"></script>
</body>
</html>

<script>
 


$(document).ready(function(){
 
  $('#equipmentRegistration').parsley();  
  

 

	$('#equipmentRegistration').on('submit', function(event){
				
			
		
		event.preventDefault();

	
		
		$.ajax({
			url:"pageajax.php", 
			method:"POST",
			data:new FormData(this),
			dataType:"json",
			contentType:false,
			cache:false,
			processData:false,
			beforeSend:function()
			{
				
			// btn.innerHTML = '<div class="loader-bg">  <div class="loader-bar">  </div>  </div>';
			$('#add_equip').attr('disabled', 'disabled');
			$('#add_equip').addClass('btn-info');
			$('#add_equip').val('Please wait...');
			
			},
			success:function(data)
			{
			if(data.success == 'success')
			{
                $('#message').html('<div class="alert alert-success">'+data.feedback+'<br>Your Access Code '+data.access+'</div>');
                $('#add_equip').val('Success!!');
                $('#add_equip').attr('disabled', 'disabled');
			}
			else
			{
                $('#message').html('<div class="alert alert-danger">'+data.feedback+'</div>');
                $('#add_equip').val('Try Again!!');
			
			}


			}
		})
		

	});

 
 
 


 
});


</script>
