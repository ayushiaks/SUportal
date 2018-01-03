<?php
session_start();

if(!isset($_SESSION['access_token'])) {
	header('Location: /SUportal/index.php');
	exit();	
}
$email = $_SESSION['email'];


?>