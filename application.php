<?php if(!isset($_SESSION)) {session_start();}  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Form</title>
<link href="css/lightbox.css" rel="stylesheet" />
    <link href="StyleSheet.css" rel="stylesheet" type="text/css" />

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
     <script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/lightbox.min.js"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
  
 <script type="text/javascript">
     $(function () {
         SyntaxHighlighter.all();
     });
     $(window).load(function () {
         $('.flexslider').flexslider({
             animation: "slide",
             animationLoop: false,
             itemWidth: 210,
             itemMargin: 5,
             minItems: 2,
             maxItems: 4,
             start: function (slider) {
                 $('body').removeClass('loading');
             }
         });
     });
  </script>
</head>

<body>
<?php
if($_SESSION['userstatus']=="")
{
	header("location:login.php");
}
?>
<?php include('admin/db.php'); ?>
 <div class="h_bg">
<div class="wrap">
<div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="Images/microfinance.jpg" alt=""></a></h1>
		</div>
	</div>
</div>
</div>
<div class="nav_bg">
<div class="wrap">
		<?php require('header.php');?>
	</div>
<div style="height:630px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; " >

    <tr><td colspan="2"  align="center"><img src="Images/registration.jpg" width="300px" height="80px"  /></td></tr>
   
<tr><td colspan="2">&nbsp;</td></tr>
   
                <tr><td  style=" padding-left:20px;" ><img src="Images/sidebanner.png" width="170px" class="shaddoww"/>&nbsp; </td>
                    <td style="vertical-align:top;padding-top:20px;">
                    <table cellpadding="0" cellspacing="0" style="width:100%; height:400px;">

<tr><td class="lefttd">NID</td><td><input type="number" name="t1" required="required" pattern="[0-9]{20,25}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr>

<tr><td class="lefttd">Asset</td><td><input type="text" name="t2" required="required" pattern="[a-zA-Z _]{4,100}" title="please enter only character  between 4 to 10 for Last name" /></td></tr>

<tr><td class="lefttd">Types of Business</td><td><input type="text" name="t3" required="required" pattern="[a-zA-Z _]{3,25}" title="please enter only character  between 4 to 10 for Last name" /></td></tr>

<tr><td class="lefttd">Loan Type</td><td><input name="r1" type="radio" value="Dabi" checked="checked">Dabi<input name="r1" type="radio" value="Progoti" >Pragati</td></tr>

<tr><td class="lefttd">Amount</td><td><input type="number" name="t4" required="required" pattern="[0-9]{4,11}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr>

<tr><td class="lefttd">Loan ID</td><td><input type="number" name="t5" required="required" pattern="[0-9]{10}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr>
<!--

<tr><td class="lefttd">Uplod Pic</td><td><input type="file" name="t8" /></td></tr>
-->
<tr><td>&nbsp;</td><td><input type="submit" value="Register" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr></table>
</td></tr>

</table>
</form>
        </div>
          
        <div class="clear"></div>
<div class="ftr-bg">
<div class="wrap">
<div class="footer">
	<div class="f_nav">
		<ul>
			<li class="active"><a href="index.php">Home</a></li>			
                        <li><a href="login.php">log In</a></li>
                        <li><a href="aboutus.php">About</a></li>
           
			
            </ul>
	</div>
		
	<div class="clear"></div>
</div>
</div>
</div>

<?php
if(isset($_POST["sbmt"])) 
{
	/*$cn=makeconnection();*/
	$connection= mysqli_connect("localhost","root","","microfinance");
	$NID=$_POST['t1'];
	$Asset=$_POST['t2'];
	$TYB=$_POST['t3'];
	$LT=$_POST['r1'];
	$Am=$_POST['t4'];
	$LID=$_POST['t5'];
		$s="insert into applicant(NID,Asset,TypesofBusiness,LoanType,Amount,LoanID) values($NID,'$Asset','$TYB','$LT',$Am,$LID)";
			
			//$s="INSERT INTO `applicant`(`NID`, `Asset`, `TypesofBusiness`, `LoanType`, `LoanID`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])"
	
    
	
	if(!mysqli_query($connection,$s))
	{
		if($connection){
			echo "<script>alert('d Not Save');</script>";
		}
	    else{
	    	echo "<script>alert('Record Not Save');</script>";
	    }
	    
	}
	else
	{echo "<script>alert('Record saved');</script>";
		mysqli_close($connection);
	}
		} else{
			echo "sorry there was an error in your file.";
		}	
	
	

?> 
</body>
</html>
