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
			//$user_address=$user['st_address'];
			//$user_gender=$user['st_gender'];
			//$user_dob=$user['st_dob'];
			//$user_mobile=$user['st_mobile'];
			$user_qualification=$user['st_qualification'];
			//$user_email=$user['st_email'];
			$user_uname=$user['username'];
			//$user_password=$user['password'];
			
	
	
	if(isset($_POST['apply']))
	{
		//$name=$_POST['name'];
		//$gender=(isset ($_POST['gender']))?$_POST['gender']:"";
		//$address=$_POST['stud_address'];
		//$mobile=$_POST['stud_mobile'];
		//$MCA=(isset($_POST['MCA']))?$_POST['MCA']:"";
		//$MTech=(isset($_POST['MTech']))?$_POST['MTech']:"";
		//$BTech=(isset($_POST['BTech']))?$_POST['BTech']:"";
		
		$newimage=$_FILES['image1']['name'];
		$yop=$_POST['yop'];
		$cgpa=$_POST['cgpa'];
		$back_log=$_POST['backlog'];
		$sslc_yop=$_POST['sslcyop'];
		$sslc_perc=$_POST['sslcperc'];
		$plus_yop=$_POST['plusyop'];
		$plus_perc=$_POST['plusperc'];
		$dgr_yop=$_POST['dgryop'];
		$dgr_perc=$_POST['dgrperc'];
		$resume=$_FILES['resume']['name'];
		
		//$uname=$_POST['username'];
		//$oldimg=$user_image;
		//$image=(!empty($newimage))?$newimage:$oldimg;
		/*if (preg_match("/^[0-9]{10}$/",$mobile)!=1)
		{
			$f =1 ;
			$mob_err ="Invalid  mobile no format";
		}
		*/
		$f=0;
		if (empty($newimage))
		{
			$f=1;
			$im_err="Upload your photo";
		}
		if (empty($yop))
		{
			$f=1;
			$yop_err="fill your Year of Passing";
		}
		if (empty($cgpa))
		{
			$f=1;
			$cgpa_err="fill your CGPA";
		}
		if (empty($back_log))
		{
			$f=1;
			$blg_err="fill current No of Backlogs ";
		}
		if (empty($sslc_yop))
		{
			$f=1;
			$sslcy_err="fill 10th Year of Pass";
		}
		if (empty($sslc_perc))
		{
			$f=1;
			$sslcper_err="fill your 10th%";
		}
		if (empty($plus_yop))
		{
			$py_err="fill 12th Year of Pass";
		}
		if (empty($plus_perc))
		{
			$f=1;
			$plusper_err="fill your 12th%";
		}
		if (empty($dgr_yop))
		{
			$f=1;
			$dgr_err="fill Graduation Year of Passing";
		}
		if (empty($dgr_perc))
		{
			$f=1;
			$dgrper_err="fill your Degree%";
		}
		if (empty($resume))
		{
			$f=1;
			$res_err="upload your cv/resume";
		}
		$id=$_GET['id'];
		
		$user_err=" ";
		if($f==0)
		{
				$sql_check="select * from student_academics where job_id='$id' and st_id='$user_id'";
						$result_check=$conn->query($sql_check);
						if($result_check->num_rows>0)
						{
							$user_err="Already applied";
							//echo $user_err;
						}
						else
						{
							//$qualification=$MCA."-".$MTech."-".$BTech."-";
							$sql_apply="insert into student_academics(st_id,job_id,YOP,Curr_CGPA,Backlogs,sslcyop,sslcperc,plustwoyop,plustwoperc,Dgryop,graduperc,resume,photo)values('$user_id','$id','$yop','$cgpa','$back_log','$sslc_yop','$sslc_perc','$plus_yop','$plus_perc','$dgr_yop','$dgr_perc','$resume','$newimage')"; 
							//echo $sql_apply;
							//$sql_apply="insert into student_academics(st_id,YOP,Curr_CGPA,Backlogs,sslcyop,sslcperc,plustwoyop,plustwoperc,Dgryop,graduperc,resume,photo)values('$user_id','$yop','$cgpa','$back_log','$sslc_yop','$sslc_perc','$plus_yop','$plus_perc','$dgr_yop','$dgr_perc','$resume','$newimage')"; 
							//echo $sql_apply;
							//$result=$conn->query($sql_apply);
							
							//echo $conn->query($pro_update);
							if($conn->query($sql_apply))
							{
								move_uploaded_file($_FILES['image1']['tmp_name'],'images/'.$newimage);
								move_uploaded_file($_FILES['resume']['tmp_name'],'images/'.$resume);
								$res="Application Submitted Successfully";
							}
							else
							{
								$res="Failed!";
							}
		
		
						}
		}
		
	}
	

?>
<!DOCTYPE .php PUBLIC "-//W3C//DTD X.php 1.0 Transitional//EN" "http://www.w3.org/TR/x.php1/DTD/x.php1-transitional.dtd">
<!--<.php xmlns="http://www.w3.org/1999/x.php">-->
<head>
<title>Online CRS |Apply For Job</title>
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
          <li class="active"><a href="sprofile.php"><span>Update</span></a></li>
          <li><a href="schangepwd.php"><span>Change Password</span></a></li>
		  <li><a href="studlogout.php"><span>Logout</span></a></li>
          <!--<li><a href="blog..php"><span>Blog</span></a></li>
          <li><a href="contact..php"><span>Contact Us</span></a></li>-->
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
          <font size="5"><font color="#00008B">Welcome </font><font color="#800080"><?php echo (isset($user_uname))?$user_uname:""?></font></font>
		  <br><br>
		  <marquee><b><font size="5"  face ="script mt bold">Fill the form carefully.Once application is submitted, it cannot be edited. </b></font></marquee>
		  <h2>Apply for Job</h2>
		  <form method="post" action="" enctype="multipart/form-data">
			<table border="0">
				<!--<tr> <td>NAME</td><td><input type="text" name="name" value="<?php echo (isset($user_name))?$user_name:""?>"></td> </tr>-->
				<!--<tr> <td>GENDER</td><td><input type="radio" name="gender" value="male" <?php echo(($user_gender=="male"))?"checked":"";?> >Male 
				<input type="radio" name="gender" value="female" <?php echo(($user_gender=="female"))?"checked":""; ?>>female</td> </tr>-->
				<!--<tr> <td>USER NAME</td><td><?php echo (isset($user_uname))?$user_uname:""?></td> </tr>-->
				<!--<tr height="50"> <td>ADDRESS: </td><td><textarea name="stud_address"><?php echo (isset($user_address))?$user_address:""?></textarea></td> </tr>
				<tr height="50"> <td>GENDER:</td><td> <?php echo (isset($user_gender))?$user_gender:""?></td> </tr>
				<tr height="50"> <td>DATE_OF_BIRTH:</td><td> <?php echo (isset($user_dob))?$user_dob:""?></td> </tr>
				<tr> <td>MOBILE</td><td><?php echo (isset($user_mobile))?$user_mobile:""?></td> </tr>-->
				<!--<tr height="50"> <td>EMAIL ID:</td><td><input type="text" name="stud_email" value=" <?php echo (isset($user_email))?$user_email:""?>"></td> </tr>-->
				
				<tr height="50"><td>Photo:</td><td><input type= 'file' name='image1' accept=".pdf,.jpeg,.jpg,.png"></td><td><?php echo (isset($im_err))?$im_err:""?></td></tr>
				
				<tr height="50"><td>Name:</td><td><?php echo (isset($user_name))?$user_name:""?></td></tr>
				<tr height="50"><td>Qualification</td><td><?php echo (isset($user_qualification))?$user_qualification:""?></td> </tr>	
				<tr height="50"><td>Year of Passing(Highest Qualification):</td><td><input type="text" name="yop"></td>
				<td>
					<?php echo (isset($yop_err))?$yop_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>Current CGPA:</td><td><input type="text" name="cgpa"></td>
				<td>
					<?php echo (isset($cgpa_err))?$cgpa_err:""; ?>
				</td>
				</tr>
				<tr height="50"><td>No of current Backlogs(If not,fill it as Nil):</td><td><input type="text" name="backlog"></td>
				<td>
					<?php echo (isset($blg_err))?$blg_err:""; ?>
				</td>
				</tr>
				<tr height="50"><td>10th Year of Passing:</td><td><input type="text" name="sslcyop"></td>
				<td>
					<?php echo (isset($sslcy_err))?$sslcy_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>10th %:</td><td><input type="text" name="sslcperc" ></td>
				<td>
					<?php echo (isset($sslcper_err))?$sslcper_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>PlusTwo Year of Passing:</td><td><input type="text" name="plusyop" ></td>
				<td>
					<?php echo (isset($py_err))?$py_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>PlusTwo %:</td><td><input type="text" name="plusperc" ></td>
				<td>
					<?php echo (isset($plusper_err))?$plusper_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>Degree Year of Passing(applicable only for MCA,Mtech Students.Others mention it as Nil):</td><td><input type="text" name="dgryop" ></td>
				<td>
					<?php echo (isset($dgr_err))?$dgr_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>Degree %(applicable only for MCA,Mtech Students.Others mention it as Nil):</td><td><input type="text" name="dgrperc" ></td>
				<td>
					<?php echo (isset($dgrper_err))?$dgrper_err:""; ?>
					</td>
				</tr>
				<tr height="50"><td>Resume:</td><td><input type="file" name="resume" accept=".pdf"></td>
				<td>
					<?php echo (isset($res_err))?$res_err:""; ?>
					</td>
				</tr>
				<br><br><tr><td><input type="submit" name="apply" value="Apply"></td><td><?php echo $user_err;?></td></tr>
				
				
				
				
				
				
		
			</table>
			<table><tr><td><?php echo $res ?></td></tr></table>
			
		</form>
		
		  
		  
		</div>
        
      </div>
      <div class="sidebar">
        <div class="searchform">
          <form id="formsearch" name="formsearch" method="post" action="#">
            <span>
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search our ste:" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="clr"></div>
        <div class="gadget">
          <h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            <li><a href="shome.php">Home</a></li>
            <!--<li><a href="#">View Profile</a></li>-->
            <li><a href="sprofile.php">Update Profile</a></li>
            <li><a href="schangepwd.php">Change Password</a></li>
            
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
