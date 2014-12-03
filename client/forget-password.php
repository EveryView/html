<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Change Password</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="css/custom_style.css" rel="stylesheet" type="text/css">

</head>
<?php
   include 'include/database.php';  
	 $id = $_GET['id'];
     if(isset($_POST['rspw'])){
		 $npw = $_POST['pw'];
		 $rpw = $_POST['rpw'];
		 
		  if((strlen($npw)>0) || (strlen($rpw)>0) ){
		 
		  if($npw == $rpw){
			$cpw = mysql_query("UPDATE  `clients` SET  `password` =  '$rpw' WHERE  `id` ='$id';");
			 if($cpw){
				 
				 $msg = "Password Changed !!!";
				 }
		 }else{
				 $errmsg = "Passwords must be same !!!";
				 }
				 }else{
				  $errmsg = "Type your Passwords !!!";
				  }
		 }
	 
    

?>
<body id="BodyBg1">  
    <section class="FullContainerSection">
        <section>
        	<div class="container">
            	<div class="row row_0">
                	<div class="col-md-12 col-sm-12 col_0">
                    	<div class="LoginBlk1 ChangePasswordBlk1Gap">
                        	<img src="images/everyview-logo.png" alt="Login Logo" class="img-responsive center-block">
                            <p class="text-center"> 
							<?php if (!empty($errmsg)) { ?>
    								<span class="glyphicon glyphicon-remove"></span> <?php echo $errmsg;
								}else if (!empty($msg)) { ?></p>
								 <p class="TextCenter2"><span class="glyphicon glyphicon-ok"></span> <?php echo $msg;
								}else{?></p>

                            <?php } ?>
                            <form role="form" action="#" method="post">
                                <div class="form-group has-feedback">
                                    <input type="password" name="pw" placeholder="Type New Password" id="inputfeedback1" class="form-control FormControl1">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div><!-- / form-group -->
                                
                                <div class="form-group has-feedback">
                                    <input type="password" name="rpw" placeholder="Re-type New Password" id="inputfeedback1" class="form-control FormControl1">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary" name="rspw">Change</button>
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