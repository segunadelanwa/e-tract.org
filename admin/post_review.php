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
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


	
<script type="text/javascript">

 

 


</script> 
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
                        <h1 class="mt-4 transform-capitalize"> 
					          <i class="fas fa-briefcase"></i> Post Review
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $_GET['post_category']?> post</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                                                 All   <?php echo $_GET['post_category']?> post
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

						   <div class="card mb-4" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3 style="text-transform:capitalize"><?php echo $_GET['post_category']?> post</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr> 
                                                 
                                                <th>Operation</th>
                                                <th>News Photo</th>  
                                                <th>News Caption</th>   
                                                <th>News Categories </th>
                                                <th>News Source</th> 
                                                <th>News Source Url</th> 
                                                <th>Uploaded By</th>
                                                <th>Uploaded By </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchPostReview($_GET['post_category']); ;	
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     
                                                    
                                                      
                                                      echo'
													  <tr role="row" class="odd">
                                                      <td>  
                                                      <a href="post_delete.php?post='.$active['id'].'"><div class="btn btn-danger mb-1" >Delete Post</div></a> 
                                                      <a href="post_edit.php?edit_post='.$active['id'].'"><div class="btn btn-primary mb-1" >Edit Post</div></a>
                                                      <a href="view_post.php?review_post='.$active['id'].'"><div class="btn btn-success mb-1" >Review Post</div></a>
                                                      </td> 

                                                        <td> 
                                                         <img src="../upload_img/'.$active['image1'].'"  style="height:150px"   />
                                                        </td> 
                                                        
                                                        <td>'.$active['caption'].' </td>  
                                                        <td>'.$active['other_categories'].' </td>
                                                        <td>'.$active['source'].' </td>
                                                        <td>'.$active['source_url'].' </td> 
                                                        <td>'.$active['uploaded_by'].' </td>
                                                        <td>'.$active['date_upload'].' </td>  
                                                        </tr> 
                                                      ';
                                                


                                                    
                                                  } 	 
                                                ?>                     
                                        
                                          </tbody>
                                   
								                                    
								                    </table>
                               
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
    
           <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
 
    </body>
</html>


<script>
 
 	$(document).on('click', '#nameSearch', function(event){
    event.preventDefault();
	
    const	equipment_id = document.getElementById("equipment_id").value; 
	 //alert(searchNo);
	 
 	
			$.ajax({
				url:"pageajax.php",
				method:"POST",
				data:{
					equipment_id:equipment_id,   
					page:'setupMaint',
					action:'equipID'
					},
			
				success:function(data)
				{
				$('#otpupdatebox').append(data);
				
				$('#nameSearch').attr('disabled', true); 
				$('#nameSearch').removeClass('btn-warning');
				$('#nameSearch').addClass('btn-success');
				$('#nameSearch').text('Search success'); 
				 
				}
			});	
		 
		
	});


const searchForm = document.getElementById('searchForm');

searchForm.addEventListener("submit", customerSearch, false);

function customerSearch(e) {
	
	  e.preventDefault();
	
 
		
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
				$('#nameReset').attr('disabled', 'disabled');
				$('#nameReset').addClass('btn-info');
				$('#nameReset').val('Please wait...');

				},
				success:function(data)
				{
	                  if(data.success){
						  
						  alert(data.feedback);
						  location.href='index.php';
					  }
					  else
					  {
						  
						  alert(data.feedback);
						  
					  }
				}
			});	
		
		
	
}

</script>



 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 


