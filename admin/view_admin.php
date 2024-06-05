<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("header.php");
		?>
			<title></title> 	
    </head>
	
<style>

#MaintenanceDate, #setdaily, #setmonthly,#setyearly{
display:none
}
#MaintenanceHours{
display:none
}

</style>


 
 


 
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
					          <i class="fas fa-briefcase"></i> Registered Admin
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                  
					 
  
						   <div class="col-md-12"> 
 				 
					 
					 
									 
												<div class="card-header">
													<i class="fas fa-briefcase"></i>
                          Registered Admin  
												</div>
												
												<div class="card-body">
													
													<div class="table-responsive">
														
 
 

				   
													</div>
										
										</div>
										 
					  
	                       </div>

						   <div class="card mb-4" name="DisplayEquipmentRow">
                             <div class="card-header bg bg-dark text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3 style="text-transform:capitalize">Admin</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr> 
                                                 
                                               
                                                <th>Photo</th>  
                                                <th>Username</th>   
                                                <th>Fullname </th>
                                                <th>Phone</th> 
                                                <th>Status</th> 
                                                <th>Date</th> 
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
                                                    <?php 
                                                  
                                                  $result = $Loader-> FetchRegAdmin(); 	
                                                 
                                                  foreach($result as $active)
                                                  {
                                                     
                                                    
                                                      
                                                      echo'
													                            <tr role="row" class="odd">
                                                
                                                        <td> 
                                                         <img src="../admin_img/'.$active['photo'].'"  style="width: 100px;height:100px;border-radius:400px"   />
                                                        </td> 
                                                        
                                                        <td>'.$active['username'].' </td>  
                                                        <td>'.$active['fullname'].' </td>
                                                        <td>'.$active['phone'].' </td>
                                                        <td>'.$active['acct_level'].' </td> 
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
    
    
        <script src="js/scripts.js"></script>
    
           <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
 
    </body>
</html>

 