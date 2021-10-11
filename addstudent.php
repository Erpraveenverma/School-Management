<?php session_start();
error_reporting(0);
?>
<html>
<head>
<style>
#dash{
float:left;
}
</style>
</head>
<body style=" background-image:url('h1/coverinsert.jpg'); background-repeat:no-repeat; background-size:100% 120%;">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Dashboard<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div>
<form method="POST" action="" enctype="multipart/form-data" align="center" >
<h1>Add Student</h1>
RollNo <input type="text" name="rollno" value=""/><br><br>
Name <input type="text" name="name" value=""/><br><br>
City <input type="text" name="city" value=""/><br><br>
P.no. <input type="text" name="pno" value=""/><br><br>
Class <input type="text" name="class" value=""/><br><br>
<input type="file" name="upload" value=""/><br><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
include("dbcon.php"); 
function insert($con){
//error_reporting(0);
//echo'';
if ($_POST['submit']){
	$rn=$_POST['rollno'];
	$name=$_POST['name'];
	$cty=$_POST['city'];
	$pn=$_POST['pno'];
	$class=$_POST['class'];
	$filename=$_FILES['upload']['name'];
	//echo $filename;
	$tempname=$_FILES['upload']['tmp_name'];
	$folder='h1/'.$filename;
	move_uploaded_file($tempname,$folder);
	if ($rn==""||$name==""||$cty==""||$pn==""||$class==""||$filename==""){
		echo"all feilds are required";
	}
	else{
		$query="INSERT INTO `student`(`rollno`, `name`, `city`, `pcontact`, `standard`,`image`) VALUES ('$rn','$name','$cty','$pn','$class','$folder')";
		$data=mysqli_query($con,$query);
		if ($data){
		echo "<script>alert('Data inserted successfully');
			window.open('admindash.php','_self')</script>";
		}
		else{
		echo"<p color='red' >data not inserted</p>";
		}

	}
}
}
insert($con);
?>
</body>
</html>
