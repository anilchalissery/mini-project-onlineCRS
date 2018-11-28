<?php
							include("db_connect.php");
							$id = $_GET['id'];
							
							$sql_user="DELETE FROM jobs WHERE job_id='$id'";
							echo $sql_user;
							$result=$conn->query($sql_user);
							if($result)
							{
								/*?>
								<script type="text/javascript">
									alert("Record deleted");
								</script>
								<?php*/
								//echo "deleted";
								header('location:viewcmpny.php');
							}
							//mysqli_query($con,"DELETE FROM student WHERE id='$id'");
							
?>