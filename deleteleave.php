<?php 
	include_once("connect.php");
	$id=$_GET['id'];
	$res=mysqli_query($con,"DELETE from leaverqst where id=$id");
	header("Location:leave.php");
 ?>