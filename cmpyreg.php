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
         <li><a href="cmpny_login.php">Login</li>
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
				$comp_name=$_POST['comp_name'];
				$hr_name=$_POST['hr_name'];
				$site_address=$_POST['site_address'];
				$hr_email=$_POST['hr_email'];
				$hr_mobile=$_POST['hr_mobile'];
				$about_us=$_POST['about_us'];
				$username=$_POST['username'];
				$password=$_POST['password'];
				$confirmpassword=$_POST['conpassword'];
				$f=0;
				if(empty($comp_name))
				{
					$f=1;
					$comp_err = "Enter Company name";
				}
				/*if(!preg_match('/^[\p{L}]+$/u',$comp_name))
					{
						$f=1;
						$comp_err = "Name must contain letters and spaces only";
					}*/
				if (ctype_alpha(str_replace(array("\n", "\t", ' '), '', $comp_name)) === false) 
					{
						$f=1;
						$comp_err = "Name must contain letters and spaces only";
					}
				if(empty($hr_name))
				{
					$f=1;
					$hr_err = "Enter HR name";
				}
				else if(!preg_match('/^[\p{L}]+$/u',$hr_name))
					{
						$f=1;
						$hr_err = "Name must contain letters and spaces only";
					}
				if(empty($site_address))
				{
					$f=1;
					$site_err = "Enter address";
				}
				else if(!preg_match("/(www+\.[\w\-]+\.[\w\-]+)/",$site_address)==1)
				{
					$f=1;
					$site_err="Invalid Site Format!";
				}
				if(empty($hr_email))
				{
					$f=1;
					$em_err = "Enter E-mail";
				}
				else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\=]+)/",$hr_email)==1)
				{
					$f=1;
					$em_err="Invalid E-mail Format!";
				}

				if(empty($hr_mobile))
				{
					$f=1;
					$mob_err = "Enter Mobile Number";
				}
				else if(preg_match("/^[0-9]{10}$/",$hr_mobile)!=1)
					{
						$f=1;
						$mob_err="Invalid Mobilenumber !";
					}
				if(empty($about_us))
				{
						$f=1;
						$ab_err="Enter about-us";
				}
				if(empty($username))
				{
						$f=1;
						$user_err = "Enter your username";
				}
				else if(!preg_match("/([\w\-]+\@[\w\-]+\.[\w\=]+)/",$username)==1)
				{
						$f=1;
						$user_err="Invalid E-mail Format!";
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
						$sql_check="select * from company_reg where username='$username'";
						$result_check=$conn->query($sql_check);
						if($result_check->num_rows>0)
						{
						$user_err="Email id already registered";
						}
						else
						{
						$sql_insert= "insert into company_reg(cm_name, 
				Hr_name,email,contact_no,site_addr,about_us,username,password) values('$comp_name','$hr_name','$hr_email','$hr_mobile','$site_address','$about_us','$username','$password')";
							//echo $sql_insert;
							if($conn->query($sql_insert))
							{
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
								/*?>
								<script type="text/javascript">
								//alert("failed");
								</script>
								<?php*/
							}
						}
				}
			}
		?>
			 <h2>Register Here</h2>
			 <br>
			 <marquee><b><font size="5"  face ="script mt bold">All fields are mandatory.</b></font></marquee>
			<fieldset>
				<legend>Company Registration Form</legend>
				<form method="post" action="">
					<table>
					<tr height="50">
					<td>
					Company Name:
					</td>
					<td>
					<input type="text" name="comp_name">
					</td>
					<td>
					<?php echo (isset($comp_err))?$comp_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					HR Name:
					</td>
					<td>
					<input type="text" name="hr_name">
					</td>
					<td>
					<?php echo (isset($hr_err))?$hr_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					HR E-mail:
					</td>
					<td>
					<input type="email" name="hr_email">
					</td>
					<td>
					<?php echo (isset($em_err))?$em_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					HR Contact no./<br>Mobile no.:
					</td>
					<td>
					<input type="text" name="hr_mobile">
					</td>
					<td>
					<?php echo (isset($mob_err))?$mob_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Site-address:
					</td>
					<td>
					<input type="text" name="site_address">
					</td>
					<td>
					<?php echo (isset($site_err))?$site_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					About-us:
					</td>
					<td>
					<textarea rows="4" cols="22" name="about_us"></textarea>
					</td>
					<td>
					<?php echo (isset($ab_err))?$ab_err:""; ?>
					</td>
					</tr>
					<tr height="50">
					<td>
					Username:
					</td>
					<td>
					<input type="email" name="username" placeholder="Enter valid emailid">
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
					<?php 
					echo (isset($log))?$log:""; 
					?>
					</td>
					</tr>
					</table>
				</form>
		
            </fieldset>
			
		
		
		
		
		
		
		
		
         <!-- <h2><span>Excellent Solution</span> For Your Business</h2>
          <p class="infopost">Posted <span class="date">on 11 sep 2018</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/img1.jpg" width="178" height="185" alt="" class="fl" /></div>
          <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. <a href="#">Suspendisse bibendum. Cras id urna.</a> Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo. Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris, mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a> <a href="#" class="com">Comments <span>11</span></a></p>
          </div>
          <div class="clr"></div>-->
        </div>
        <div class="article">
		
		
		
		
		
		
		
		
		
         <!-- <h2><span>We'll Make Sure Template</span> Works For You</h2>
          <p class="infopost">Posted <span class="date">on 29 aug 2016</span> by <a href="#">Admin</a> &nbsp;&nbsp;|&nbsp;&nbsp; Filed under <a href="#">templates</a>, <a href="#">internet</a></p>
          <div class="clr"></div>
          <div class="img"><img src="images/img2.jpg" width="178" height="185" alt="" class="fl" /></div>
          <div class="post_content">
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. <a href="#">Morbi tincidunt, orci ac convallis aliquam, lectus turpis varius lorem, eu posuere nunc justo tempus leo.</a> Donec mattis, purus nec placerat bibendum, dui pede condimentum odio, ac blandit ante orci ut diam. Cras fringilla magna. Phasellus suscipit, leo a pharetra condimentum, lorem tellus eleifend magna, eget fringilla velit magna id neque. Curabitur vel urna. In tristique orci porttitor ipsum. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec libero. Suspendisse bibendum. Cras id urna. Morbi tincidunt, orci ac convallis aliquam.</p>
            <p><strong>Aenean consequat porttitor adipiscing. Nam pellentesque justo ut tortor congue lobortis. Donec venenatis sagittis fringilla.</strong> Etiam nec libero magna, et dictum velit. Proin mauris mauris, mattis eu elementum eget, commodo in nulla. Mauris posuere venenatis pretium. Maecenas a dui sed lorem aliquam dictum. Nunc urna leo, imperdiet eu bibendum ac, pretium ac massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nulla facilisi. Quisque condimentum luctus ullamcorper.</p>
            <p class="spec"><a href="#" class="rm">Read more</a> <a href="#" class="com">Comments <span>7</span></a></p>
          </div>
          <div class="clr"></div>-->
        </div>
        <!--<p class="pages"><small>Page 1 of 2</small> <span>1</span> <a href="#">2</a> <a href="#">&raquo;</a></p>-->
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
            <li><a href="cmpyreg.php">Company registration</a></li>
           
          </ul>
        </div>
        <!--<div class="gadget">
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
        </div>-->
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
