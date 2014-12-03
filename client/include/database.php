<?php
		  error_reporting(0);
		  $con= mysql_connect('localhost','debasish_droy','admin123');
			if(!$con){
					echo "Cannnot connect to MYSQL";
			}
			$db= mysql_select_db('debasish_droy',$con);	
				if(!$db)
				{
					echo "Cannot connect to Databse";
				}
?>