<?php 
error_reporting(0);
session_start();?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-color:powderblue; background-image:url('h1/coverhome2.jpg'); background-repeat:no-repeat; background-size:100% 100%;">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Home<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div>


<h1 align="center" style="color:#530602">Welcome to Student Management System</h1>
<form method="post" action="">
<table style="width:30%;"align="center" border="1">
<tr>
<td colspan="2" id="ov1">Student information</td>
</tr>
<tr>
<td align="left" id="ov2">Choose Standard</td>
<td>
<select name="std">
<option id="ov1" value="1">1st</option>
<option id="ov2"  value="2">2nd</option>
<option id="ov3"  value="3">3rd</option>
<option id="ov4"  value="4">4th</option>
<option id="ov5"  value="5">5th</option>
<option id="ov6"  value="6">6th</option>
<option id="ov1"  value="7">7th</option>
<option id="ov2"  value="8">8th</option>
<option id="ov3"  value="9">9th</option>
<option id="ov4"  value="10">10th</option>
<option id="ov5"  value="11">11th</option>
<option id="ov6"  value="12">12th</option>
<br><br><br><br>
</select>
</td>
</tr>
<tr>
<td align="left" id="ov3">Enter Rollno</td>
<td><input type="text" name="rollno"></td>

</tr>
<tr>
<td colspan="2" align="center" id="ov6"><input id="ov4" type="submit" name="submit" value="show info"></td>
</tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
$standard=$_POST['std'];
$rollno=$_POST['rollno'];
include('dbcon.php');
include('function.php');
}
?>