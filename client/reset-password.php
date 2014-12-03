<?php include 'include/database.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Reset Password</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="css/custom_style.css" rel="stylesheet" type="text/css">

</head>
<?php 
if(isset($_POST['rpw'])){
				
				$email = mysql_real_escape_string( $_POST['email'] );
				if(empty($email)){
				$ab = "Please provide your Email address !!! ";
				}else{
				 $qry = mysql_query("SELECT * FROM `clients` WHERE `email`='$email' ");
				 while($rslt =  mysql_fetch_array($qry)){
				 $uid = $rslt['id'];
				 }
				 if($qry){
				 if(mysql_num_rows($qry)==1){
					 $to="$email";
	$subject="Reset password.......";
	$message ='Somebody recently asked to reset your everyvieew password. Click here to change your password.  http://everyview.io/client/forget-password.php?id='.$uid.' Thank you! ';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers = "From: ChangePassward@everyview.com";
	
	if(mail($to,$subject,$message,$headers)){ $abc = " A Mail has been sent succesfully !!!";  }else { $ab = " Error !!!";    }
					 
					 
					 }else{
						$ab = "Email address does not match !!! ";
						}
					 } 
						}
				
				
				}   
?>


<body id="BodyBg1">
    
    <section class="FullContainerSection">

        <section>
        	<div class="container">
            	<div class="row row_0">
                	<div class="col-md-12 col-sm-12 col_0">
                    	<div class="LoginBlk1 ResetPasswordBlk1Gap">
                        	<img src="images/everyview-logo.png" alt="Login Logo" class="img-responsive center-block">
                             <p class="text-center">
                             <?php if (!empty($ab)) { ?>
                           <span class="glyphicon glyphicon-remove"></span> <?php echo $ab;
								} ?></p>
				<p class="TextCenter2">
                             <?php if (!empty($abc)) { ?>
                           <span class="glyphicon glyphicon-ok"></span> <?php echo $abc;
								} ?></p>
                            <p class="TextCenter1">Enter your email address that you used to register. We'll send you an email with you a link to reset your password.</p>
                            
                            <form role="form" action="#" method="post">
                                <div class="form-group has-feedback">
                                    <input type="email" placeholder="E-mail" id="inputfeedback1" class="form-control FormControl1" name="email">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary" name="rpw">Reset Password</button>
                                </div><!-- / form-group -->
                                <div class="col-md-12 col-sm-12 col_0 FormText1">
                                	<p>Already have an account? <a href="index.php">Sign In</a></p>
                                </div><!-- / col-md-12 -->
                            </form>
                        </div><!-- / LoginBlk1 -->
                    </div><!-- / col-md-12 -->
                </div><!-- / row -->
            </div><!-- / container -->
        </section><!-- / section -->
    </section><!-- / section FullContainerSection -->
    
<!-- Core JavaScript Files --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.js"></script> 

</body>
</html>