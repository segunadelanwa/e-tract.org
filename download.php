 

	 
		<?php

		
				include("config.php");
				$loader = new Loader;
				$date = date("Y-m-d");
				
				@$http_referer = $_SERVER['HTTP_REFERER'];
				
				$auto_id =time();// + $rand;
				$ref_id ="GT$auto_id"; 

				$id = $_GET['etract'];
				$result = $loader->FetchPost($_GET['etract']);  
				foreach($result as $row)
				{

				$title      =strtoupper($row['caption']);
				$image      = 'etract_img/'.$row['image1'];
				$downloads =  $row['downloads'];
				$textarea =  $row['textarea'];
				$post_id   = $row['post_id']; 
				$url ='http://127.0.0.1/e-tract.org/';
				//$url ='https://blog.halleluyahnite.ng';
                $Img = "$url/$image";
				}

			
      
				 

              



				
				$filename = "download/$post_id.txt";
				$file = fopen($filename, "w");
				$txt = "$title  $textarea";
			 
				 fwrite($file, $txt);
				 fclose($file);

					// Set the file path and name
					$file_path = "download/$post_id.txt";
					$file_name = "$post_id.txt"; 
					// Set the header to force download
					header('Content-Disposition: attachment; filename="' . $file_name . '"');
					header('Content-Type: application/octet-stream');
					header('Content-Length: ' . filesize($file_path)); 
					// Read and output the file
					readfile($file_path); 

              




                    $update  = $downloads + 1;
    
                    $loader->query ="UPDATE `public_post` SET   
                    `downloads`  = '$update'		 
                    WHERE `public_post`.`id` ='$id'  ";
                    $loader->execute_query();

                    //header("Location: index.php");
                    unlink($file_path);
		?> 	

		
 
 
   
 	



 
 