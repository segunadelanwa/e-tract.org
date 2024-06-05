
<!DOCTYPE html>
<html lang="zxx">

<head>


	 
		<?php

		
				include("config.php");
				$loader = new Loader;
				$date = date("Y-m-d");
				
				@$http_referer = $_SERVER['HTTP_REFERER'];
				
				$auto_id =time();// + $rand;
				$ref_id ="GT$auto_id"; 

				$id = $_GET['etract'];
				$result = $loader->FetchPost($_GET['etract']); 
				if(empty($result)){
					
					header("Location: index.php");
				}

				foreach($result as $row)
				{

				$title      =strtoupper($row['caption']);
				$image      = 'etract_img/'.$row['image1'];
				$textarea   = $row['textarea']; 
				$post_id   = $row['post_id']; 
				$url ='http://127.0.0.1/e-tract.org/';
				//$url ='https://-tract.org';
				}

				 $loader->ETractReader($_GET['etract'])
		?> 	

		
 
 
<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   

		 
    <meta name="msapplication-TileImage" content='<?php echo"$url/readerpage.php?etract=$id"?>'>
		<meta property='og:url'              content='<?php echo"$url/readerpage.php?etract=$id"?>'>
		<meta property='og:site_name'        content='E-TRACT'>  
		<meta property='og:title'            content='<?php echo"$title"; ?>'>
		<meta property="og:image:secure_url" content='<?php echo"$url/$image"?>'>
		<meta property="og:image"            content='<?php echo"$url/$image"?>'>
		<meta property='og:description'      content='E-TRACT' >
		<meta property="og:image:type"       content="image/jpeg">
		<meta property="og:image:width"      content="300">
		<meta property="og:image:height"     content="300">
		<meta property='al:ios:url'          content='<?php echo"$url/readerpage.php?etract=$id"?>'>
		<meta property='al:ios:app_store_id' content=''>
		<meta property='fb:app_id'           content='232273500911428'>



		<link rel="shortcut icon" href="<?php echo"$url/$image"?>" /> 
        <meta name="keywords" content="<?php echo"$title"; ?>." />
		<!-- <meta name="theme-color"   content="#c908bd">  -->

		<title>
			<?php echo"$title"; ?>
		</title>		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 
	
  	<link rel="stylesheet" href="scripts/bootstrap.min.css">
    <link rel="stylesheet" href="scripts/dataTables.bootstrap4.min.css">
	
  	<script src="scripts/jquery.min.js"></script>
 
 
	<!-- Custom-Files -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Bootstrap css -->
 
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<link rel="stylesheet" href="css/font-awesome.css">
	<!-- Font-Awesome-Icons-CSS -->
 

	<!-- web fonts -->
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //web fonts -->
</head>

   <div id="fb-root"></div>
   
    <script>
    (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=232273500911428";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

    function fb_share(dlink, dtitle) { 
	//console.log(dtitle);
        var app_id = '232273500911428';
        var pageURL="https://facebook.com/dialog/feed?app_id=" + app_id + "&link=" + dlink;
        var w = 600;
        var h = 400;
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        window.open(pageURL, dtitle, 'toolbar=no, location=no, directories=no, status=no, menubar=yes, scrollbars=no, resizable=no, copyhistory=no, width=' + 500 + ', height=' + 450 + ', top=' + top + ', left=' + left)
       return false;
    }
    </script> 
   
 	



 
 
  <link rel="stylesheet" href="css/style-starter.css">
  <!-- Template CSS -->
  <link href="//fonts.googleapis.com/css?family=Playfair+Display:400,400i,700&display=swap" rel="stylesheet">
  <link href="//fonts.googleapis.com/css?family=Montserrat:300,300i,400,600,700,800&display=swap" rel="stylesheet">
  <!-- Template CSS -->
 






</head>

<body>
<!-- Headers-4 block -->
<section class="w3l-header-6-main mobile-header">
    <div class="header-section-hny">
        <div class="header-top header-part-2">
            <div class="container">
                <!-- /header-top-inn-->
                <div class="header-inn-top">
                    <div class="logo-brand text-center">
                        <a class="nav-brand" href="index.html" style="font-size:30px;color:#fff; ">
                            <!-- <img src="assets/images/logo2.png" alt="" title="Halleluyahnite" style="max-height:40px;width:auto;" /> -->
                            <?php echo"$title"; ?>
                        </a>
                    </div>

                </div>
                <!-- //header-top-inn-->
            </div>
        </div>


        <center class="header-hny-block">
            <div class="container">
				<a   href="index.php"  >
				    <i class="fas fa-long-arrow-left" style="font-size:40px"></i>
				</a>
            </div>

        </center>
    </div>

</section>
 
<section class="w3l-mag-main">
	<!--/mag-content-->
	<div class="mag-content-inf py-5">
		<div class="container">
			<div class="banner-bottom-sechny py-md-4">
				 
				<div class="ban-content-inf row py-lg-3">
					 

		 


							<div class="maghny-gd-1 col-md-12">
											<div class="maghny-grid">
												<figure class="effect-lily">
													<img src="<?php echo"$url/$image"; ?>"  style="height:100%">
												
												</figure>
											</div>

											<p style="font-size:16px;color:black"  >
												<textarea style="background-color:#fff; border:1px solid #fff;"  rows='30%' cols='100%'  class="form-control" disabled><?php echo"$textarea"; ?> </textarea>
											</p>


								
							</div>

							<div class="post-item-grid mb-4" style="display:flex">
								<div class="btn btn-primary ml-2 col-6" >	
									<a href='javascript:void(0);' class='text-white' onclick="fb_share('https://e-tract.org/readerpage.php?etract=<?php echo$id; ?>', '<?php echo"$title"; ?>')   ">								
									<i class="fa fa-facebook"></i>
									</a>
									</div>	

									<a class="btn btn-success ml-2 col-6"  style='color:white;'   href='whatsapp://send?text=https://e-tract.org/readerpage.php?etract=<?php echo"$id"; ?>' >					
									<i class="fa fa-whatsapp"></i>  
									</a>


									<a class="btn btn-dark ml-2 col-6"  style='color:white;'   href='https://twitter.com/intent/tweet?text=https://e-tract.org/readerpage.php?etract=<?php echo"$id"; ?>' >					
									<i class="fa fa-twitter"></i>  
									</a>

</div>

							
					</div>
			    </div>
               
				<div class="blog-inner-grids py-md-4 mt-3">
					<div class="mag-content-left-hny">
						<!--//mag-left-grid-1-->
						<div class="mag-hny-content mb-lg-5">
							
							<!--/mag-left-grid-1-->
							<div class="maghny-grids-inf row">
						
								<div class="side-bar-hny-recent mb-5">
								<h3 class="hny-title">READ MORE E-TRACT</h3>
									<div class="mag-small-post">

									<?php
																		
									
												$result_two = $loader->SubReadMore_2(); 

												foreach($result_two as $row){
												echo'
                        <a href="./readerpage.php?etract='.$row['id'].'"  >
												<ul lass="post-item-grid mb-4" >

													<li>
                          <h4 class="mag-post-title" >'.$row['caption'].' </h4>
													<img src="etract_img/'.$row['image1'].'"   style="border-radius:5px;height:250px;width:200px">
 
											 
													</li>
												</ul>
												</a>';
												}

									?>

									</div>
							</div>
							
						</div>
					


						</div> 

			
					</div>
				</div>
	
	        </div>
	   </div>
	</div>
 
</section>

 

 

</body>
</html>