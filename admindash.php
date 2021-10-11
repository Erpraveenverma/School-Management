<?php session_start(); ?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body style="background-image:url('h1/coverdash.jpg'); background-attachment:fixed; background-repeat:no-repeat; background-size:100% 650px;">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Dashboard<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div><br><br>
<div class="dashboard">
<table border="5" border-color="black" align="center" >
<tr> 
<td style="padding-left:50px; padding-right:50px;">1.</td><td style="padding-left:50px; padding-right:50px; text-decoration:none; " ><a href="addstudent.php" style="text-decoration:none; color:black; font-size:20px;">Insert student details</a></td>
</tr>
<tr> 
<td style="padding-left:50px; padding-right:50px ">2.</td><td style="padding-left:50px; padding-right:50px "><a href="updatestudent.php"  style="text-decoration:none; color:black; font-size:20px;">Update student details</a></td>
</tr>
<tr> 
<td style="padding-left:50px; padding-right:50px ">3.</td><td style="padding-left:50px; padding-right:50px "><a href="deletestudent.php" style="text-decoration:none; color:black; font-size:20px;">Delete student details</a></td>
</tr>
</table>

</body>
</html>