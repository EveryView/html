<?php
session_start();  
include 'include/database.php'; 
if(isset($_POST['sup'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname']; 
	$email = mysql_real_escape_string( $_POST['email'] );
	$company = $_POST['company'];
	$pw = $_POST['pw'];
	$cpw = $_POST['cpw'];
	$query = "SELECT * FROM `clients` WHERE email='$email' ";
    $result = mysql_query($query) or die(mysql_error());

    if (mysql_num_rows($result) ) {
        $erreml = 'Email is already Exist';
    }else if( ($pw != $cpw)){
		 $errpass = 'Passwords does not match !!!';
	}else{
	
	if((strlen($fname)>0)&&(strlen($lname)>=0)&&(strlen($company)>0) &&(strlen($email)>0)&&(strlen($pw)>0))
	{
	$sup = mysql_query("INSERT INTO `clients` ( `firstName`, `lastName`, `email`, `company`, `password`) VALUES ('$fname', '$lname',  '$email','$company', '$pw');");
		  
		if($sup){
			
			$qry = mysql_query("SELECT * FROM `clients` WHERE `email`='$email'");
				 
				  if($qry){
					 if(mysql_num_rows($qry)==1){
						 session_regenerate_id();
						$member = mysql_fetch_assoc($qry);
						$user = $member['id'];
						$_SESSION['SESS_MEMBER_ID']=$user;
						$_SESSION['SESS_MEMBER_NAME']=$member['firstName'];
						
						$expire=time()+60*0*0*0;
						setcookie("clientsName", $user, $expire);
						 
                        session_write_close();
						}
					}
			
		 header('Location: home.php');
			exit;
		}
 
		}else{
			
			$errmsg = "Invalid information!!! Please fill up all fields perfectly.";
			  
 
	 }
	}
}

?>