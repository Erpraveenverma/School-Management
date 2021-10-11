<?php
session_start();
function showdetails($standard,$rollno)
{
if(!$_SESSION['username']){
echo"<script>alert('Admin Login required');</script>";
return;
}
include('dbcon.php');
$sql="SELECT * FROM student WHERE rollno='$rollno' AND standard='$standard' ";
$run=mysqli_query($con,$sql);
if(mysqli_num_rows($run)>0)
{
$data=mysqli_fetch_assoc($run);
?>
<table  style="text-align:center; align:center; margin-left:auto; margin-right:auto;">
<tr>
<th colspan='3' style="font-size:28px; color:#530602;">Student Details</th>
</tr>
<td rowspan='5'><img src="<?php echo $data['image']; ?>" width='120px' height='150px'</td>
<th>Roll No</th>
<td><?php echo $data['rollno'];?></td>
</tr>
<tr>
<th>Name</th>
<td><?php echo $data['name'];?></td>
</tr>
<tr>
<th>City</th>
<td><?php echo $data['city'];?></td>
</tr>
<th>Parent Contact</th>
<td><?php echo $data['pcontact'];?></td>
</tr>
<tr>
<th>Standard</th>
<td><?php echo $data['standard'];?></td>
</tr>
<tr>
</table>
<?php
}
else{
echo"<script>alert('No Record Found');</script>";
}
}
showdetails($standard,$rollno);
?>