<?php
	session_start();
	session_destroy();
	header('location:cmpny_login.php');
?>