 <?php
 
 
include("config.php");

require"phpmailer/PHPMailerAutoload.php";

$mail  = new PHPMailer();  



class CronGameWinner Extends Connect{ 




  			public function GameWinner()
			{  
                    $date_init = date('Y-m-d');

					$this->query = " SELECT * FROM `login_table` WHERE `acct_level`='tier3' ";
					$result = $this->query_result();
					foreach($result as $row)
					{
					  $fullname_tier3   = $row['fullname']; 
					  $username_tier3   = $row['username'];  
 
						 
							$mail->setFrom('noreply@graceshieldtech.com', 'ECMT EQUIPMENT DUE FOR MAINTENANCE');
							$mail->addAddress("$username_tier3");   
							$mail->isHTML(true);                                  
							$mail->Subject = 'ECMT EQUIPMENT DUE FOR MAINTAINNACE';
							$mail->Body    = "
								
								<div style=''>

									  <center> <b style='font-size:18px;color:green;'>ECMT EQUIPMENT DUE FOR MAINTAINNACE</b> </center>  <br/> <br/> 
					 
									  Dear   Hi $fullname_tier3,  <br><br>

					                 <p>
									 This
									 </p>
								</div>";
											   

										 
							$mail->send();
					 
						
					 }
						
            }
}



$Printcron = new  CronGameWinner ; 
$Printcron->GameWinner(); 

      
?>
 