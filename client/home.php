<?php session_start();
if(!isset($_COOKIE["clientsName"])){	
	if(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID'])=='')){		    
 header('Location: index.php');
	}
} ?>
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
<title>Admin</title>

<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">

<!-- Custom CSS -->
<link href="css/custom_style.css" rel="stylesheet" type="text/css">
</head>

<body>
<section class="FullContainerSection">
	<section>
        	<div class="navbar-wrapper NavbarWrapperBg1">
            	<div class="container-fluid">
                    <div class="navbar navbar-inverse CustomNavbar1" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="#"><img src="images/everyview-logo.png" alt="logo"></a>
                            </div><!-- / navbar-header -->
                            
                            <div class="navbar-collapse collapse CustomNavbarCollapse1">
                                <ul class="nav navbar-nav navbar-right CustomNavbarNav1">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php $name = $_SESSION['SESS_MEMBER_NAME']; 		
                                        $id = $_SESSION['SESS_MEMBER_ID']; echo $name; ?><span class="caret"></span></a>
                                        <ul class="dropdown-menu DropdownMenu1" role="menu">
                                            <li><?php echo '<a href="change-password.php?id='.$id.'"  ">Change Password</a>'; ?></li>
                                            <li><a href="signout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                
                            </div><!--/ nav-collapse -->
                        </div><!--/ container -->
                    </div><!-- / navbar -->
                </div><!-- / container-fluid -->
            </div><!-- / navbar-wrapper -->
        </section><!-- / section -->

	<section>
        	<div class="container">
            	<div class="row row_0">
                	<div class="col-md-12 col-sm-12">
                    	<div class="AdminTextBlk1">
                        	<h3>Choose from the below Services to automate your Reporting:</h3>
                        </div><!-- / AdminTextBlk1 -->
                        
                    	<div class="AdminInnerBlk1">
                            <ul class="list-unstyled">
                            	<form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal">
                                            <span><img src="images/youtube.png" alt=""></span> YouTube
                                        </button>
                                        <span class="BMT1">(Authorized)</span>
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">YouTube</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal2">
                                            <span><img src="images/aol-on.png" alt=""></span> Aol On
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Aol</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal3">
                                            <span><img src="images/DailyMotion.png" alt=""></span> DailyMotion
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Daily Motion</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal4">
                                            <span><img src="images/twitter.png" alt=""></span> Twitter
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Twitter</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal5">
                                            <span><img src="images/NDD.png" alt=""></span> NDN
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">NDN</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal6">
                                            <span><img src="images/yahoo.png" alt=""></span> Yahoo
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Yahoo</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal7">
                                            <span><img src="images/DailyMotion.png" alt=""></span> DailyMotion
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal7" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">DailyMotion</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary BtnModal1" data-toggle="modal" data-target="#myModal8">
                                            <span><img src="images/GM.png" alt=""></span> Grab Media/Blinkx
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                        <h4 class="modal-title" id="myModalLabel">Grab Media/Blinkx</h4>
                                                    </div><!-- / modal-header -->
                                                    
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>User / Account Name</label>
                                                            <input type="text" placeholder="" value="" class="form-control" name="fuserName" id="fuserName">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <label>Password</label>
                                                            <input type="password" placeholder="" value="" class="form-control" name="fPassword" id="fPassword">
                                                        </div><!-- / form-group -->
                                                        
                                                        <div class="form-group">
                                                            <button class="btn btn-primary" type="submit" name="">Submit</button>
                                                        </div><!-- / form-group -->
                                                    </div><!-- / modal-body -->
                                                    
                                                    <div class="modal-footer hide">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div><!-- / modal-footer -->
                                                </div><!-- / modal-content -->
                                            </div><!-- / modal-dialog -->
                                        </div><!-- / Modal -->
                                    </a>
                                </li>
                                </form>
                                
                                <form role="form" action="">
                                <li>
                                    <a href="#">
                                        Others
                                    </a>
                                </li>
                                </form>
                            </ul>
                        </div><!-- / AdminInnerBlk1 -->
                    </div><!-- / col-md-12 -->
                </div><!-- / row -->
            </div><!-- / container -->
        </section><!-- / section -->


<!-- / section FullContainerSection --> 

<!-- Core JavaScript Files --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 
<script src="js/jquery-1.10.2.js"></script> 
<script src="js/bootstrap.js"></script>
</body>
</html>