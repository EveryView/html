<?php
session_start();
if (isset($_REQUEST['login']) && isset($_REQUEST['pass'])) {
    $login = $_REQUEST['login'];
    $pass = $_REQUEST['pass'];
    $pass = md5($pass);
    $link = mysql_connect('localhost', 'root', 'GProsl_2014');
    mysql_select_db('ytmetrics');
    $query = "SELECT * FROM users WHERE `login` = '$login' AND `pass` = '$pass'";
    $result = mysql_query($query);
    if ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
	echo 1;
        $user_id = $line['id'];
        $_SESSION['user'] = $user_id;
        mysql_free_result($result);
        mysql_close($link);
        if (isset($_SERVER['HTTPS'])) {
            header("Location: " . "https://" . $_SERVER['SERVER_NAME']);
        } else {
            header("Location: " . "http://" . $_SERVER['SERVER_NAME']);
        }
    }
}
?>
<html>
<head><title>Youtube Metrics</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="./js/bootstrap.js"></script>
</head>
<body>
<?php if (!isset($_SESSION['user'])){
    echo '
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="index.php">YouTube Metrics</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="login.php">Sign In</a></li>
                        <li><a href="registration.php">Sign Up</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><br><br><br><br>';}else{
    echo '
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="brand" href="index.php">YouTube Metrics</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li><a href="index.php?logout=1">Logout</a></li>
                        <li><a href="javascript:addChannel()" id="addChannel">Add Channel</a>
<script type="text/javascript">
    function addChannel() {
    $("body").append(\'<iframe id="logoutframe" src="https://accounts.google.com/logout"></iframe>\');
    $("#logoutframe").ready(function () {
	window.location.href = "index.php?addChannel=1";
})
    
    }
</script></li>
                    </ul>
                </div>
            </div>
        </div>
    </div><br><br><br><br>';
}?>
<div style="width: 700px; margin: 0 auto;">
    <form class="form-horizontal" method="post" action="login.php">
        <div class="control-group">
            <label class="control-label" for="login">Login</label>

            <div class="controls">
                <input type="text" id="login" name="login">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="pass">Password</label>

            <div class="controls">
                <input type="password" id="pass" name="pass">
            </div>
        </div>
        <div class="controls">
            <button type="submit" class="btn">Sign in</button>
    </form>
</div>
</body>
</html>