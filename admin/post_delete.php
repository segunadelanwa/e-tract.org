<?php
				include("index_header.php");
?>
<!DOCTYPE html>
<html lang="zxx">

<head>


	 
		<?php

		
			 
				
				@$http_referer = $_SERVER['HTTP_REFERER'];
				
			 

				$id = $_GET['post'];
				$result = $Loader->FetchPostRaw($_GET['post']); 
				if(empty($result)){
					
					header("Location: index.php");
				}

				foreach($result as $row)
				{

                    $title =strtoupper($row['caption']);
                    $image      = 'etract_img/'.$row['image1'];
                    $textarea   = $row['textarea']; 
                    $date_upload= $row['date']; 
                    $url ='http://127.0.0.1/e-tract.org/';
                    //$url ='https://e-tract.org';
				}

			  
		?> 	

 
 
		<?php
		    include("header.php");
		?>



		<link rel="shortcut icon" href="<?php echo"$url/$image"?>" /> 
        <meta name="keywords" content="<?php echo"$title"; ?>." />

		<title>
			<?php echo"$title"; ?>
		</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 
 
</head>

   <div id="fb-root"></div>
   
 
   
 	



 
 
  <link rel="stylesheet" href="../assets/css/style-starter.css">
 

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
					          <i class="fas fa-briefcase"></i> 
						</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Delete E-Tract Post</li>
                        </ol>
                  
 
 
<section class="w3l-mag-main">
            <!--/mag-content-->
            <div class="mag-content-inf py-5">
                <div class="container">
                    <div class="banner-bottom-sechny py-md-4">
                        <h3 class="hny-title text-center text-danger">  <span>ARE YOU SURE YOU WANT TO DELECT THIS E-TRACT?</span></h3>
                        <div class="ban-content-inf row py-lg-3">
                            <div style="width:100%;text-align:center;"> <h2 class="top-title mb-3"><a href="#"> <?php echo"$title"; ?></a></h2> </div>

    
                                <div class="maghny-gd-1 col-md-12">
                                                <div class="maghny-grid">
                                                    <figure class="effect-lily">
                                                        <img src="<?php echo"$url/$image"; ?>"  style="height:100%">
                                                        <figcaption>


                                                        </figcaption>
                                                    </figure>
                                                </div>

                                                <p style="font-size:16px;color:black"  >
											<textarea style="background-color:#fff; border:1px solid #fff;"  rows='30%' cols='100%'  class="form-control" disabled><?php echo"$textarea"; ?> </textarea>
										</p>



                                            <div class="btn btn-danger ml-2 " id="add_equip"  onclick="DeleteEtract(<?php echo$id;?>)">	 	
                                            Delete  E-Tract
                                            </div>	
                                </div>

                        </div>
                    </div>
        

                    

        </div>
</section>
 
 

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
 
 
 function DeleteEtract(val){
				
			

		
		$.ajax({
			url:"../pageajax.php", 
			method:"POST",
            data:{    
                delValue:val,
                page:'DelPost',
                action:'DelPost'
                },   
            dataType:"json", 
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
				alert(data.feedback);
                location.href='index.php';
				//window.location.reload(); 
			}
			else
			{
				alert(data.feedback);
			
			}


			}
		})
		
 
}
 


 

</script>