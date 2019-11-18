<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
if(!isset($_SESSION))
{
session_start();
}
	$FeedBack=$_POST['txtFeedback'];
	$FDate= date('y/m/d');
	//$Id=$_SESSION['ID'];
	$Id=0;
       // JobSeeker.JobSeekerName="Anonymous";
	
	
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","job");

	// Specify the query to Insert Record
	$sql = "insert into Feedback(JobSeekId,Feedback,FeedbakDate) values('".$Id."','".$FeedBack."','".$FDate."')";
	// execute query
	mysqli_query ($sql,$con);
	// Close The Connection
	mysqli_close ($con);
	
	echo '<script type="text/javascript">alert("Thankyou for providing us your comments");window.location=\'ContactUs.php\';</script>';

?>
</body>
</html>
