
<?php
session_start();
if(isset($_SESSION['$UserName_trainer'])){

} 
else{
		header('location:../index.php');
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="cs" lang="cs">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="content-language" content="cs" />
    <meta name="robots" content="all,follow" />

    <meta name="author" content="All: ... [Nazev webu - www.url.cz]; e-mail: info@url.cz" />
    <meta name="copyright" content="Design/Code: Vit Dlouhy [Nuvio - www.nuvio.cz]; e-mail: vit.dlouhy@nuvio.cz" />
    
<title>JOBSNTRAININGS PORTAL</title>
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
-->
    </style>
    <script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
    <script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
    <link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
    <link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
    <style type="text/css">
<!--
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
                <h2><span><a href="#">Welcome <?php echo $_SESSION['$UserName_trainer'];?></a></span></h2>
               

                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td bgcolor="#A0B9F3"><strong>Manage Training</strong></td>
                  </tr>
                  <tr>
                    <td><form id="form1" method="post" action="InsertTraining.php">
                      <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td><strong>Course Title:</strong></td>
                          <td><span id="sprytextfield1">
                            <label>
                            <input type="text" name="txtTitle" id="txtTitle" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
			<tr>
                          <td><strong>Fee:</strong></td>
                          <td><label>
                            <input type="number" name="txtOther" id="txtOther" />
                          </label></td>
                        </tr>
                        <tr>
                          <td><strong>Total Seats Available:</strong></td>
                          <td><span id="sprytextfield2">
                            <label>
                            <input type="text" name="txtTotal" id="txtTotal" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td><strong>Timings:</strong></td>
                          <td><span id="sprytextfield1">
                            <label>
                            <input type="text" name="txtTime" id="txtTime" />
                            </label>
                          <span class="textfieldRequiredMsg">A value is required.</span></span></td>
                        </tr>
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Description:</strong></td>
                          <td><span id="sprytextarea1">
                            <label>
                            <textarea name="txtDesc" id="txtDesc" cols="25" rows="3"></textarea>
                            </label>
                          <span class="textareaRequiredMsg">A value is required.</span></span></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                          <td><label>
                            <input type="submit" name="button" id="button" value="Submit" />
                          </label></td>
                        </tr>
                      </table>
                                        </form>
                    </td>
                  </tr>
                  <tr>
                    <td bgcolor="#A0B9F3"><strong>Posted Trainings </strong></td>
                  </tr>
                  <tr>
                    <td><table width="100%" border="1" bordercolor="#1CB5F1" >
                      <tr>
                        <th height="32" bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Id</strong></div></th>
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Course Title</strong></div></th>
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Fee</strong></div></th>
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Availability</strong></div></th>
                         <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Timings</strong></div></th>
                          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style5"><strong>Description</strong></div></th>
                    
                        <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style12">Delete</div></th>
                      </tr>
                      <?php
// Establish Connection with Database
$con = mysqli_connect("localhost","root","","job");

// Specify the query to execute
$sql = "select * from training_Master where InstituteName='".$_SESSION['Name']."'";
// Execute query
$result = mysqli_query($con,$sql);
// Loop through each records 
while($row = mysqli_fetch_array($result))
{
$Id=$row['CourseId'];
$CourseTitle=$row['CourseTitle'];
$Fee=$row['Fee'];
$SeatAvailable=$row['SeatAvailable'];
$Timings=$row['Timings'];
$Description =$row['Description'];

?>
                      <tr>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Id;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $CourseTitle;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Fee;?></strong></div></td>
                        <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $SeatAvailable;?></strong></div></td>
                          <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Timings;?></strong></div></td>
                            <td class="style3"><div align="left" class="style9 style5"><strong><?php echo $Description;?></strong></div></td>
                      
                        <td class="style3"><div align="left" class="style9 style5"><strong><a href="DeleteTraining.php?CourseId=<?php echo $Id;?>">Delete</a></strong></div></td>
                      </tr>
                      <?php
}
// Retrieve Number of records returned
$records = mysqli_num_rows($result);
?>
                      <tr>
                        <td colspan="6" class="style3"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
                      </tr>
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

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>
