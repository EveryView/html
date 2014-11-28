<?php
session_start();

if (isset($_REQUEST['login']) && isset($_REQUEST['pass'])) {
    $login = $_REQUEST['login'];
    $pass = $_REQUEST['pass'];
    $pass = md5($pass);
    $mysqli = new mysqli("localhost", "root", "GProsl_2014", "ytmetrics");
    echo 1;
    if ($mysqli->connect_errno) {
    printf("Не удалось подключиться: %s\n", $mysqli->connect_error);
    exit();
}
    $link = mysql_connect('localhost', 'root', 'GProsl_2014');
    mysql_select_db('ytmetrics');
    $query = "SELECT * FROM users WHERE `login` = '$login'";
    $result = mysql_query($query);
    if (!mysql_fetch_array($result, MYSQL_ASSOC)) {
        $query = "INSERT INTO users (login,pass) VALUES('$login','$pass')";
        mysql_query($query);


        $query = "SELECT * FROM users WHERE `login` = '$login'";
        $result = mysql_query($query);
        $line = mysql_fetch_array($result, MYSQL_ASSOC);
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
<head>
    <title>Youtube Metrics</title>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="./js/myscript.js"></script>
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
    echo'
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
    <form class="form-horizontal" method="post" id="userForm" action="registration.php">
        <div class="control-group">
            <label class="control-label" for="login">Login</label>

            <div class="controls">
                <input type="text" id="login" name="login">
                <i class="icon-ok" id="login_icon-ok" style="visibility: hidden"></i><i class="icon-remove" id="login_icon-remove" style="visibility:hidden"></i>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="pass">Password</label>

            <div class="controls">
                <input type="password" id="pass" name="pass">
		<i class="icon-ok" id="pass_icon" style="visibility: hidden"></i>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="retryPass">Retry password</label>

            <div class="controls">
                <input type="password" id="retryPass">
                <i class="icon-ok" id="pass_icon-ok" style="visibility: hidden"></i><i class="icon-remove" id="pass_icon-remove" style="visibility:hidden"></i>
            </div>
        </div>
        <div class="controls">
            <button type="submit" class="btn">Sign Up</button>
    </form>
</div>
</body>
</html>