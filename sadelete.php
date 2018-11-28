<?php
							include("db_connect.php");
							$id = $_GET['id'];
							$sql_user="DELETE FROM student_academics WHERE ap_id='$id'";
							$result=$conn->query($sql_user);
							if($result)
							{
								/*?>
								<script type="text/javascript">
									alert("Record deleted");
								</script>
								<?php*/
								//echo "deleted";
								header('location:viewstud.php');
							}
							//mysqli_query($con,"DELETE FROM student WHERE id='$id'");
							
?>