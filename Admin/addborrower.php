<?php if(!isset($_SESSION)) {session_start();}  ?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Borrower Form</title>
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
/*if($_SESSION['loginstatus']=="")
{
  header("location:adminlogin.php");
}
*/
?>

 <div class="h_bg">
<div class="wrap">
<div class="header">
    <div class="logo">
      <h1><a href="index.php"><img src="Images/microfinance.jpg" alt=""></a></h1>

    </div>
  </div>
</div>
<?php include('db.php'); ?>
<center>
   <div style="width:1000px; height:700px; box-shadow:-10px 10px 5px #CCC">
<div style="width:200px; float:left;">
       <?php include('left.php'); ?>
       </div>
</div>
<div class="nav_bg">
<div class="wrap">
    <?php include('topbar.php'); ?>

  </div>

<div style="height:630px; width:700px; margin:auto; margin-top:10px; margin-bottom:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">

     <form method="post" enctype="multipart/form-data">
<table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; " >

    <tr><td colspan="2"  align="center"><img src="Images/registration.jpg" width="300px" height="80px"  /></td></tr>
   
<tr><td colspan="2">&nbsp;</td></tr>
   
                <tr><td  style=" padding-left:20px;" ><img src="Images/sidebanner.png" width="170px" class="shaddoww"/>&nbsp; </td>
                    <td style="vertical-align:top;padding-top:20px;">
                    <table cellpadding="0" cellspacing="0" style="width:100%; height:400px;">

<tr><td class="lefttd">Loan ID</td><td><input type="number" name="t1" required="required" pattern="[0-9]{10}" title="please enter only numbers between 10 to 11 for mobile no." /></td></tr>

<tr><td class="lefttd">Loan Date</td><td><input type="text" name="t2"  placeholder="YYYY-MM-DD" required 
pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))" 
title="Enter a date in this format YYYY-MM-DD"/></td></tr>

<tr><td class="lefttd">Loan Length</td><td><input name="t3" type="number" /></td></tr>

<tr><td class="lefttd">Interest</td><td><input name="t4" type="number" /></td></tr>



<tr><td class="lefttd">Point</td><td><input name="t6" type="number" /></td></tr>

<tr><td class="lefttd">Admin Id</td><td><input name="t7" type="number" /></td></tr>

<tr><td class="lefttd">Type ID</td><td><input name="t8" type="number" /></td></tr>
<!--
<tr><td class="lefttd">Uplod Pic</td><td><input type="file" name="t8" /></td></tr>
-->
<tr><td>&nbsp;</td><td><input type="submit" value="Register" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; "></td></tr></table>
</td></tr>

</table>
</form>

        </div>
</div>
    </center>          
        <div class="clear"></div>
<div class="ftr-bg">
<div class="wrap">
<div class="footer">
  <div class="f_nav">
    <ul>
      
           
     
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
  $cn=mysqli_connect("localhost","root","","microfinance");
  $LID=$_POST['t1'];
  $LDT=$_POST['t2'];
  $LLG=$_POST['t3'];
  $Int=$_POST['t4'];
  $Cp=$_POST['t6'];
  $AID=$_POST['t7'];
  $TID=$_POST['t8'];
    $s="insert into borrower(LoanID,LoanDate,LoanLength,Interest,Creditpoint,AdminID,TypeID) values($LID,'$LDT',$LLG,$Int,$Cp,$AID,$TID)";
      
      //$s="INSERT INTO `borrower`(`LoanID`, `LoanDate`, `LoanLength`, `Interest`, `Creditpoint`, `AdminID`, `TypeID`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5],[value-6],[value-7],[value-8])"
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
      echo "";
    } 
  
?>  

<?php include('bottom.php'); ?>

</body>
</html>
