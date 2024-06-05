				<?php
				include("index_header.php");
				?>
<!DOCTYPE html>
<html lang="en">
    <head>
	
		<?php
		include("header.php");
		?>
			<title>ECMT APPROVED MAINTENANCE</title> 	
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

 

function calender(calend) {
     var calend = document.getElementById(calend);
     const main_d_btn = document.querySelector('#MaintenanceDate');
	 const hours_d_btn = document.querySelector('#MaintenanceHours');
	 
  
	 if(calend.value == "calender"){
		 
	     main_d_btn.style.display="block";
		 hours_d_btn.style.display="none";
		 
	 }else if(calend.value == "run_hour"){
		 
		 hours_d_btn.style.display="block";
		 main_d_btn.style.display="none";
	 }
	 
 
}


function mainSelection(val) {
	

/*alert(val);*/	


     const setdaily   = document.querySelector('#setdaily'); 
     const setmonthly = document.querySelector('#setmonthly'); 
     const setyearly  = document.querySelector('#setyearly'); 
	 
  
	 if(val == "daily"){
		 
	     setdaily.style.display="block"; 
	     setmonthly.style.display="none"; 
	     setyearly.style.display="none"; 
		 
	 }else if(val == "monthly"){
		 
	     setdaily.style.display="none"; 
	     setmonthly.style.display="block"; 
	     setyearly.style.display="none"; 
		 
	 }else if(val == "yearly"){
		 
	     setdaily.style.display="none"; 
	     setmonthly.style.display="none"; 
	     setyearly.style.display="block"; 
	 }
 
 
}



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
                        <h1 class="mt-4"> 
					          <i class="fas fa-briefcase"></i>Approved Maintenance
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Approved Maintenance</li>
                        </ol>
                  
					 
  
			 
				    	<div class="card mb-4">
                             <div class="card-header bg bg-success text-white">
                                <i class="fas fa-table mr-1"></i>
                               <h3> Approved Equipment(s) Maintenance </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                       
                                   
                                        <thead>
                                            <tr>
                                                <th>Equip </th> 
                                                <th>Equip Name</th> 
                                                <th>Category</th>
                                                <th>Maintenance Subject </th>
                                                <th>Maintenance Details</th>
                                                <th>Approve Status</th>
											    <th>Equip Maintenance</th>
											    <th>Approve </th>
                                                
                                            </tr>
                                        </thead> 
                                        <tbody> 
     <?php 
	
	$result = $Loader-> ApproveMaintenance();	
	foreach($result as $active)
	{
		
	 
			
			echo'<tr role="row" class="odd">
		 
				<td> '.$active['equipment_id'].' <br />   <img src="equip_img/'.$active['equip_photo'].'"  style="height:70px"   /> </td> 
				
				<td>'.$active['equip_name'].' </td>
				<td>'.$active['categories_main'].' </td>
				<td>'.$active['maint_subject'].' </td>
				<td>'.$active['maint_feedback'].' </td>
				<td>   <div class="btn btn-success">'.$active['approve_status'].'... </div> </td>
			    <td> Equip Operator: <br /> '.$active['operator_name'].'<hr /> Date Uploaded: <br /> '.$active['date_maintain'].' <hr /> Next Maintenance: <br /> '.$active['next_maint_date'].' </td> 
				
			    <td >
					 
				</td> 
				 
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
 


$(document).ready(function(){
 
  $('#corrective_maintenance_calender').parsley(); 
  $('#corrective_maintenance_runhour').parsley(); 

 

 $('#corrective_maintenance_calender').on('submit', function(event){
	        
		  
	/*
    $('#calender_setdaily_dailyWeekly').attr('required', 'required');
    $('#calender_setdaily_monthly').attr('required', 'required');
    $('#calender_setdaily_yearly').attr('required', 'required');
	
    $('#calender_setmonthly_monthly').attr('required', 'required');
    $('#calender_setmonthly_day').attr('required', 'required');
    $('#calender_setmonthly_yearly').attr('required', 'required');
	
    $('#calender_setyearly_yearly').attr('required', 'required');
    $('#calender_setyearly_day').attr('required', 'required');
    $('#calender_setyearly_month').attr('required', 'required');

    $('#runhour_time').attr('required', 'required');
	*/		  
    event.preventDefault();

    $('#equipment_photo').attr('required', 'required');

    $('#equipment_id').attr('required', 'required');

    $('#equipment_name').attr('required', 'required');
    $('#main_selection').attr('required', 'required');

	

	
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
          if(data.success)
          {
			   alert(data.feedback);
			   location.href='index.php'; 
          }
          else
          {
              alert(data.feedback);
		 
          }


        }
      })
    

  });

 $('#corrective_maintenance_runhour').on('submit', function(event){
	        
		  
 
    event.preventDefault();

    $('#equipment_photo').attr('required', 'required');

    $('#equipment_id').attr('required', 'required');

    $('#equipment_name').attr('required', 'required');
 

	

	
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
          if(data.success)
          {
			   alert(data.feedback);
			   location.href='index.php'; 
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






