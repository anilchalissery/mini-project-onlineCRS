<?php
		session_start();
		include("db_connect.php");
		if(isset($_SESSION['u_id']) AND !empty($_SESSION['u_id']))
		{
			header("location:chome.php");
		}
		$log="";
		if(isset($_POST['save']))
		{
			$f=0;
			$id_user=$_POST['id_user'];
			$password=$_POST['password'];
			//echo $id_user;
			//echo $password;
			if(empty($id_user))
			{
				$f=1;
				$em_err="Must enter your E-mail";
			}
			else if (!preg_match("/([\w\-]+\.[\w\-]+)/",$id_user)==1)
				{
							$f =1 ;
							$em_err ="invalid email format";
				}
			if(empty($password))
			{
				$f=1;
				$pa_err="Must enter your password";
			}
				//echo $f;
				if($f==0)
				{
					//echo $id_user;
					//echo $password;
					$sql_login="select * from company_reg where username='$id_user' and password='$password'";
					//echo $sql_login;
					$result_login=$conn->query($sql_login);
					$row_count_login=$result_login->num_rows;
					if($row_count_login == 1)
					{
							//echo "if";
						$user=$result_login->fetch_assoc();
						$user_id=$user['cm_id'];
						//var_dump($user);
						//$log="Login successfully";
						$_SESSION['u_id']=$user_id;
						//echo $_SESSION['u_id'];
						//echo $user['id'];
						
						header('location:chome.php');
					}
					else
					{
						//echo "else";
						$log="Invalid username or password";
					}
				}
		}
	
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" href="cmplogin.css">
	</head>
	<body>
	
	<div class="log-form">
		<h2><font color="#000080">Login to your account</font></h2>
		<form method="post" action="">
			<table background ="black" border=0>
				<tr><td><font color="red"><?php echo $log; ?></font></td></tr>
				<tr>
					<td><input type="text"  name="id_user" title="username" placeholder="Enter emailid"/></td>
					<td><font color="red"><?php echo (isset($em_err))?$em_err:""; ?></font></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><input type="password" name="password"  title="password" placeholder=" Enter password"/></td>
					<td><font color="red"><?php echo (isset($pa_err))?$pa_err:""; ?></font></td>
				</tr>
				<tr><td>&nbsp;</td></tr>
				<tr>
					<td><input type="submit" class="btn" name="save" value="login">
					<font color="cyan"> New User?</font><a class="forgot" href="cmpyreg.php">Register Here</a></td>
					
					
				</tr>
			</table>
			
		</form>
	</div>
	<!--end log form -->
	</body>
</html>