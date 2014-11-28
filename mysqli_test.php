<?php
$mysqli = new mysqli("localhost", "root", "GProsl_2014", "ytmetrics");
if ($mysqli->connect_errno) {
	echo("Can't connect in db: %s\n", $mysqli->connect_error);
	exit();
}
echo "Connected";
