<?php
		include("db_connect.php");
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
			$user_uname=$user['username'];
			
			//$user_image=$user['image'];
			//$user_name=$user['st_name'];
			//$user_address=$user['st_address'];
			//$user_gender=$user['st_gender'];
			//$user_dob=$user['st_dob'];
			//$user_mobile=$user['st_mobile'];
			//$user_qualification=$user['st_qualification'];
			//$user_email=$user['st_email'];
			//$user_password=$user['password'];
			
			//$disp_jobs="select * from jobs";
			//$check=$conn->query($disp_jobs);
			//$record=$check->fetch_assoc();
			//$jid=$record['job_id'];
			//$cm_id=$record['cm_id'];
			//$jname=$record['job_name'];
			//$jdesc=$record['job_desc'];
			//$elig=$record['eligibility'];
			//$jloc=$record['location'];
			//$jsal=$record['salary'];
			//$date_apply=$record['date_to_apply'];
			//$hrname=$record['Posted_By'];
			
			//$sql_cm="select cm_name from company_reg where cm_id=$cm_id";
			//$result_cm=$conn->query($sql_cm);
			
			/*echo("<table>");
			echo("<tr>");
			echo("<th>JOB_ID &nbsp;</th>"."<th>JOB_NAME &nbsp;</th>"."<th>JOB_DESC &nbsp;</th>"."<th>ELIGIBILITY &nbsp;</th>"."<th>WORK_LOC &nbsp;</th>"."<th>SALARY &nbsp;</th>"."<th>LAST_DATE_FOR_APPLY &nbsp;</th>"."<th>POSTED BY &nbsp;</th>"."<th></th>");
			echo("</tr>");
			//echo("<tr>");
			//echo("<td>$jid</td>"."<td>$jname</td>"."<td>$jdesc</td>"."<td>$elig</td>"."<td>$jloc</td>"."<td>$jsal</td>"."<td>$date_apply</td>"."<td>$hrname</td>");
			//echo("</tr>");
					
			//echo("<tr>");
			//echo("<td>$res['job_id']</td>"."<td>$res['job_name']</td>"."<td>$res['job_desc']</td>"."<td>$res['eligibility']</td>"."<td>$res['location']</td>"."<td>$res['salary']</td>"."<td>$res['date_to_apply']</td>"."<td>$res['Posted_By']</td>");
			//echo("</tr>");
			for($i=0;$i<$count;$i++)
			{
						$res=mysqli_fetch_row($result_job);
						echo("<tr>");
						echo("<td>$res[0]</td>"."<td>$res[2]</td>"."<td>$res[3]</td>"."<td>$res[4]</td>"."<td>$res[5]</td>"."<td>$res[6]</td>"."<td>$res[7]</td>"."<td>$res[8]</td>");
						echo("</tr>");
			}
					
			echo("</table>");*/
				if(isset($_POST['search']))
			{	
				$search=$_POST['searchbox'];
				//echo $search;
				$txt=$_POST['txt'];
				//echo $txt;
				
				$f=0;
				if(empty($search))
				{
						$f=1;
						$search_err= "select any option";
				}
				if(empty($txt))
				{
						$f=1;
						$txt_err = "Type text";
				}
			}	
				
			
			

?>
<!DOCTYPE .php PUBLIC "-//W3C//DTD X.php 1.0 Transitional//EN" "http://www.w3.org/TR/x.php1/DTD/x.php1-transitional.dtd">
<!--<.php xmlns="http://www.w3.org/1999/x.php">-->
<head>
<title>Online CRS|Search Jobs</title>
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
		 <!-- <li><a href="index.php"><span>Home</span></a></li>-->
          <li class="active"><a href="shome.php"><span>Home</span></a></li>
          <!--<li><a href="searchjob.php"><span>Search Job</span></a></li>-->
          <!--<li><a href="applyjob.php"><span>Apply For Job</span></a></li>-->
		  <li><a href="sprofile.php"><span>Profile</span></a></li>
		  <li><a href="schangepwd.php"><span>Change Password</span></a></li>
          <li><a href="studlogout.php"><span>Logout</span></a></li>
        </ul>
      </div>
      <div class="logo">
		<h1><a href="index..php">Online<span>CRS</span></a></h1>
		<!--<h2><a href="index..php"><font color="#00008B">Welcome</font><font color="#800080"><?php echo (isset($user_uname))?$user_uname:""?></font></a></h2>-->
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
			<br>
			<h2>Search Jobs</h2>
				 <form method="post" action="">
					<table border="0">
					<tr height="50">
					<!--<td><input  type="text" name="searchbox"  maxlength="80" value="Search :"></td> -->
					<td><select name="searchbox">
						<option value="" selected>Search :</option>
						<option value="location">Location</option>
						
						<!--
						<option value="cm_name">Company name</option>
						<option value="MCA">MCA</option>
						<option value="MTech">MTech</option>
						<option value="Btech">Btech</option>-->
						</select>
					</td>
					<td><?php echo (isset($search_err))?$search_err:""; ?></td>
					
					<td>: &nbsp;<input type="text" name="txt"></td>
					<td><?php echo (isset($txt_err))?$txt_err:""; ?></td>
					
					
					<td> &nbsp;&nbsp;<input name="search"  type="submit" value="search"/></td>
					</tr>
					</table>
				</form>
				
			
		
		
		
		
		
		
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
		
		<?php
		if(isset($_POST['search']))
			{
				$search=$_POST['searchbox'];
				//echo $search;
				$txt=$_POST['txt'];
				//echo $txt;
				
				$f=0;
				if(empty($search))
				{
						$f=1;
						$search_err= "select any option";
				}
				if(empty($txt))
				{
						$f=1;
						$txt_err = "Type text";
				}
			
				if($f==0)
					{
						
						$sql_job="select * from jobs where $search='$txt'";
						//echo $sql_job;
						$result_job=$conn->query($sql_job);
						//$row=$result_job->fetch_assoc();
						$count=mysqli_num_rows($result_job);
						if($count!=0)
						{
							echo"<table border='1'>
							<thead>
								<tr>
								<th>JOB_ID&nbsp;</th>
								<th>JOB_NAME&nbsp;</th>
								<th>JOB_DESC&nbsp;</th>
								<th>ELIGIBILITY&nbsp;</th>
								<th>WORK_LOC&nbsp;</th>
								<th>SALARY&nbsp;</th>
								<th>LAST_DATE&nbsp;</th>
								<th>POSTEDBY&nbsp;</th>
								</tr>
							</thead>";
							for($i=0;$i<$count;$i++)
								{
									$row=mysqli_fetch_array($result_job);
									echo "<tbody>";
									echo "<tr>";
									echo "<td>" . $row['job_id'] . "</td>";
									echo "<td>" . $row['job_name'] . "</td>";
									echo "<td>" . $row['job_desc'] . "</td>";
									echo "<td>" . $row['eligibility'] . "</td>";
									echo "<td>" . $row['location'] . "</td>";
									echo "<td>" . $row['salary'] . "</td>";
									echo "<td>" . $row['date_to_apply'] . "</td>";
									echo "<td>" . $row['Posted_By'] . "</td>";
									echo "<td><a href=\"applyjob.php?id=".$row['job_id']."\">Apply</a></td>";
									echo "</tr>";
									echo "</tbody>";    
								}
						}
						else
							echo"NOT FOUND";
						
						echo "</table>";						
												
					}
				
			
			
			}
			
		
				
			
				
						
				
		?>
				
		
		
		
		
		
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
            <input name="editbox_search" class="editbox_search" id="editbox_search" maxlength="80" value="Search :" type="text" />
            </span>
            <input name="button_search" src="images/search.gif" class="button_search" type="image" />
          </form>
        </div>
        <div class="clr"></div>
        <div class="gadget">
         <!--<h2 class="star"><span>Sidebar</span> Menu</h2>
          <div class="clr"></div>
          <ul class="sb_menu">
            
           <li><a href="shome.php">Home</a></li>
						<li><a href="#">View Profile</a></li>
           <li><a href="schangepwd.php">Change Password</a></li>
           <li><a href="searchjob.php">Search Job</a></li>
           <li><a href="applyjob.php">Apply For Job</a></li>
         </ul>
		 -->
        </div>
        <div class="gadget">
          <!--<<h2 class="star"><span>For Placement Preparation</span></h2>
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
            
          </ul>-->
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