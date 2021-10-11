<html>
	<head>
		<title>admin login</title>
	</head>
	<body style="background-image:url('h1/coverlogin2.jpg'); background-repeat:no-repeat; background-size:100% 100%;">
	         <form action="login1.php" method="POST" style="margin-top:100px;">
		<h1 style="text-align:center">Admin Login</h1>
		<table align="center">
			<tr>
				<td><lable for="uname">username:</lable</td><td><input type="text" name="uname" id="uname"></td>
			</tr> 
			<tr>
				<td><lable for="pass">password:</lable</td><td><input type="text" name="pass" id="pass"></td>
			</tr>
			<tr>
				<td colspan="2" align="center"><br><input type="submit" name="login" value="login" id="login"></td>
			</tr>
		</table>
	         </form>
	</body>
</html>

<?php
	include("dbcon.php");
		if(isset($_POST['login'])){
			$uname=$_POST['uname'];
			$pass=$_POST['pass'];
			$sql="SELECT * FROM admin WHERE username='$uname' ";
			$data=mysqli_query($con,$sql);
			$res=mysqli_fetch_assoc($data);
			if(mysqli_num_rows($data)){
				if($res['password']==$pass){
					session_start();
					$_SESSION['username']=$uname;
					
					
					echo"<script>
					alert('welcome ".$_SESSION['username']." ');
					window.open('index.php','_self');
					</script>";
					
					
				}
				else{
					
					echo"<script>
					alert('incorrect password');
					</script>";
					
				}
			}
			else{
				
					echo'<script>
					alert("incorrect username");
					</script>';
					
			}

		}

?>