<?php session_start();  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Microfinance</title>
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
  
   
<div style="height:500px;">
     <form method="post" enctype="multipart/form-data">

   <table cellpadding="0" cellspacing="0" width="600px" height="300px" class="tableborder" style="margin:auto; margin-top:100px;" >
     <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
    <tr><td colspan="2" align="center"><img src="Images/login2.jpeg" width="200px" height="70px"></td></tr>
    
     <tr><td colspan="2">&nbsp;</td></tr>  <tr><td colspan="2">&nbsp;</td></tr> 
                <tr><td align="right"><img src="Images/login1.png" width="200px" height="150px" /></td>
                    <td style="vertical-align:top"><table cellpadding="0" cellspacing="0" height="200px">             


<tr><td class="lefttd">E-Mail</td><td><input type="email" name="t1" required="required"/></td></tr>
<tr><td class="lefttd">Password</td><td><input type="password"name="t2"  required="required" pattern="[a-zA-Z0-9]{2,10}" title="please enter only character or numbers between 2 to 10 for password"  /></td></tr>


<tr><td>&nbsp;</td><td><input type="submit" value="Log In" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>
 <tr><td style="font-size:14px">Not An User.?</td><td ><a href="registration.php" style="color:#C30">Click here</a> to REGISTER.</td></tr>
                        <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
              
</table>
</td></tr></table>


		
</form>
</div>

       
        <div class="clear"></div>
<div class="ftr-bg">
<div class="wrap">
<div class="footer">
	

		
	



<?php

$_SESSION['userstatus']="";

if(isset($_POST["sbmt"])) 
{
	
	/*$cn=makeconnection();*/			
	$connection= mysqli_connect("localhost","root","","microfinance");
	$email=$_POST['t1'];
	$pas=$_POST['t2'];
		$s="select fname,lname,sex,phn_no,address,e_mail,nid from user where E_mail='$email' and password='$pas'";
			
	$result=mysqli_query($connection,$s);
	$nid;
	if(!$result)
	{
		echo "<script>alert('Invalid User Name Or Password');</script>";
		}
	else
	{
		$_SESSION["email"]=$email;
       $_SESSION['userstatus']="yes";
       
       require('view.php');
       
	   $r=mysqli_num_rows($result);
	
	while($data=mysqli_fetch_array($result))
	{           $nid=$data[6];
				echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:50px'>$data[6]</td>
                </tr>";

			}
		mysqli_close($connection);
	}
		
			
  


	
$cn=mysqli_connect("localhost","root","","microfinance");
$s="select * from applicant where nid=$nid";
	$result=mysqli_query($cn,$s);
	
	require('appview.php');
	$r=mysqli_num_rows($result);
	$Lid=0;

	while($data=mysqli_fetch_array($result))
	{			$Lid=$data[5];
				echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td>
                	</tr>";
			}
			
		
$cn=mysqli_connect("localhost","root","","microfinance");
$s="select * from borrower where loanid=$Lid";
	$result=mysqli_query($cn,$s);
	
	require('borrowerview.php');
	$r=mysqli_num_rows($result);
	
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:50px'>$data[6]</td>
                	</tr>";
			}
		
		

?>
<tr style="background-color:bisque">
<td class="bold"  align="center" >Amount</td><td class="bold"  align="center" >Date</td></tr>
<?php
	$s="select Amount,Date from payment where LoanID=$Lid";

/*SELECT `Amount`, `Date`, `PID` FROM `payment` WHERE LoanID=$LID*/
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
	
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td>
                </tr>";
			}	
		

?>
		<tr style="background-color:bisque"><td class="bold" style="color:red" align="center" >Total Payed</td></tr>
<?php
	$s="select sum(Amount) from payment where LoanID=$Lid";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  align='center'>$data[0]</td>
                </tr>";
			}
	mysqli_close($cn);
}
?>
    
</table>
</form>
        </div>

<div class="f_nav">
		<ul>
			<li class="active"><a href="index.php">Home</a></li>			
                        <li><a href="login.php">log In</a></li>
                        <li><a href="application.php">Application</a></li>
                        <li><a href="aboutus.php">About</a></li>
            
			
            </ul>
	</div>
		
	<div class="clear"></div>
</div>
</div>
</div>
</div>
</body>
</html>
