<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("header.php");
		?>
			
    </head>
	
 

	
 
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
				<?php
				require("dashboard_head.php");
				?>
        </nav>
		
        <div id="layoutSidenav">
		
            <div id="layoutSidenav_nav">

				<?php
				require("sidebar.php");
				?>
				
		  </div>
           
		   <div id="layoutSidenav_content">
		   
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">
						
					<i class="fas fa-briefcase"></i>  Add Admin
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ol>
                  
					 
  
						   <div class="col-xl-6"> 
 				 
					 
					 
										<div class="card mb-4">
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
													Add Admin
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														

													 
				   
															<form method="POST"   id="equipmentRegistration">
																  <div class="form-group" id="CorrectiveEquip" >

																                                                                                                          

                                                                                                               
																	<div class="form-group">	
																		<label>Admin Photo   </label>
																		<input type="file" name="news_img" placeholder="Photo"  id="news_img" class="form-control" required />
																	</div>

																	<div class="form-group">	
																		<label>Username </label>
																		<input type="text" name="uername" placeholder=""  id="uername" class="form-control" required />
																		
																	</div>


																	<div class="form-group">	
																		<label>Password  </label>
																		<input type="password" name="password_1"   id="password_1" class="form-control" required />
																	</div>


																	<div class="form-group">	
																		<label> Confirm Password  </label>
																		<input type="password" name="password_2"   id="password_2" class="form-control" required />
																	</div>


																	
																	<div class="form-group">	
																		<label>Fullname </label>
																		<input type="text" name="fullname"  id="fullname" class="form-control" required />
																	</div>

																		   
																	<div class="form-group">	
																		<label>Phone  </label>
																		<input type="text" name="phone"  id="phone" class="form-control" required />
																	</div>


 
 

																 
 
																			
																			<input type="hidden" name="page"   value='AddAdmin' />
																			<input type="hidden" name="action" value="AddAdmin" /> 


																			<input type="submit" name="add_equip" id="add_equip" class="btn btn-primary" value="Upload Post">
																		</div>
															
															</form>
 
													</div>
										
										</div>
										 
					  
	                       </div>
		  
				 
				         </div>
				  </div>
                </main>
               
			   <footer class="py-4 bg-light mt-auto">
                   <?php 
				   require("footer.php"); 
				   ?>
                </footer>
				
				
            </div>
        </div>
    
    
        <script src="js/scripts.js"></script>
    
   
 
    </body>
</html>


<script>
 


$(document).ready(function(){
 
  $('#equipmentRegistration').parsley();  
  $('#equipmentRegistration2').parsley();  

 

	$('#equipmentRegistration').on('submit', function(event){
				
			
		
		event.preventDefault();

	
		
		$.ajax({
			url:"../pageajax.php", 
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
			if(data.success)
			{
				alert(data.feedback);
				window.location.href = "index.php";
				//window.location.href = "../"+data.link+"";
			}
			else
			{
				alert(data.feedback);
			
			}


			}
		})
		

	});

 
 
 


 
});


</script>






