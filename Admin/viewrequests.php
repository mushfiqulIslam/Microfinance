<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin</title>
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

 <div class="h_bg">
<div class="wrap">
<!-- <div class="header">
		<div class="logo">
			<h1><a href="index.php"><img src="Images/Logo2.jpg" alt=""></a></h1>
		</div>
	</div> -->
</div>
</div>
<div class="">
		<?php require('topbar.php');?>
	</div>
<div style="height:800px; width:1000px; margin:auto; margin-top:50px; margin-bottom:50px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
     <form method="post" enctype="multipart/form-data">
 <table cellpadding="20" cellspacing="20" width="1000px" height="200px"  style="margin:auto" >

   <tr><td colspan="9" align="center"><img src="Images/user.jpg" height="90px" /></td></tr>
   
   <tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
 <tr style="background-color:bisque" align="center" class="bold">            
             <td class="bold" style="color:red"  >NID</td><td align="center">Asset</td> <td align="center">Types of Business</td><td align="center">Loan Type</td><td align="center">Amount</td><td align="center">Loan ID</td>
            
        </tr>
                   

  

<?php

	
$cn=mysqli_connect("localhost","root","","microfinance");
$s="select * from applicant";
	$result=mysqli_query($cn,$s);
	$r=mysqli_num_rows($result);
	
	while($data=mysqli_fetch_array($result))
	{
				echo"<tr><td  style=' padding-left:20px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:30px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td>
                </tr>";
			}
    ?>
    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>   
 <tr style="background-color:bisque" align="center" class="bold">            
             <td class="bold"  >F Name</td><td align="center">L Name</td> <td align="center">Sex</td><td align="center">Phn no</td><td align="center">Address</td><td align="center">E-mail</td><td align="center" style="color:red">NID</td>
            
        </tr>
<?php
$sm="select fname,lname,sex,phn_no,address,e_mail,nid from user";
    $result=mysqli_query($cn,$sm);
    $r=mysqli_num_rows($result);
    echo $r;
    while($data=mysqli_fetch_array($result))
    {
                echo"<tr><td  style=' padding-left:10px'>$data[0]</td><td  style=' padding-left:10px'>$data[1]</td><td  style=' padding-left:20px'>$data[2]</td><td  style=' padding-left:10px'>$data[3]</td><td  style=' padding-left:50px'>$data[4]</td><td  style=' padding-left:50px'>$data[5]</td><td  style=' padding-left:50px'>$data[6]</td>
                </tr>";
            }
			mysqli_close($cn);
			?>


</table>
</form>
        </div>
          
        <div class="clear"></div>





			
			
	
</body>
</html>