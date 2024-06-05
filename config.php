<?php
ob_start();
session_start();


require"phpmailer/PHPMailerAutoload.php";
$current_datetime = date("Y-m-d");
$time = date("H:i:s", STRTOTIME(date('h:i:sa')));


class Loader{
	
	
	
	
	var $host; 
	var $username;
	var $password;
	var $database;
	var $connect;
	var $home_page;
	var $query;
	var $data;
	var $statement;
	var $filedata;
	
	
	
	function __construct()
	{
		
        require('connect_1.php');
		
		$this->connect = new PDO("mysql:host=$this->host; dbname=$this->database", "$this->username", "$this->password");
       
	 
	}

			function execute_query()
		{
			$this->statement = $this->connect->prepare($this->query);
			$this->statement->execute($this->data);
		}
	

	

		function total_row()
		{
			$this->execute_query();
			return $this->statement->rowCount();
		}

		function query_result()
		{
			$this->execute_query();
			return $this->statement->fetchAll();
		}

	
	
		function send_email($receiver_email, $subject, $body)
		{
					
				$mail = new PHPMailer;

				//$mail->IsSMTP();

				//$mail->Host = 'smtp host';

				//$mail->Port = '587'; 

				//$mail->SMTPAuth = true;

				//$mail->Username = '';

				//$mail->Password = '';

				//$mail->SMTPSecure = '';
				$mail->SMTPDebug = 0;  
				$mail->setFrom('noreply@cityofgoddevotions.com', 'CAC CITY OF GOD DEVOTION');

				$mail->FromName = 'CAC CITY OF GOD DEVOTION';
				
				$mail->AddReplyTo = 'surpport@cityofgoddevotions.com';

				$mail->AddAddress($receiver_email, '');

				$mail->IsHTML(true);

				$mail->Subject = $subject;

				$mail->Body = $body;
				
				$mail->AddEmbeddedImage('all_photo/logo.png', 'logo', 'all_photo/logo.png'); 

				$mail->Send();		
		}	
				
			
 
	 
 

 
 			function Upload_Image()
			{
				
				 
				
				if(!empty($this->filedata['name']))
				{
					$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

					$new_name = uniqid() . '.' . $extension;

					$_source_path = $this->filedata['tmp_name'];

					$target_path = 'all_photo/' . $new_name;

					move_uploaded_file($_source_path, $target_path);
						
													
						return $new_name;
						
				
					
				}
			}
	
 

 			 
 
 

		

		
 			function FetchRegAdmin()
			{
				 
				 
				$this->query = "SELECT * FROM `login_table` ";
		 
				$output = $this->query_result();
				 
				return $output;
			}
 			function FetchApproveEtract()
			{
				 
				 
				$this->query = "SELECT * FROM `public_post` WHERE  status='approve'";
		 
				$output = $this->query_result();
				 
				return $output;
			}


 			function FetchPendinEtract()
			{
				 
				 
				$this->query = "SELECT * FROM `public_post` WHERE  status='pending'";
		 
				$output = $this->query_result();
				 
				return $output;
			}
		
 			function FetchPostRaw($id)
			{
				 
				 
				$this->query = "SELECT * FROM `public_post` WHERE  id='$id'";
		 
				$output = $this->query_result();
				 
				return $output;
			}
 			function FetchPost($id)
			{
				 
				 
				$this->query = "SELECT * FROM `public_post` WHERE status = 'approve' AND id='$id'";
		 
				$output = $this->query_result();
				 
				return $output;
			}
 			function SubReadMore_2()
			{
				 
				$rand = rand(1,5); 
				$this->query = "SELECT * FROM `public_post` LIMIT $rand, 4";
		 
				$output = $this->query_result();
				 
				return $output;
			}

 
 
 			function FetchAccessCode()
			{
				 
				$output = mb_strimwidth(time(), 4, 5); 
				 
				return $output;
			}


			function FetchEtract()
			{
				 
				//$rands = rand(0, 5);
				$this->query = "SELECT * FROM `public_post` WHERE status = 'approve' LIMIT 1, 500 ";
		 
				$output = $this->query_result();
				 
				return $output;
			}
			function FetchEtract2()
			{
				 
				//$rands = rand(5, );
				$this->query = "SELECT * FROM `public_post` WHERE status = 'approve' ";
		 
				$output = $this->query_result();
				 
				return $output;
			}
 

			function FetchTotalPost()
			{
				 
				 
				$this->query = "SELECT * FROM `public_post` ";
		 
				$output = $this->total_row();
				 
				return $output;
			}
  
			function Upload_file()
			{
			 
				
				if(!empty($this->filedata['name']))
				{
					$extension = pathinfo($this->filedata['name'], PATHINFO_EXTENSION);

					$new_name = uniqid() . '.' . $extension;

					$_source_path = $this->filedata['tmp_name'];

					$target_path = 'etract_img/' . $new_name;

					if(move_uploaded_file($_source_path, $target_path)){
						
				             
                      
						return $output = "$new_name";
						
				 
					}

					
				}
			}
	
			
			public function Generateslug($title)
			{
 
                  $slug = strtolower($title);
                  $slug = preg_replace('/[^a-z0-9-]+/','-', $slug);
                  $slug = trim($slug, '-');
              
                return $slug;		 
   	
	 
	 

			}
			public function ETractReader($id)
			{
 

				$this->query = "SELECT * FROM `public_post` WHERE `public_post`.`id` ='$id' ";
				$result = $this->query_result(); 
				foreach($result as $row)
				{
				$reader = $row['e-reader'];
				}

				$update  = $reader + 1;

				$this->query ="UPDATE `public_post` SET   
				`e-reader`  = '$update'		 
				WHERE `public_post`.`id` ='$id'  ";
				$this->execute_query();
              
              	 
   	
	 
	 

			}

			public function ETractDownload($id)
			{
 

				$this->query = "SELECT * FROM `public_post` WHERE `public_post`.`id` ='$id' ";
				$result = $this->query_result(); 
				foreach($result as $row)
				{
				$reader =  $row['downloads'];
				}

				$update  = $reader + 1;

				$this->query ="UPDATE `public_post` SET   
				`downloads`  = '$update'		 
				WHERE `public_post`.`id` ='$id'  ";
				$this->execute_query();
              
              	 

			}

			public function UnlinkImg($photo1)
			{
 
				unlink("etract_img/$photo1");	 		 
   	
	 
	 

			}


		 
	
 }
 
?>
 
 
 
 
 
 
 
 
 
 