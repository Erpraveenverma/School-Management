<?php session_start(); ?>
<html>
<head>
<style>
#dash{
float:left;
}
table{
margin-top:50px;
}
</style>
</head>
<body style="background-color:ccffff">
<div style="float:inherit; background-color: #530602; color:white; margin-left:50px; margin-right:50px; height:140px; line-height:140px;" >
<a href="index.php" style="float:left; text-decoration:none; color:white; margin-right:20px; margin-left:60px;">Home</a>
<a href="admindash.php" style="float:left; text-decoration:none; color:white; margin-right:75px; margin-left:10px;">Dashboard</a>
<h1 style="margin-left:105px; ">Welcome To Dashboard<?php echo" ".ucfirst($_SESSION['username']); if($_SESSION['username']){?> 
<button style="float:right; margin-top:40px; margin-right:50px;"><h1><a href='logout.php' style="text-decoration:none; font-size:18px;">logout</a></h1></button></h1>
<?php }else{?><a href="login1.php" id="l" style="float:right; font-size:18px; text-decoration:none; color:white; margin-right:50px;">Admin Login</a><?php }?>
</div>
<form method='post' action="updatestudent.php" style="margin-top:10px; text-align:center; ">
<label >Choose Class: </label>
<select name='class'> 
<option value='1'>1st</option>
<option value='2'>2nd</option>
<option value='3'>3rd</option>
<option value='4'>4th</option>
<option value='5'>5th</option>
<option value='6'>6th</option>
<option value='7'>7th</option>
<option value='8'>8th</option>
<option value='9'>9th</option>
<option value='10'>10th</option>
<option value='11'>11th</option>
<option value='12'>12th</option>
</select>
<lable style="margin-left:40px;">Choose Roll No.: </lable>
<input type='text' name='roll'>
<input type='submit' value='find' name='find' style="margin-left:40px;">
</form>

<?php
include('dbcon.php');
if (isset($_POST['find'])){
$class=$_POST['class'];
$rollno=$_POST['roll'];
$sql="SELECT * FROM student WHERE rollno='$rollno' AND standard='$class' ";
$data=mysqli_query($con,$sql);?>
<table border='1' align='center'>
<tr>
<th width='100px'>id</th>
<th width='100px'>rollno</th>
<th width='100px'>name</th>
<th width='100px'>city</th>
<th width='100px'>pcontact</th>
<th width='100px'>standard</th>
<th width='100px'>image</th>
<th colspan='2' width='200px'>operations</th>
</tr><?php
if($data){
while($res=mysqli_fetch_assoc($data)){
echo"
<tr align='center'>
<td >".$res['id']."</td>
<td>".$res['rollno']."</td>
<td>".$res['name']."</td>
<td>".$res['city']."</td>
<td>".$res['pcontact']."</td>
<td>".$res['standard']."</td>
<td><a href=".$res['image']."><img src=".$res['image']." height='130px' width='100px'></img></a></td>
<td><a href='update.php'>Edit</a></td>
<td><a href='deletestudent.php'>Delete</a></td>
</tr>";

}

}
else{
echo"<script>alert('No Record Found');</script>";
}
}
else{
$sql='SELECT * FROM student';
$data=mysqli_query($con,$sql);?>
<table border='1' align='center'>
<tr>
<th width='100px'>id</th>
<th width='100px'>rollno</th>
<th width='100px'>name</th>
<th width='100px'>city</th>
<th width='100px'>pcontact</th>
<th width='100px'>standard</th>
<th width='100px'>image</th>
<th colspan='2' width='200px'>operations</th>
</tr><?php
if($data){
while($res=mysqli_fetch_assoc($data)){
echo"
<tr align='center'>
<td >".$res['id']."</td>
<td>".$res['rollno']."</td>
<td>".$res['name']."</td>
<td>".$res['city']."</td>
<td>".$res['pcontact']."</td>
<td>".$res['standard']."</td>
<td><a href=".$res['image']."><img src=".$res['image']." height='130px' width='100px'></img></a></td>
<td><a href='update.php'>Edit</a></td>
<td><a href='deletestudent.php'>Delete</a></td>
</tr>";

}

}
else{
echo"<script>alert('No Record Found');</script>";
}
}
?>
</table>
</body>
</html>