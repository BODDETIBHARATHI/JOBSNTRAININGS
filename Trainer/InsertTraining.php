<?php
if (!isset($_SESSION)) 
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

	$txtTitle=$_POST['txtTitle'];
	$txtOther=$_POST['txtOther'];
	$txtTotal=$_POST['txtTotal'];
	$txtTime=$_POST['txtTime'];
	$txtDesc=$_POST['txtDesc'];
	$Name=$_SESSION['Name'];
	//if($cmbQual=="Other")
	//{
	//$cmbQual=$_POST['txtOther'];
	//}
	// Establish Connection with MYSQL
	$con = mysqli_connect ("localhost","root","","job");

	// Specify the query to Insert Record
	$sql = "insert into training_master (InstituteName,CourseTitle,Fee,SeatAvailable,Timings,Description) values('".$Name."','".$txtTitle."','".$txtOther."','".$txtTotal."','".$txtTime."','".$txtDesc."')";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Training Inserted Succesfully");window.location=\'ManageTraining.php\';</script>';

?>
</body>
</html>
