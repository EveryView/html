<?php
if (isset($_GET['login'])) {
    $login = $_GET['login'];    
    $link = mysql_connect('localhost', 'root', 'GProsl_2014');
    mysql_select_db('ytmetrics');
    $query = "SELECT * FROM users WHERE `login` = '$login'";
    $result = mysql_query($query);
    if (!mysql_fetch_array($result, MYSQL_ASSOC)) {
        echo 0;
    } else {
        echo 1;
    }
}