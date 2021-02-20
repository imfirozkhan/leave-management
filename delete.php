<?php
	include_once("connect.php");
	$id=$_GET['id'];
	$res=mysqli_query($con,"DELETE from userinfo where id=$id");
	header("location:userdetail.php");
?>