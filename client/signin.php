<?php 
session_start();
 include_once('include/database.php');
 
  if(isset($_POST['sin'])){
				$user = $_POST['email'];
				$passw = $_POST['pass'];
				 
				 if((empty($user)) || (empty($passw)) ){
				 $message="Please provide Email and Password !!!";
				 }else{
						
								
				
				$qry = mysql_query("SELECT * FROM `clients` WHERE `email`='$user' && `password`='$passw'");
				 
				 if($qry){
					 if(mysql_num_rows($qry)==1){
						 session_regenerate_id();
						$member = mysql_fetch_assoc($qry);
						$user = $member['id'];
						$_SESSION['SESS_MEMBER_ID']=$user;
						$_SESSION['SESS_MEMBER_NAME']=$member['firstName'];
						
						$expire=time()+60*0*0*0;
						setcookie("user", $user, $expire);
						 
                         session_write_close();
						 header('Location: home.php');
						 
						 } else{
						 $message = 'Invalid Username or Password';
						 
					  
						 }
					 } 
					 }
				}
			 
			?>
			