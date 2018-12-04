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
<?php /*
if($_SESSION['loginstatus']=="")
{
	header("location:adminlogin.php");
}*/
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

<form method="post" enctype="multipart/form-data">      
<tr><td class="lefttd">Loan ID</td><input type="number" name="t1" required="required" pattern="[0-9]{10}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr><tr><td>&nbsp;</td><td><input type="submit" value="Show" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr>


<table border="0" align="center" width="400" height="50px" class="shaddoww">
	<tr style="background-color:bisque" align="center" class="bold">            
             <td class="bold"   >Amount </td><td align="center">Date</td> <td align="center"></td>
            
        

<?php
if(isset($_POST["sbmt"]))
{
	
$LID=$_POST['t1'];
	$cn=mysqli_connect("localhost","root","","microfinance");
	$s="select Amount,Date from payment where LoanID=$LID";

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
	$s="select sum(Amount) from payment where LoanID=$LID";
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


</tr>

</table>
</form>
</body>
</html>
