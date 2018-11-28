<?php
	include("db_connect.php");
	session_start();
	if(!isset($_SESSION['u_id']) or empty($_SESSION['u_id']))
	{
		header('location:login.php');
	}
	//echo $_SESSION['u_id'];
	$user_id=$_SESSION['u_id'];
	
	$sql_user="select * from registration where id=$user_id";
	$result=$conn->query($sql_user);
	//$user=$result->fetch_assoc();
	
	$user_id=$user['id'];
	$user_name=$user['name'];
	$user_image=$user['image'];
	$user_address=$user['address'];
	$user_gender=$user['gender'];
	$user_dob=$user['date_of_birth'];
	$user_qualification=$user['qualification'];
	$user_email=$user['email'];
	$user_mobile=$user['mobile'];
	$user_uname=$user['username'];
	$user_password=$user['password'];

 ?>
 
 <html>
 <head>
	<title>User Profile</title>
</head>
<body>
	
	<a href="logout.php">LOG OUT</a>&nbsp;
	<a href="changepassword.php">CHANGE PASSWORD</a>&nbsp;
	<a href="update_profile.php">UPDATE PROFILE</a>&nbsp;
	<a href="addproduct.php">ADD PRODUCT</a><br>
	<u><h1>USER PROFILE</h1></u>
	<form>
	<table border="1">
	
	
		<tr> <td> <img src="img/<?php echo (isset($user_image))?$user_image:""?>" width="100" height="100"/> </td> </tr>
		<tr> <td>ID</td><td><?php echo (isset($user_id))?$user_id:""?></td> </tr>
		<tr> <td>NAME</td><td><?php echo (isset($user_name))?$user_name:""?></td> </tr>
		<tr> <td>ADDRESS</td><td><?php echo (isset($user_address))?$user_address:""?></td> </tr>
		<tr> <td>GENDER</td><td><?php echo (isset($user_gender))?$user_gender:""?></td> </tr>
		<tr> <td>DATE_OF_BIRTH</td><td><?php echo (isset($user_dob))?$user_dob:""?></td> </tr>
		<tr> <td>QUALIFICATION</td><td><?php echo (isset($user_qualification))?$user_qualification:""?></td> </tr>
		<tr> <td>EMAIL ID</td><td><?php echo (isset($user_email))?$user_email:""?></td> </tr>
		<tr> <td>MOBILE</td><td><?php echo (isset($user_mobile))?$user_mobile:""?></td> </tr>
		<tr> <td>USER NAME</td><td><?php echo (isset($user_uname))?$user_uname:""?></td> </tr>
		<tr> <td>PASSWORD</td><td><?php echo (isset($user_password))?$user_password:""?></td> </tr>
	
	</table>
	</form>
</body>
</html>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 