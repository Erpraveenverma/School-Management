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
<body   style=" background-image:url('h1/coveredit.jpg'); background-repeat:no-repeat; background-size:105% 105%;">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Dashboard<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div>
<form method="POST" action="" enctype="multipart/form-data" align="center" >
<h1 style="color:white;">Edit Student</h1>
<lable style="color:white;">Id:  </lable> <input type="text" name="id" value=""/><br>
<font style='color:red; margin-right:65px; display:none; font-size:20px' id='invalid'>Invlaid Id</font><br>
<lable style="color:white;">RollNo:</lable> <input type="text" name="rollno" value=""/><br><br>
<lable style="color:white;">Name:</lable> <input type="text" name="name" value=""/><br><br>
<lable style="color:white;">City: </lable><input type="text" name="city" value=""/><br><br>
<lable style="color:white;">P.no.: </lable><input type="text" name="pno" value=""/><br><br>
<lable style="color:white;">Class: </lable><input type="text" name="class" value=""/><br><br>
<input type="file" name="upload" value=""/><br><br>
<input type="submit" name="submit" style="color:black;" value="submit">
</form>
<?php
include("dbcon.php"); 
function insert($con){
//error_reporting(0);
if ($_POST['submit']){
	$id=$_POST['id'];
	$rn=$_POST['rollno'];
	$name=$_POST['name'];
	$cty=$_POST['city'];
	$pn=$_POST['pno'];
	$class=$_POST['class'];
	$filename=$_FILES['upload']['name'];
	$tempname=$_FILES['upload']['tmp_name'];
	$folder='h1/'.$filename;
	move_uploaded_file($tempname,$folder);
	if ($rn==""||$name==""||$cty==""||$pn==""||$class==""||$filename==""){
		echo"all feilds are required";
	}
	else{
		$sql="SELECT * FROM student WHERE id=$id ";
		$data=mysqli_query($con,$sql);
		if(mysqli_num_rows($data)>0){
		$query="UPDATE `student` SET rollno='$rn',name='$name',city='$cty',pcontact='$pn',standard='$class',image='$folder' WHERE id='$id' ";
		$data=mysqli_query($con,$query);
		echo "<script>alert('Data updated successfully');
			window.open('updatestudent.php','_self')</script>";
		}
		else{
		echo "<script>document.getElementById('invalid').style.display='block'</script>";
		}

	}
}
}
insert($con);
?>
</body>
</html>
