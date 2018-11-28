<!DOCTYPE .php PUBLIC "-//W3C//DTD X.php 1.0 Transitional//EN" "http://www.w3.org/TR/x.php1/DTD/x.php1-transitional.dtd">
<!--<.php xmlns="http://www.w3.org/1999/x.php">-->
<head>
<title>Online CRS</title>
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
         <li><a href="studlogin.php">Login</li>
		</ul>
      </div>
      <div class="logo">
        <h1><a href="index..php">Online<span>CRS</span></a></h1>
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
		<?php
			if(isset($_POST['submit']))
			{   
				include("db_connect.php");
				$name=$_POST['stud_name'];
				$address=$_POST['stud_address'];
				$gender=(isset($_POST['stud_gender']))?$_POST['stud_gender']:"";
				$dob=$_POST['stud_dob'];
				//$q=(isset($_POST['qualification']))?$_POST['qualification']:"";
				$MCA=(isset($_POST['MCA']))?$_POST['MCA']:"";
				$MTech=(isset($_POST['MTech']))?$_POST['MTech']:"";
				$BTech=(isset($_POST['BTech']))?$_POST['BTech']:"";

				/*$mca=(isset($_POST['mca']))?$_POST['mca']:"";
				$php=(isset($_POST['php']))?$_POST['php']:"";
				$image=$_FILES['image']['name'];*/
				$email=$_POST['stud_email'];
				$mobile=$_POST['stud_mobile'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$confirmpassword=$_POST['conpassword'];
				$f=0;
				if(empty($name))
				{
					$f=1;
					$n_err = "Enter name";
				}
				/*else if(!preg_match('/^[\p{L}]+$/u',$name))
					{
						$f=1;
						$n_err = "Name must contain letters and spaces only";
					}*/
				if (ctype_alpha(str_replace(array("\n", "\t", ' '), '', $name)) === false) 
				{
						$f=1;
						$n_err = "Name must contain letters and spaces only";
				}
				if(empty($address))
				{
					$f=1;
					$ad_err ="Enter address";
				}
				if(empty($gender))
				{
					$f=1;
					$g_err = "select gender";
				}
				if(empty($dob))
				{
					$f=1;
					$dob_err = "select date-of-birth";
				}
				if(empty($MCA) and empty ($MTech) and empty ($BTech))
				{
					$f=1;
					$q_err= "Enter qualification";
				}

				/*if(empty($q))
				{
					$f=1;
					$q_err = "Enter qualification";
				}*/
				/*if(empty($image))
				{
					$f=1;
					$im_err="Must choose an image";
				}*/	
				if(empty($email))
				{
					$f=1;
					$em_err = "Enter E-mail";
				}
				else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\=]+)/",$email)==1)
				{
					$f=1;
					$em_err="Invalid E-mail Format!";
				}

				if(empty($mobile))
				{
					$f=1;
					$mob_err = "Enter Mobile Number";
				}
				else if(preg_match("/^[0-9]{10}$/",$mobile)!=1)
					{
						$f=1;
						$mob_err="Invalid Mobilenumber !";
					}
					if(empty($username))
					{
						$f=1;
						$user_err = "Enter your username";
					}
					if(empty($password))
					{
						$f=1;
						$pass_err = "Enter your password";
					}
					if(empty($confirmpassword))
					{
							$f=1;
							$cpass_err = "Confirm password";
					}
					else if($password!=$confirmpassword)
					{
						$f=1;
						$cpass_err = "Password not correct";
					}	
					
					if($f==0)
					{	
						$sql_check="select * from student_reg where st_email='$email'";
						$result_check=$conn->query($sql_check);
						if($result_check->num_rows > 0)
						{
						$em_err="Email id already registered";
						}
						else
						{
							$q=$MCA ."-" . $MTech . "-" . $BTech . "-";
							$sql_insert= "insert into student_reg(st_name, 
			st_address,st_gender,st_dob,st_mobile,st_qualification,st_email,username,password) values('$name','$address','$gender','$dob','$mobile','$q','$email','$username','$password')";
							//echo $sql_insert;
							//$conn->query($sql_insert);
							if($conn->query($sql_insert))
							{
							 //move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$image);
							 $log="Details added";
							/* ?>
							 <script type="text/javascript">
							 alert("Registered Successfully");
							 </script>
							 <?php*/
							}
							else
							{
								$log="failed";
							}
						}
					}
			}
		?>		

		<h2>Register Here</h2>
			 <br>
			 <marquee><b><font size="5"  face ="script mt bold">All the fields are mandatory. </b></font></marquee>
			<fieldset>
				<legend>Student Registration Form</legend>
					<form method="post" action="">
					<table>
					<tr height="50">
					<td>
					Name:
					</td>
					<td>
					<input type="text" name="stud_name">
					</td>
					<td>
					<?php echo (isset($n_err))?$n_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Address:
					</td>
					<td>
					<textarea name="stud_address" rows="3" cols="22"></textarea>
					</td>
					<td>
					<?php echo (isset($ad_err))?$ad_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Gender:
					</td>
					<td>
					<input type="radio" value="Male" name="stud_gender"> Male
					<input type="radio" value="Female" name="stud_gender"> Female
					</td>
					<td>
					<?php echo (isset($g_err))?$g_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Date-Of-Birth:
					</td>
					<td>
					<!--<div class="default-select" style="width:100px;">
					  <select name="stud_age">
						<option value="">Select age:</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						 <option value="30">30</option>
					  </select>
					</div> -->
					<input type="date" name="stud_dob">
					</td>
					<td>
					<?php echo (isset($dob_err))?$dob_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Contact no./Mobile no.:
					</td>
					<td>
					<input type="text" name="stud_mobile">
					</td>
					<td>
					<?php echo (isset($mob_err))?$mob_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Qualification:(Highest Qualification)
					</td>
					<td><input type='checkbox' name='MCA' value='MCA'> MCA  <input type='checkbox' name='MTech' value='MTech'> MTech <input type='checkbox' name='BTech' value='BTech'> BTech</td>
					<td><?php echo (isset($q_err))?$q_err:""?>
					</td>
					</tr>

					<!--<td>
					<input type="text" name="qualification" placeholder="Highest Qualification">
					</td>
					<td>
					<?php echo (isset($q_err))?$q_err:""; ?>
					</td>-->
					</tr>
					<tr height="50">
					<td>
					Email-id:
					</td>
					<td>
					<input type="text" name="stud_email">
					</td>
					<td>
					<?php echo (isset($em_err))?$em_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Username:
					</td>
					<td>
					<input type="text" name="username">
					</td>
					<td>
					<?php echo (isset($user_err))?$user_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Password:
					</td>
					<td>
					<input type="password" name="password">
					</td>
					<td>
					<?php echo (isset($pass_err))?$pass_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Confirm Password:
					</td>
					<td>
					<input type="password" name="conpassword">
					</td>
					<td>
					<?php echo (isset($cpass_err))?$cpass_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					</td>
					<td>
					<input type="submit" name="submit" value="submit">
					<?php echo (isset($log))?$log:""; ?>
					</td>
					</tr>
					</table>
					</form>
			</fieldset>
</div>
    <div class="article">
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
            <li><a href="index.php">Home</a></li>
            <li><a href="student_reg_form.php">Student registration</a></li>
           
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
            <li><font color="white"><b>Career, Aptitude and Selection Tests: Match Your IQ, Personality and Abilities<b></font><br />
               Author - JIM BARRETT</li>
			<li><a href="https://www.geeksforgeeks.org/">Geeksforgeeks</a><br />
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
        </ul>-->
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
