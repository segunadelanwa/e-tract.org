<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title> Admin Dashboard</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
		
		
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/parsley.js"></script>
        <script src="scripts/popper.min.js"></script>
        <script src="scripts/bootstrap.min.js"></script>
        <script src="scripts/jquery.dataTables.min.js"></script>
        <script src="scripts/dataTables.bootstrap4.min.js"></script>

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
                        <h1 class="mt-4 h2">
						
                       Admin Dashboard
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">HOME</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
								
                                    <div class="card-body">Total E-tract Posted <center><h2 ><?php echo $loader-> FetchTotalPost();	?> </h2></center></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#DisplayEquipmentRow">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
  
							
					 
						
 
						
				    	<div class="card mb-4 col-md-12" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>All Pending E-Tract</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr> 
                                                <th>Operation</th>
                                                <th> E-Tract Photo</th>
                                                <th>E-Tract Title</th>   
                                                <th> E-Tract Status </th> 
                                                <th> Date Uploaded </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $loader-> FetchPendinEtract();	
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     
                                                    
                                                      
                                                      echo'<tr role="row" class="odd">
                                                      <td>  
                                                      <a href="post_edit.php?edit_post='.$active['id'].'"><div class="btn btn-success mb-1" >Approve E-Tract</div></a><br />
                                                      <a href="view_post.php?review_post='.$active['id'].'"><div class="btn btn-primary mb-1" >Review  E-Tract</div></a><br />
                                                      <a href="post_delete.php?post='.$active['id'].'"><div class="btn btn-danger mb-1" >Delete E-Tract</div></a> 
                                                      </td> 
                                                    
                                                        <td> 
                                                         <img src="../etract_img/'.$active['image1'].'"  style="height:70px"   />
                                                        </td> 
                                                        
                                                        <td>'.$active['caption'].' </td>    
                                                        <td>'.$active['status'].' </td>    
                                                        <td>'.$active['date'].' </td>    
                                                        
                                                       
                                 



                                                      </tr> 
                                                      ';
                                                


                                                    
                                                  } 	 
                                                ?>                     
                                        
                                          </tbody>
                                   
								                                    
								                    </table>
                               
                                </div>
                            </div>
                        </div>
						

                        



				    	<div class="card mb-4  col-md-12" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3>All Approved E-Tracts</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable_2" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr> 
                                                <th>Operation</th>
                                                <th> E-Tract Photo</th>
                                                <th>E-Tract Title</th>   
                                                <th> E-Tract Status </th> 
                                                <th> Date Uploaded </th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $loader-> FetchApproveEtract();	
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     
                                                    
                                                      
                                                      echo'<tr role="row" class="odd">
                                                      <td>   
                                                      <a href="view_post.php?review_post='.$active['id'].'"><div class="btn btn-primary mb-1" >Read E-Tract</div></a><br />  
                                                      <a href="post_edit.php?edit_post='.$active['id'].'"><div class="btn btn-danger mb-1" >Re-Edit E-Tract</div></a><br />
                                                       </td> 
                                                    
                                                        <td> 
                                                         <img src="../etract_img/'.$active['image1'].'"  style="height:70px"   />
                                                        </td> 
                                                        
                                                        <td>'.$active['caption'].' </td>    
                                                        <td style="text-transform:uppercase">'.$active['status'].'d </td>    
                                                        <td>'.$active['date'].' </td>    
                                                        
                                                       
                                 



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
    
        <script rc="js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
		
        <script src="js/scripts.js"></script>
        <script src="js/Chart.min.js" crossorigin="anonymous"></script>
        
       
		
        <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
		  
		
		
    </body>
</html>
<!-- <script>
    function refreshPage()
    {
        window.location = window.location.href;
    }
    setInterval('refreshPage()', 5000);
</script> -->

<script>



  $(document).on('click', '#approveEquip', function(event){
event.preventDefault();

const	id = document.getElementById("equip_id").value; 
 //alert(searchNo);
 

		$.ajax({
			url:"pageajax.php",
			method:"POST",
			dataType:"json",
			data:{
				id:id,   
				page:'setupMaint',
				action:'approve_maint'
				},
			success:function(data)
			{
				  if(data.success){
					  
					  alert(data.feedback);
					  location.href='approved_maint.php';
				  }
				  else
				  {
					  
					  alert(data.feedback);
					  
				  }
			}
		});	
	 
	
  
	
});
  



  $(document).on('click', '#approveDelete', function(event){
event.preventDefault();

const	id = document.getElementById("equip_id").value; 
 //alert(searchNo);
 

		$.ajax({
			url:"pageajax.php",
			method:"POST",
			dataType:"json",
			data:{
				id:id,   
				page:'setupMaint',
				action:'delete_maint'
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
	 
	
  
	
});
  
 </script> 
 
 
 <script> 
  
  
  
  

// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example



 


 
	
	
	
	
	
