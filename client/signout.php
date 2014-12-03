<?php session_start(); 
include 'include/database.php'; 
$user_id = $_SESSION['id'];
unset($_SESSION['id']);
unset($_SESSION['firstName']);
session_get_cookie_params(0);
session_destroy();
header("Location: index.php");
exit;
?>