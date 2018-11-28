<?php
$server_name="localhost";
$user_name="root";
$user_password="";
$db_name="crd_systemsss";
$conn= new mysqli($server_name,$user_name,$user_password,$db_name);//mysqli class name //object creation
if($conn->connect_error)
{
	die("connection failed:".$conn->connect_error);
}
?>
