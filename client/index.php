<?php include_once('signin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Login</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="css/custom_style.css" rel="stylesheet" type="text/css">

</head>

<body id="BodyBg1">
    
    <section class="FullContainerSection">
        <section>
        	<div class="container">
            	<div class="row row_0">
                	<div class="col-md-12 col-sm-12 col_0">
                    	<div class="LoginBlk1 LoginBlk1Gap">
                        	<img src="images/everyview-logo.png" alt="Login Logo" class="img-responsive center-block">
                             <p class="text-center">
                             <?php if (!empty($message)) { ?>
                           <span class="glyphicon glyphicon-remove"></span> <?php echo $message;
								} ?></p>
			<p class="text-center2">
                             <?php if (!empty($smessage)) { ?>
                           <span class="glyphicon glyphicon-ok"></span> <?php echo $smessage;
								} ?></p>
                            
                            <form role="form" action="#" method="post">
                                <div class="form-group has-feedback">
                                    <input type="email" name="email" placeholder="E-mail" id="inputfeedback1" class="form-control FormControl1">
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div><!-- / form-group -->
                                
                                <div class="form-group has-feedback">
                                    <input type="password" name="pass" placeholder="Password" id="inputfeedback1" class="form-control FormControl1">
                                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary" name="sin">Log In</button>
                                </div><!-- / form-group -->
                                
                                <div class="col-md-12 col-sm-12 col_0 FormText1">
                                	<a href="reset-password.php">Forgot your password?</a>
                                </div><!-- / col-md-12 -->
                                
                                <div class="col-md-12 col-sm-12 col_0 FormText1">
                                	<p>Don't have an account yet? <a href="signup.php">Sign up</a></p>
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