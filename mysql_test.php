<?php
$link = mysql_connect('localhost', 'root', 'GProsl_2014')
    or die('Cant connect: ' . mysql_error());
echo 'Connected';
mysql_select_db('ytmetrics') or die('Cant selected db');