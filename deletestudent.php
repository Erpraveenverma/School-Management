<?php session_start();?>
<html>
	<head>
		<style>
a{
float:left;
}
		</style>
	</head>
	<body  style=" background-image:url('h1/coverdelete.jpg'); background-repeat:no-repeat; background-size:100% 120%;">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Dashboard<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div>
	<form method='POST' action='' align='center' >
		<h1 style="color:white">Delete Record</h1>
		<lable style="color:white; font-size:18px;">enter id: </lable>
		<input type="text" name='del'>
		<center id='invalid' style='color:red; font-size:18px; margin-right:30px; display:none;' >invalid id</center><br><br>
		<input type='submit' value='delete' name='submit'>
	</form>
</body>
</html>
<?php 
	include('dbcon.php');
	//error_reporting(0);
	if (isset($_POST['submit'])){
		$di=$_POST['del'];
		$sql="SELECT * FROM student WHERE id=$di ";
		$data=mysqli_query($con,$sql);
		if(mysqli_num_rows($data)>0){
		$sql="DELETE FROM student WHERE id=$di ";
		$data=mysqli_query($con,$sql);
		
		
			echo"<script>
			alert('record deleted successfully');
			window.open('admindash.php','_self');
			</script>";
		}
		else{
			echo"<script>document.getElementById('invalid').style.display='block';</script>";	
		}
	}
?>