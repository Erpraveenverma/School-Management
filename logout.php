<?php
session_start();
session_destroy();
echo"<script>alert('logging out');
window.open('index.php','_self');</script>";
//header('location:login1.php');
?>