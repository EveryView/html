<?php include 'include/database.php'; ?>
<?php include 'sup.php'; ?>
  
  <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="#">
<title>Sign Up</title>

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
                    	<div class="SignupBlk1 SignupBlk1Gap">
                        	<img src="images/everyview-logo.png" alt="Login Logo" class="img-responsive center-block">
                            
                            <p class="text-center"> 
							<?php if (!empty($errmsg)) { ?>
    								<span class="glyphicon glyphicon-remove"></span> <?php echo $errmsg;
								}?></p>
                            <p class="text-center"><?php if (!empty($erreml)) { ?>
    								   <span class="glyphicon glyphicon-remove"></span> <?php echo $erreml;
								}?></p>
                            <p class="text-center"><?php if (!empty($errpass)) { ?>
    								 <span class="glyphicon glyphicon-remove"></span> <?php echo $errpass;
								}?></p>
                            
                            <form role="form" action="signup.php" method="post">
                                <div class="form-group">
                                	<div class="col-md-12 col-sm-12 col_0">
                                    	<div class="col-md-6 col-sm-6 SignUpFN1">
                                        	<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control FormControl2">
                                        </div><!-- / col-md-6 -->
                                        <div class="col-md-6 col-sm-6 SignUpLN1">
                                        	<input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control FormControl2">
                                        </div><!-- / col-md-6 -->
                                    </div><!-- / col-md-12 -->
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <input type="email"  id="email" name="email"  placeholder="E-mail" class="form-control FormControl2">
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <input type="text" id="company" name="company" placeholder="Company Name" class="form-control FormControl2">
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <input type="password" id="pw" name="pw" placeholder="Password" class="form-control FormControl2">
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <input type="password"  id="cpw" name="cpw"  placeholder="Confirm Password" class="form-control FormControl2">
                                </div><!-- / form-group -->
                                
                                <div class="form-group">
                                    <button type="submit" name="sup" class="btn btn-lg btn-block btn-primary">Sign Up</button>
                                </div><!-- / form-group -->
                                
                                <div class="col-md-12 col-sm-12 col_0 FormText1">
                                	<p>Already have an account? <a href="index.php">Sign In</a></p>
                                </div><!-- / col-md-12 -->
                            </form>
                        </div><!-- / SignupBlk1 -->
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