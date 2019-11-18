<?php
session_start();
if(isset($_SESSION['$UserName_job'])){
}
	else{
		header('location:../index.php');
	}
?>
<?php $con=mysqli_connect("localhost","root","","job");?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

//  $theValue = function_exists("mysql_real_escape_string") ? mysqli_real_escape_string($theValue) : mysqli_escape_string($theValue);
//
  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$currentPage = $_SERVER["PHP_SELF"];





$query_Recordset1 = "SELECT InstituteName FROM training_master";
$Recordset1 = mysqli_query( $con,$query_Recordset1) or die(mysqli_error());
$row_Recordset1 = mysqli_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysqli_num_rows($Recordset1);


$query_Recordset3 = "SELECT training_master.CourseId, training_master.InstituteName, training_master.CourseTitle,training_master.Fee,training_master.Timings, coaching_master.Status, coaching_master.JobSeekId, coaching_master.Description FROM coaching_master, training_master WHERE coaching_master.CourseId=training_master.CourseId";
$Recordset3 = mysqli_query($con,$query_Recordset3) or die(mysqli_error());
$row_Recordset3 = mysqli_fetch_assoc($Recordset3);
$totalRows_Recordset3 = mysqli_num_rows($Recordset3);


$query_Recordset4 = "SELECT distinct InstituteName FROM training_master";
$Recordset4 = mysqli_query($con,$query_Recordset4) or die(mysqli_error());
$row_Recordset4 = mysqli_fetch_assoc($Recordset4);
$totalRows_Recordset4 = mysqli_num_rows($Recordset4);


$query_Recordset5 = "SELECT distinct CourseTitle FROM training_master";
$Recordset5 = mysqli_query($con,$query_Recordset5) or die(mysqli_error());
$row_Recordset5 = mysqli_fetch_assoc($Recordset5);
$totalRows_Recordset5 = mysqli_num_rows($Recordset5);

$colname2_Recordset2 = "-1";
if (isset($_POST['txtName'])) {
  $colname2_Recordset2 = $_POST['txtName'];
}
$colname3_Recordset2 = "-1";
if (isset($_POST['txtTitle'])) {
  $colname3_Recordset2 = $_POST['txtTitle'];
}

$query_Recordset2 = sprintf("SELECT * FROM training_master WHERE InstituteName=%s and CourseTitle=%s",GetSQLValueString($colname2_Recordset2, "text"),GetSQLValueString($colname3_Recordset2, "text"));
$Recordset2 = mysqli_query($con,$query_Recordset2) or die(mysqli_error());
$row_Recordset2 = mysqli_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysqli_num_rows($Recordset2);

$queryString_Recordset2 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_Recordset2") == false && 
        stristr($param, "totalRows_Recordset2") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_Recordset2 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_Recordset2 = sprintf("&totalRows_Recordset2=%d%s", $totalRows_Recordset2, $queryString_Recordset2);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    <meta name="author" content="All: ... [Nazev webu - www.url.cz]; e-mail: info@url.cz" />
    <meta name="copyright" content="Design/Code: Vit Dlouhy [Nuvio - www.nuvio.cz]; e-mail: vit.dlouhy@nuvio.cz" />
    
<title>JOBNTRAININGS PORTAL</title>
    <meta name="description" content="..." />
    <meta name="keywords" content="..." />
    
    <link rel="index" href="./" title="Home" />
    <link rel="stylesheet" media="screen,projection" type="text/css" href="./css/main.css" />
    <link rel="stylesheet" media="print" type="text/css" href="./css/print.css" />
    <link rel="stylesheet" media="aural" type="text/css" href="./css/aural.css" />
    <style type="text/css">
<!--
.style1 {
	color: #000066;
	font-weight: bold;
}
.style2 {font-weight: bold}
.style3 {font-weight: bold}
-->
    </style>
</head>

<body id="www-url-cz">
<!-- Main -->
<div id="main" class="box">
<?php 
include "Header.php"
?>
<?php 
include "menu.php"
?>   
<!-- Page (2 columns) -->
    <div id="page" class="box">
    <div id="page-in" class="box">

        <div id="strip" class="box noprint">

            <!-- RSS feeds -->
            <hr class="noscreen" />

            <!-- Breadcrumbs -->
            <p id="breadcrumbs">&nbsp;</p>
          <hr class="noscreen" />
            
        </div> <!-- /strip -->

        <!-- Content -->
        <div id="content">

           
            <!-- /article -->

            <hr class="noscreen" />

           
            <!-- /article -->

            <hr class="noscreen" />
            
            <!-- Article -->
           
            <!-- /article -->

            <hr class="noscreen" />

            <!-- Article -->
            <div class="article">
                <h2><span><a href="#">Search Course</a></span></h2>
               

                <form id="form1" method="post" action="SearchInstitute.php">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                      <td><strong>Select Institute Name:</strong></td>
                      <td><label>
                        <select name="txtName" id="txtName">
                          <?php
do {  
?>
                          <option value="<?php echo $row_Recordset4['InstituteName']?>"><?php echo $row_Recordset4['InstituteName']?></option>
                          <?php
} while ($row_Recordset4 = mysqli_fetch_assoc($Recordset4));
  $rows = mysqli_num_rows($Recordset4);
  if($rows > 0) {
      mysqli_data_seek($Recordset4, 0);
	  $row_Recordset4 = mysqli_fetch_assoc($Recordset4);
  }
?>
                        </select>
                      </label></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td><strong>Select Course Title:</strong></td>
                      <td><label>
                        <select name="txtTitle" id="txtTitle">
                          <?php
do {  
?>
                          <option value="<?php echo $row_Recordset5['CourseTitle']?>"><?php echo $row_Recordset5['CourseTitle']?></option>
                          <?php
} while ($row_Recordset5 = mysqli_fetch_assoc($Recordset5));
  $rows = mysqli_num_rows($Recordset5);
  if($rows > 0) {
      mysqli_data_seek($Recordset5, 0);
	  $row_Recordset5 = mysqli_fetch_assoc($Recordset5);
  }
?>
                      </select>
                      </label></td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><input type="submit" name="button" id="button" value="Search" /></td>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
              </form>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="100%">&nbsp;
                     
                        <?php
						if ($totalRows_Recordset2!=0) 
						{
						do { ?>
                          <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                          <td><strong>CourseId</strong></td>
                          <td><strong><?php echo $row_Recordset2['CourseId']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>InstituteName</strong></td>
                          <td><strong><?php echo $row_Recordset2['InstituteName']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>CourseTitle</strong></td>
                          <td><strong><?php echo $row_Recordset2['CourseTitle']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>Fee</strong></td>
                          <td><strong><?php echo $row_Recordset2['Fee']; ?></strong></td>
                          </tr>
                          <tr>
                          <td><strong>Timings</strong></td>
                           <td><strong><?php echo $row_Recordset2['Timings']; ?></strong></td>
                           </tr>
                           <tr>
                          <td><strong>Description</strong></td>
                          <td><strong><?php echo $row_Recordset2['Description']; ?></strong></td>
                        </tr>
                           <tr>
                             <td>&nbsp;</td>
                             <td><a href="ApplyTraining.php?CourseId=<?php echo $row_Recordset2['CourseId'];?>"><strong>Apply For Training</strong></a></td>
                           </tr>
                        </table>
                        <?php } while ($row_Recordset2 = mysqli_fetch_assoc($Recordset2));
						  
						  ?>
                      </table>
                      <?php
					  }
                      ?></td>
                  </tr>
                </table>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#A0B9F3"><strong>Status of Course</strong></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="1" cellpadding="1" cellspacing="2" bordercolor="#006699" >
                      <tr>
                        <th height="32" bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Institute Name</strong></div></th>
                        <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Course Title</strong></div></th>
                        <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Fee</strong></div></th>
                        <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Timings</strong></div></th>
                        <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Status</strong></div></th>
                         <th bgcolor="#006699" class="style3"><div align="left" class="style9 style5 style2"><strong>Description</strong></div></th>
                      </tr>
                      <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root","","job");

// Specify the query to execute
$sql = "SELECT training_master.CourseId, training_master.InstituteName, training_master.CourseTitle,training_master.Fee,training_master.Timings, coaching_master.Status, coaching_master.JobSeekId, coaching_master.Description
FROM coaching_master, training_master
WHERE coaching_master.CourseId=training_master.CourseId and coaching_master.JobSeekId='".$_SESSION['ID']."'";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$InstituteName=$row['InstituteName'];
$CourseTitle=$row['CourseTitle'];
$Fee=$row['Fee'];
$Timings=$row['Timings'];
$Status=$row['Status'];
$Description=$row['Description'];
?>
                      <tr>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $InstituteName;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CourseTitle;?></strong></div></td>
                         <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Fee;?></strong></div></td>
                         <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Timings;?></strong></div></td>
                         <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Status;?></strong></div></td>
                         <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Description;?></strong></div></td>
                      </tr>
                      <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
                      <?php
// Close the connection
mysqli_close($con);
?>
                    </table></td>
                  </tr>
                </table>
                <p>&nbsp;</p>

              

                <p class="btn-more box noprint">&nbsp;</p>
          </div> <!-- /article -->

            <hr class="noscreen" />
            
        </div> <!-- /content -->

<?php
include "right.php"
?>

    </div> <!-- /page-in -->
    </div> <!-- /page -->

 
<?php
include "footer.php"
?>
</div> <!-- /main -->

</body>
</html>
<?php
mysqli_free_result($Recordset1);

mysqli_free_result($Recordset3);

mysqli_free_result($Recordset4);

mysqli_free_result($Recordset5);

mysqli_free_result($Recordset2);
?>
