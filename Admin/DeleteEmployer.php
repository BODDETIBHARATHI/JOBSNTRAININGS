
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

	$Id=$_GET['EmployerId'];
// Establish Connection with Database
$con = mysqli_connect("localhost","root","","job");
	// Specify the query to Insert Record
	$sql = "delete from employer_reg where EmployerId='".$Id."'";
	// execute query
	mysqli_query ($con,$sql);
	// Close The Connection
	mysqli_close ($con);
	echo '<script type="text/javascript">alert("Employer Deleted Succesfully");window.location=\'Employer.php\';</script>';

?>
</body>
</html>
