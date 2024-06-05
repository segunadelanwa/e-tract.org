<?php



include("config.php");



$loader = new Loader;
 
require('connect_2.php');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
  
   $loader->query='SELECT * FROM `login_table` WHERE  `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$acc_fullname =  $row['fullname'];
			$phone        =  $row['phone']; 
			$acct_level   =  $row['acct_level'];  
			$registrar    =  $row['registrar']; 
 
			}
	 
	 
   
	         
	 
		 }
 
} 
 


	$current_date  = date('Y-m-d');	
	$ip_address = $_SERVER['REMOTE_ADDR'];
	$current_datetime = date("Y-m-d");
	$time = date("H:i:s", STRTOTIME(date('h:i:sa')));

if(isset($_POST['page']))
{
 
 	
 
	

	if($_POST['page'] == 'login')
	{
 

		if($_POST['action'] == 'login_check')
		{
			$loader->data = array(
				':user_email_address'	=>	$_POST['user_email_address']
			);
	 
			$loader->query = "
			SELECT * FROM login_table 
			WHERE username = :user_email_address
			";

			$total_row = $loader->total_row();

			if($total_row > 0)
			{
				$result = $loader->query_result();

				foreach($result as $row)
				{
					 
						if(password_verify(trim($_POST['user_password']), $row['password']))
						{
							$_SESSION['username'] = $row['username'];
							$_SESSION['password'] = $row['password'];

							$output = array(
								'success'	=>	true
							);
						}
						else
						{
							$output = array(
								'error'		=>	"Wrong Password Detected!. Please try again or click Recover Account below"
							);
							
						}
			 
				}
			}
			else
			{
				$output = array(
					'error'		=>	'This email address is not registered. <br/>Please register below to get started'
				);
			}

			echo json_encode($output);
		}



		
 	}


 




	 if($_POST['page'] == 'UpdatePost')
	 {
			
		 if($_POST['action'] == 'UpdatePost')
		 {
			 
		   
			  
			 $post_title                        =  trim($_POST['post_title']);  
			 $post_text_area                    =  trim($_POST['post_text_area']); 
			 $post_id                           =  trim($_POST['post_id']); 			
 
	 
								 
							 $loader->filedata = $_FILES['post_img'];
							 $event_ban = $loader->Upload_file($post_id);	
							 
							// if($event_ban == '1' )
							// {	
							
									
									
								
							
									$query_wallet ="UPDATE `public_post` SET 
									`caption`          =  '$post_title',   
									`textarea`         =  '$post_text_area',    
									`status`           =  'approve'    
									WHERE  `public_post`.`id` = '$post_id' ";
									if(mysqli_query($homedb,$query_wallet))
									{
													
						
										
											$output = array(
												'success'		=>	'success',
												'feedback'		=>	'E-Tract is live and approved successfully!!. '
											);

									}
									else
									{
										
											$output = array(
												'success'		=>	'failed',
												'feedback'		=>	"Newtwork error"
											);
									}

		
									
									
		
							// }
							// else
							// {
								
							// 		$output = array(
							// 			'success'		=>	'failed',
							// 			'feedback'		=>	"$event_ban Error uploading equipment photo. Please try again"
							// 		);
							// }
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	
  


	 if($_POST['page'] == 'AddEtract')
	 {
			
		 if($_POST['action'] == 'AddEtract')
		 {
			//May 14, 2024
			$current_date  = date('Y-m-d');	 
		 
			 $news_title                        =  trim($_POST['news_title']); 
			 $access_code                       =  trim($_POST['access_code']);  
			 $post_text_area                    =  trim($_POST['post_text_area']); 
			 $gen_slug                          =   $loader->Generateslug(trim($_POST['news_title'])); 			
 
			 $loader->query = " SELECT * FROM etract_uploader WHERE access_code = '$access_code' "; 
			 $total_row = $loader->total_row();
 
			 if($total_row > 0)
			 { 




					$loader->filedata = $_FILES['news_img'];
					$Upload_file = $loader->Upload_file();	


							
								$query_wallet =("INSERT INTO `public_post` VALUE (
									'',
									'".mysqli_real_escape_string($homedb, $Upload_file)."',	 	 								 
									'".mysqli_real_escape_string($homedb, $gen_slug)."',
									'".mysqli_real_escape_string($homedb, $news_title)."',  
									'".mysqli_real_escape_string($homedb, $post_text_area)."',
									'".mysqli_real_escape_string($homedb, 'pending')."',
									'".mysqli_real_escape_string($homedb, $access_code)."',
									'".mysqli_real_escape_string($homedb, $current_date)."'
									)");
									if(mysqli_query($homedb,$query_wallet))
									{
													
						
										
											$output = array(
												'success'   =>	'success', 
												'feedback'	=>	'E-Tract uploaded for review successfully!!. '
											);

									}
									else
									{
										
											$output = array(
												'success'		=>	'failed',
												'feedback'		=>	"Newtwork error"
											);
									}

			}
			else
			{
				
					$output = array(
						'success'		=>	'failed',
						'feedback'		=>	"Opps!. You have passed an invalid Access Code "
					);
			}

									
									
		
					 
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	


	 if($_POST['page'] == 'Register')
	 {
			
		 if($_POST['action'] == 'Register')
		 {
			$date  = date('Y-m-d');	
		 
			  
			 $fullname     =  trim($_POST['fullname']); 
			 $email        =  trim($_POST['email']);
			 $phone        =  trim($_POST['phone']); 
			 $accessCode   =  $loader->FetchAccessCode();


			 $loader->query = " SELECT * FROM `etract_uploader`  WHERE email = '$email' || phone = '$phone' ";  
			 $total_row = $loader->total_row();

			 
			if($total_row == 0)
			{				 
				
				                          $query_wallet =("INSERT INTO etract_uploader VALUE (
											'',
											'".mysqli_real_escape_string($homedb, $fullname)."',	   
											'".mysqli_real_escape_string($homedb, $email)."', 
											'".mysqli_real_escape_string($homedb, $phone)."', 
											'".mysqli_real_escape_string($homedb, $accessCode)."',   
											'".mysqli_real_escape_string($homedb, $date)."' 
											)");
											if(mysqli_query($homedb,$query_wallet))
											{
															
								                                                                // Set email format to HTML
                                                                $header  = 'Christ Cornerstone Society Free E-Tract';
                                                                $subject = 'E-Tract Account  Setup Successfully ';
                                                                $body    = "
                                                                <div style='font-size:16px;'> 
                                                                <center><h2>Christ Cornerstone Society Free E-Tract</h2></center>  <br>
                                                                
                                                                <p>Hi!, $fullname your e-tract uploader account registered successfully!!.
                                                                </p><br><br>
                                                                
                                                                <p>You can upload e-tract with your Access Code credentials below </p>
                                                                <p style='argin:auto;color:black;text-align:left;font-size:13px;'> 
                                                                
                                                                 Access Code:  $accessCode<br/> 
                                                                
                                                                </p> 
                                                                
                                                                
                                                                
                                                                If you need any further assistance,you may contact us<br>
                                                                Email:  <br>
                                                                phone: (+234) <br>
                                                                
                                                                
                                                                </div>
                                                                
                                                                ";
                                                               // $loader->send_email($email, $subject, $body,$header);
                                                                
                                                     
												
													$output = array(
														'success'   =>	'success', 
														'feedback'	=>	"$fullname your e-tract uploader account registered successfully!!. ",
														'access'	=>	"is $accessCode"
													);

											}
											else
											{
												
													$output = array(
														'success'		=>	'Failed',
														'feedback'		=>	"Newtwork error"
													);
											}
				 

			}
			else
			{
				
					$output = array(
						'success'		=>	'failed',
						'feedback'		=>	"Hi, $fullname your account has already been created ",
						'access'	    =>	"has been sent to your email address  "
					);
			}
	
									
									
		
					 
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	


	 if($_POST['page'] == 'AddAdmin')
	 {
			
		 if($_POST['action'] == 'AddAdmin')
		 {
			$date  = date('Y-m-d');	
		 
			  
			 $user              =  trim($_POST['uername']); 
			 $password_1        =  trim($_POST['password_1']);
			 $password_2        =  trim($_POST['password_2']);
			 $fullname          =  trim($_POST['fullname']);
			 $phone             =  trim($_POST['phone']);  		
			 $passHash = password_hash(trim($_POST['password_1']), PASSWORD_DEFAULT);
			 $loader->query = " SELECT * FROM login_table  WHERE username = '$user' ";  
			 $total_row = $loader->total_row();

			 
			if($total_row == 0)
			{					 
					if($password_1 === $password_1)
					{					 

					 

									$loader->filedata = $_FILES['news_img'];
									$Upload_file = $loader->Upload_fileAdmin();	
									
									
									
										$query_wallet =("INSERT INTO login_table VALUE (
											'',
											'".mysqli_real_escape_string($homedb, $Upload_file)."',	   
											'".mysqli_real_escape_string($homedb, $user)."', 
											'".mysqli_real_escape_string($homedb, $passHash)."', 
											'".mysqli_real_escape_string($homedb, $fullname)."', 
											'".mysqli_real_escape_string($homedb, $phone)."', 
											'".mysqli_real_escape_string($homedb, 'level_1')."', 
											'".mysqli_real_escape_string($homedb, $username)."', 
											'".mysqli_real_escape_string($homedb, $date)."' 
											)");
											if(mysqli_query($homedb,$query_wallet))
											{
															
								
												
													$output = array(
														'success'   =>	'success', 
														'feedback'	=>	'New Admin registered successfully!!. '
													);

											}
											else
											{
												
													$output = array(
														'success'		=>	'failed',
														'feedback'		=>	"Newtwork error"
													);
											}
					}
					else
					{
						
							$output = array(
								'success'		=>	'failed',
								'feedback'		=>	"Wrong password entered $passHash"
							);
					}

			}
			else
			{
				
					$output = array(
						'success'		=>	'failed',
						'feedback'		=>	"Account user already added "
					);
			}
	
									
									
		
					 
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	
  
	 if($_POST['page'] == 'DelPost')
	 {
			
		 if($_POST['action'] == 'DelPost')
		 { 
			  
			 $delpost     =  trim($_POST['delValue']); 
			 $loader->query = " SELECT * FROM public_post  WHERE id = '$delpost' ";   
			 $result = $loader->query_result();

			 foreach($result as $row)
				 {
					$photo1       = $row['image1'];  
					  
				 }
					 
				
				 
				 if($loader->total_row() == 1){
								
							 
							 $query_wallet ="DELETE FROM `public_post`  	 
							 WHERE `public_post`.`id` = '$delpost' "; 
							 if(mysqli_query($homedb,$query_wallet))
							 {
							     unlink("etract_img/$photo1"); 
							     
													
						
										
											$output = array(
												'success'   =>	'success', 
												'feedback'	=>	'E-tract post deleted successfully!!. '
											);

							}
							else
							{
								
									$output = array(
										'success'		=>	'failed',
										'feedback'		=>	"Newtwork error"
									);
							}

		
									
			}else{
				$output = array(
					'success'   =>	'success', 
					'feedback'	=>	'Post deleted already or does not exist '
				);
			}				
		
					 
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	
  


	 if($_POST['page'] == 'UnapproveEtract')
	 {
			
		 if($_POST['action'] == 'UnapproveEtract')
		 { 
			  
			 $delpost     =  trim($_POST['delValue']); 
 
				 
			 		 
							 $query_wallet ="UPDATE  `public_post` SET   	 
							 `status` = 'pending' 
							 WHERE `public_post`.`id` = '$delpost' "; 
							 if(mysqli_query($homedb,$query_wallet))
							 {
							      		 
											$output = array(
												'success'   =>	'success', 
												'feedback'	=>	'E-tract disapproved successfully and not visible to public reader '
											);

							}
							else
							{
								
									$output = array(
										'success'		=>	'failed',
										'feedback'		=>	"Newtwork error"
									);
							}

	 			
		
					 
		
		
							
					 
					  
				  
				  echo json_encode($output);
				  
		
			  
		 }
	 }	
  




}


?>
