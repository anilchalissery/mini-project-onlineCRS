<?php
	session_start();
	include("db_connect.php");
	if(isset($_SESSION['u_id']) AND !empty($_SESSION['u_id']))
	{	
		header("location:adminhome.php");
	}
	$log="";
	if(isset($_POST['save']))
	{
		 $email=$_POST['email'];
		 $password=$_POST['password'];
		 $f=0;
		 
		 
		 if(empty($email))
		 {
			 $f=1;
			 $em_err="Please enter your email";
		 }
		 else if (!preg_match("/([\w\-]+\.[\w\-]+)/",$email)==1)
		{
			$f =1 ;
			$em_err ="Invalid  email format";
		}
		 if(empty($password))
		 {
			 $f=1;
			 $pa_err="Please enter your password";
		 }
		 
		if ($f==0)
		{
			$sql_check="select * from admin where username='$email' and password='$password'";
			$result_login = $conn->query($sql_check);
			$row_count_login=$result_login->num_rows;

			if($row_count_login == 1)
			{ 
				$user=$result_login->fetch_assoc();
				$user_id=$user['adm_id'];
				//var_dump($user);
				//$log="login success";
				//alert("Successfully logged in");
				$_SESSION['u_id']=$user_id;
				
				header('location:adminhome.php');
			}
			else
			{
				//alert("login failed");
				$log="login failed";
			}
		}
		//echo $log;
	}
	
	
	?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="admin.css">
	</head>
	<body>
	<div class="log-form">
		<h2><font color="#696969">Login to your account</font></h2>
		<form method="post" action="">
			<table background ="black" border=0>
				<tr><td><font color="red"><?php echo $log; ?></font></td></tr>
				<tr>
					<td><input type="text"  name="email" title="username" placeholder="Enter username" /></td>
					<td><font color="red"><?php echo (isset($em_err))?$em_err:""; ?></font></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><input type="password" name="password"  title="password" placeholder=" Enter password" /></td>
					<td><font color="red"><?php echo (isset($pa_err))?$pa_err:""; ?></font></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><input type="submit" class="btn" name="save" value="login"></td>
					
					
				</tr>
			</table>
			
		</form>
	</div><!--end log form -->
	</body>
</html>