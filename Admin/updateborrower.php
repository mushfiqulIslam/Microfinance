<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--slider-->
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
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
/*if($_SESSION['loginstatus']=="")
{
	header("location:adminlogin.php");
}
*/
?>
<?php include('topbar.php'); ?>
    <center>
   <div style="width:1000px; height:700px; box-shadow:-10px 10px 5px #CCC">
       <div style="width:200px; float:left;">
       <?php include('left.php'); ?>
       </div>
       <div style="width:800px;float:left">
<br /><br />

<?php include('db.php'); ?>


<form method="post">
   <tr><td class="lefttd">Amount</td><td><input type="number" name="t4" required="required" pattern="[0-9]{2,6}" title="please enter only numbers " /></td></tr>
</td></tr>
<table border="0" align="center" width="350" height="300px" class="shaddoww">
<tr><td class="lefttd" >Update Mpadate</td></tr><input type="text" name="t1"  placeholder="YYYY-MM-DD" required 
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
title="Enter a date in this format YYYY-MM-DD"  required="required"/></td></tr>
<tr><td class="lefttd">point</td><td><input type="number" name="t2" required="required" pattern="[0-9]{1,3}" title="please enter only numbers " /></td></tr>
</td></tr>
<tr><td class="lefttd">Loan ID</td><td><input type="number"  name="t3"    required="required"  /></td></tr> </td></tr>

<tr><td>&nbsp;</td><td><input type="submit" value="UPDATE" name="sbmt"></td></tr>

<?php
$cn=mysqli_connect("localhost","root","","microfinance");
$s="select * from borrower";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	//echo $r;
  require('borrowerview.php');
	while($data=mysqli_fetch_array($result))
	{
		
		echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:50px'>$data[6]</td>
                	</tr>";
		
		
		
	}
	mysqli_close($cn);

?>
<!--INSERT INTO `payment`(`LoanID`, `Amount`, `Date`, `PID`) VALUES ([value-1],[value-2],[value-3],[value-4])-->

</select>

<?php

if(isset($_POST["sbmt"]))
{
  $a=$_POST['t4'];
	$D=$_POST['t1'];
	$P=$_POST['t2'];
	$LID=$_POST['t3'];
	$cn=mysqli_connect("localhost","root","","microfinance");
  $p="select Creditpoint from borrower where LoanID=$LID";
  $result=mysqli_query($cn,$p);
  $data=mysqli_fetch_array($result);
  $P=$P+$data[0];
	$sa="insert into payment (loanid,amount,date) values ($LID,$a,'$D')";
	$s="update borrower set Creditpoint=$P where LoanID=$LID";
  echo "<tr><td  style=' padding-left:20px'>$P</td><td  style=' padding-left:20px'>$data[0]</td></tr>";
  
	mysqli_query($cn,$s);
  mysqli_query($cn,$sa);
	mysqli_close($cn);
	echo "<script>alert('Record Update');</script>";
  
}

?>


</table>
</form>
       </div>

   </div>
    </center>
<?php include('bottom.php'); ?>
   
</body>
</html>