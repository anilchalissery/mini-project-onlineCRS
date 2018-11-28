<?php
	include("db_connect.php");
	$res="";
	session_start();
	if(!isset($_SESSION['u_id']) or empty($_SESSION['u_id']))
	{
		header('location:studlogin.php');
	}
	//echo $_SESSION['u_id'];
	$user_id=$_SESSION['u_id'];
	
	$sql_user="select * from student_reg where st_id=$user_id";
	$result=$conn->query($sql_user);
	$user=$result->fetch_assoc();
			//$user_image=$user['image'];
			$user_name=$user['st_name'];
			$user_address=$user['st_address'];
			$user_gender=$user['st_gender'];
			$user_dob=$user['st_dob'];
			$user_mobile=$user['st_mobile'];
			$user_qualification=$user['st_qualification'];
			$user_email=$user['st_email'];
			$user_uname=$user['username'];
			//$user_password=$user['password'];
	
	
	if(isset($_POST['update']))
	{
		//$name=$_POST['name'];
		//$gender=(isset ($_POST['gender']))?$_POST['gender']:"";
		$address=$_POST['stud_address'];
		$mobile=$_POST['stud_mobile'];
		/*$MCA=(isset($_POST['MCA']))?$_POST['MCA']:"";
		$MTech=(isset($_POST['MTech']))?$_POST['MTech']:"";
		$BTech=(isset($_POST['BTech']))?$_POST['BTech']:"";*/
		$qualf=$_POST['qua'];
		//$newimage=$_FILES['image1']['name'];
		
		
		$uname=$_POST['username'];
		//$oldimg=$user_image;
		$f=0;
		
		
		//$image=(!empty($newimage))?$newimage:$oldimg;
		
		if (preg_match("/^[0-9]{10}$/",$mobile)!=1)
		{
			$f =1 ;
			$mob_err ="Invalid  mobile no format";
		}
		if(empty($uname))
				{
						$f=1;
						$u_err = "Enter your username";
				}
		
		if($f==0)
		{
			
			//$qualification=$MCA."-".$MTech."-".$BTech."-";
			$pro_update="update student_reg set st_qualification='$qualf',st_address='$address',st_mobile='$mobile',username='$uname' where st_id='$user_id'"; 
			$result=$conn->query($pro_update);
			//echo $pro_update;
			//echo $conn->query($pro_update);
			/*if(!empty($newimage))
			{
				move_uploaded_file($_FILES['image1']['tmp_name'],'img/'.$image);
			}*/
			if($result)
			{
			
				$res="Updated";
			}
			else
			{
				$res="Updation failed!";
			}
		
		
		}
	}
	

?>
<!DOCTYPE .php PUBLIC "-//W3C//DTD X.php 1.0 Transitional//EN" "http://www.w3.org/TR/x.php1/DTD/x.php1-transitional.dtd">
<!--<.php xmlns="http://www.w3.org/1999/x.php">-->
<head>
<title>Online CRS |UpdateProfile</title>
<meta http-equiv="Content-Type" content="text/.php; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/coin-slider.css" />
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-georgia.js"></script>
<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/coin-slider.min.js"></script>
</head>
<body>
<div class="main">
  <div class="header">
    <div class="header_resize">
      <div class="menu_nav">
        <ul>
          <li><a href="shome.php"><span>Home</span></a></li>
          <!--<li class="active"><a href="sprofile.php"><span>Update</span></a></li>
          <li><a href="#"><span>Change Password</span></a></li>
          <li><a href="blog..php"><span>Blog</span></a></li>
          <li><a href="contact..php"><span>Contact Us</span></a></li>-->
        </ul>
      </div>
      <div class="logo">
        <h1><a href="index..php">Welcome<span> <?php echo (isset($user_uname))?$user_uname:""?></span></a></h1>
      </div>
      <div class="clr"></div>
      <div class="slider">
        <div id="coin-slider"> <a href="#"><img src="images/slide1.jpg" width="960" height="360" alt="" /><span><b>It’s not what you achieve, it’s what you overcome. That’s what defines your career.Choose a job you love, and you will never have to work a day in your life.</b></span></a> <a href="#"><img src="images/images1.jpg" width="960" height="360" alt="" /><span><b>When hiring key employees, there are only two qualities to look for: judgement and taste. Almost everything else can be bought by the yard.</b></span></a> <a href="#"><img src="images/slide3.jpg" width="960" height="360" alt="" /><span><b>You can’t teach employees to smile. They have to smile before you hire them.</b></span></a> </div>
        <div class="clr"></div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="content">
    <div class="content_resize">
      <div class="mainbar">
        <div class="article">
          
		  <h2>Update Profile</h2>
		  <br><br>
		<form method="post" action="">
			<table border="0">
				
				<!--<tr> <td>NAME</td><td><input type="text" name="name" value="<?php echo (isset($user_name))?$user_name:""?>"></td> </tr>-->
				<!--<tr> <td>GENDER</td><td><input type="radio" name="gender" value="male" <?php echo(($user_gender=="male"))?"checked":"";?> >Male 
				<input type="radio" name="gender" value="female" <?php echo(($user_gender=="female"))?"checked":""; ?>>female</td> </tr>-->
				<!--<tr> <td>USER NAME</td><td><?php echo (isset($user_uname))?$user_uname:""?></td> </tr>-->
				
				<tr height="50"> <td>NAME:</td><td> <?php echo (isset($user_name))?$user_name:""?></td> </tr>
				<tr height="50"> <td>ADDRESS: </td><td><textarea name="stud_address"><?php echo (isset($user_address))?$user_address:""?></textarea></td> </tr>
				<tr height="50"> <td>GENDER:</td><td> <?php echo (isset($user_gender))?$user_gender:""?></td> </tr>
				<tr height="50"> <td>DATE_OF_BIRTH:</td><td> <?php echo (isset($user_dob))?$user_dob:""?></td> </tr>
				<tr height="50"> <td>MOBILE: </td><td><input type="text" name="stud_mobile" value="<?php echo (isset($user_mobile))?$user_mobile:""?>"></td> <td><?php echo (isset($mob_err))?$mob_err:""?></td></tr>
				<!--<tr height="50"> <td>QUALIFICATION: </td><td><input type='checkbox' name='MCA' value='MCA' <?php echo(($user_qualification=="MCA"))?"checked":"";?>>MCA  
				<input type='checkbox' name='MTech' value='MTech'<?php echo(($user_qualification=="MTech"))?"checked":"";?>> MTech
				<input type='checkbox' name='BTech' value='BTech'<?php echo(($user_qualification=="BTech"))?"checked":"";?>> BTech</td></tr>	-->
				<tr height="50"> <td>QUALIFICATION: </td><td><input type="text" name="qua" value="<?php echo (isset($user_qualification))?$user_qualification:""?>"></td><td><?php echo (isset($q_err))?$q_err:""?></td> </tr>
				<tr height="50"> <td>EMAIL ID:</td><td> <?php echo (isset($user_email))?$user_email:""?></td> </tr>
				<tr height="50"> <td>USER NAME: </td><td><input type="text" name="username" value="<?php echo (isset($user_uname))?$user_uname:""?>"></td><td><?php echo (isset($u_err))?$u_err:""?></td> </tr>
				<br><br><tr><td><input type="submit" name="update" value="Update"></td></tr>
				
				<!--<tr> <td>IMAGE</td><td> <input type= 'file' name='image1'></td></tr>-->
				
				
				
				
		
			</table>
			<table><tr><td><?php echo $res ?></td></tr></table>
		</form>
		
		  
		  
		</div>
        <div class="article">
		
		
         <!-- <h2><span>Our</span> Mission</h2>
          <div class="clr"></div>
          <p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget bibendum tellus. Nunc vel imperdiet tellus. Mauris ornare aliquam urna, accumsan bibendum eros auctor ac.</strong></p>
          <p>Maecenas vestibulum fermentum eleifend. Mauris erat sem, suscipit non tincidunt quis, vestibulum eget elit. Duis eget arcu ante. Proin nulla elit, elementum sit amet commodo et, eleifend vitae quam. Nam vel aliquam tortor. Aliquam bibendum erat a urna interdum quis mattis augue interdum. Phasellus fermentum bibendum mauris, ut semper justo pharetra vestibulum. Duis dictum purus sed nibh commodo a congue elit lobortis. Nunc sed feugiat tellus. Mauris aliquet lorem non enim euismod quis fermentum erat porta. Nullam non elit orci. Aliquam blandit mattis feugiat. Cras pulvinar aliquet massa, quis laoreet mi pulvinar ac. Aliquam mi augue, vehicula in consectetur in, porttitor sed tellus. Mauris convallis dapibus auctor. Integer in egestas lorem. In nulla dolor, sollicitudin vitae sollicitudin quis, viverra at lorem.</p>
          <p>Ut ullamcorper velit et nisi feugiat non sagittis tortor pharetra. Mauris ut urna et magna commodo cursus. Curabitur quis elementum arcu. Maecenas eleifend, urna vitae vehicula bibendum, felis tellus tincidunt lorem, at iaculis neque eros ac dui. Nunc malesuada pulvinar suscipit. Phasellus sed tortor quis ligula facilisis aliquam. Aliquam quis magna eu dolor posuere malesuada. Quisque consequat, metus fermentum convallis imperdiet, ante justo pharetra enim, vel commodo ipsum mauris eget purus. Morbi lacinia nisl urna, scelerisque suscipit lacus. Nulla ac orci ut nunc venenatis gravida.</p>
       -->
	   </div>
      </div>
      <div class="sidebar">
        <!--<div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>-->
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="shome.php">Home</a></li>
            <!--<li><a href="#">View Profile</a></li>-->
            <li><a href="sprofile.php">Update Profile</a></li>
            <!--<li><a href="#">Change Password</a></li>-->
            
            <!--<li><a href="#">Web Templates</a></li>-->
          </ul>
        </div>
        <div class="gadget">
          <h2 class="star"><span>For Placement Preparation</span></h2>
          <div class="clr"></div>
          <ul class="ex_menu">
            <li><a href="https://www.faceprep.in/">Faceprep</a><br />
              Learn from experts at FacePrep.</li>
            <li><a href="https://www.indiabix.com/">Indiabix</a><br />
              Learn and practice Aptitude questions and answers with explanation for interview, competitive examination and entrance test.</li>
            <li><a href="https://www.wikijob.co.uk/content/aptitude-tests/test-types/aptitude-tests">Online Aptitude Test</a><br />
               prepare, and practice free online aptitude test questions.</li>
            <li><font color="white"><b>Quantitative Aptitude and Reasoning</b></font><br />
              Author - R V PRAVEEN</li>
            <li><font color="white"><b>Career, Aptitude and Selection Tests: Match Your IQ, Personality and Abilities</b></font><br />
               Author - JIM BARRETT</li>
			<li><a href="https://www.geeksforgeeks.org/">geeksforgeeks</a><br />
              A Computer Science portal for geeks. It contains well written, well thought and well explained computer science and programming articles, quizzes .</li>
            
          </ul>
        </div>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="fbg">
    <div class="fbg_resize">
      <div class="col c1">
        <h2><span>Top</span> Companies in India</h2>
        <a href="#"><img src="images/images1.jpg" width="270" height="200" alt="" class="gal" /></a><!-- <a href="#"><img src="images/gal2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal5.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/gal6.jpg" width="75" height="75" alt="" class="gal" /></a> --></div>
      <div class="col c2">
        <h2><span>Gallery</span> Overview</h2>
        <!--<p>Curabitur sed urna id nunc pulvinar semper. Nunc sit amet tortor sit amet lacus sagittis posuere cursus vitae nunc.Etiam venenatis, turpis at eleifend porta, nisl nulla bibendum justo.</p>
        <ul class="fbg_ul">
          <li><a href="#">Lorem ipsum dolor labore et dolore.</a></li>
          <li><a href="#">Excepteur officia deserunt.</a></li>
          <li><a href="#">Integer tellus ipsum tempor sed.</a></li>
        </ul>
		-->
		<a href="#"><img src="images/i1.jpg" width="75" height="75" alt="" class="gal" /></a><a href="#"><img src="images/pic2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/i2.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/i3.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/i4.jpg" width="75" height="75" alt="" class="gal" /></a> <a href="#"><img src="images/i5.jpg" width="75" height="75" alt="" class="gal" /></a></div>
      
      </div>
      <div class="col c3">
        <h2><span>Contact</span> Us</h2>
        <p>Department of computer Application.Vidya Academy of Science & Technology,Thrissur,Kerala</p>
        <p class="contact_info"> <span>Address:</span>VAST Thrissur<br />
          <span>Telephone:</span>9632587410<br />
          <span>FAX:</span> +458-4578<br />
          <span>Others:</span> +301 - 0125 - 01258<br />
          <span>E-mail:</span> <a href="#">mail@yoursitename.com</a> </p>
      </div>
      <div class="clr"></div>
    </div>
  </div>
  <div class="footer">
    <div class="footer_resize">
      <p class="lf">Copyright &copy; <a href="#">Domain Name</a>. All Rights Reserved</p>
      <p class="rf">Design by <a target="_blank" href="#">OnlineCRS</a></p>
      <div style="clear:both;"></div>
    </div>
  </div>
</div>
</body>
</.php>
