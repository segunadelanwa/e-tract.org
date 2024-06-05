<?php
ob_start();
include("../config.php");



$current_file = $_SERVER['SCRIPT_NAME'];
@$http_referer = $_SERVER['HTTP_REFERER'];
if($http_referer === $http_referer){
$http_ref="index.php";
}else{
$http_ref=$http_referer;	
}

$loader = new Loader();
$time = time(); 
$update_time = date('Y-m-d');
$update = date('Y-m-d');

if(isset($_SESSION['password']) AND !empty($_SESSION['username']))
{
   
   $loader->query='SELECT * FROM `login_table` WHERE `password`="'.$_SESSION['password'].'" AND `username`="'.$_SESSION['username'].'"';
		
		 if($result = $loader->query_result()){
	 
		
			foreach($result as $row)
			{
					
			$photo        =  $row['photo']; 
			$username     =  $row['username'];
			$password     =  $row['password'];
			$fullname     =  $row['fullname'];
			$phone        =  $row['phone'];  
			$acct_level   =  $row['acct_level']; 
			$registrar    =  $row['registrar']; 
 
 
			}
	 
	 
   
	         include 'homepage.php';
	 
		 }
 
} 
else 
{
	 include "login_core.php";
}


?>