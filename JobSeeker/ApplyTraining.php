<?php
if(!isset($_SESSION))
{
session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$CourseId=$_GET['CourseId'];
	$JobSeekId=$_SESSION['ID'];
	$Status="Apply";
	$Desc="No Message";
	
	// Establish Connection with MYSQL
	$con1 = mysqli_connect ("localhost","root","","job");

	// Specify the query to Insert Record
	$sql1 = "select * from coaching_master where JobSeekId='".$JobSeekId."' and CourseId='".$CourseId."'";
	// execute query
	$result1 = mysqli_query ($con1,$sql1);
	$records1 = mysqli_num_rows($result1);
	// Close The Connection
	mysqli_close ($con1);
	if($records1==0)
	{
	
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","job");

	// Specify the query to Insert Record
	$sql = "insert into coaching_master (JobSeekId,CourseId,Status,Description) values('".$JobSeekId."','".$CourseId."','".$Status."','".$Desc."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Succesfully Applied For Course");window.location=\'listoftrainings.php\';</script>';
}
else
{
echo '<script type="text/javascript">alert("You have already Applied For Course");window.location=\'listoftrainings.php\';</script>';
}
?>
</body>
</html>
