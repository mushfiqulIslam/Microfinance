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

<tr><td class="lefttd">First Name:</td><td><input type="text" name="t1" required="required" pattern="[a-zA-Z _]{4,10}" title="please enter only character  between 4 to 10 for first name" /></td></tr>

<tr><td class="lefttd">Last Name:</td><td><input type="text" name="t2" required="required" pattern="[a-zA-Z _]{4,10}" title="please enter only character  between 4 to 10 for Last name" /></td></tr>

<tr><td class="lefttd">Sex</td><td><input name="r1" type="radio" value="M" checked="checked">Male<input name="r1" type="radio" value="F" >Female</td></tr>


<tr><td class="lefttd">Mobile No</td><td><input type="number" name="t3" required="required" pattern="[0-9]{10,11,12,13}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr>

</select></td></tr>
<tr><td class="lefttd">Address</td><td><input type="Address" name="t4" required="required" /></td></tr>

</select></td></tr>
<tr><td class="lefttd">E-Mail</td><td><input type="email" name="t5" required="required" /></td></tr>

<tr><td class="lefttd">NID</td><td><input type="number" name="t6" required="required" pattern="[0-9]{4,25}" title="please enter only  numbers between 20 to 25 for age" /></td></tr>









<tr><td class="lefttd">Password</td><td><input type="password" name="t7" required="required" pattern="[a-zA-Z0-9]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>
<tr><td class="lefttd">Confirm Password</td><td><input type="password" name="t8" required="required" pattern="[a-zA-Z0-9 ]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>
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
	$FName=$_POST['t1'];
	$LName=$_POST['t2'];
	$Sex=$_POST['r1'];
	$Phn=$_POST['t3'];
	$Address=$_POST['t4'];
	$Email=$_POST['t5'];
	$NID=$_POST['t6'];
	$Pas=$_POST['t7'];

		$s="insert into user(FName,LName,Sex,Phn_no,Address,E_mail,NID,Password) values('$FName','$LName','$Sex',$Phn,'$Address','$Email',$NID,$Pas)";
			
			//$s="INSERT INTO `user`(`FName`, `LName`, `Sex`, `Phn no`, `Address`, `E-mail`, `NID`, `Password`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])"
	
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
	}
		} else{
			echo " ";
		}	
	
	

?> 
</body>
</html>
