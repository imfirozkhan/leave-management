<?php
	session_start();
	if(!$_SESSION['user'])
	{
		header('location:login.php');
	}
?>
<?php
	include_once("connect.php");
	$email=$_SESSION['user'];
	$result = mysqli_query($con, "select *from userinfo WHERE email='$email'");
	$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Leave Apply</title>
<link rel="icon" href="leave.png" type="image/jpg">
<link rel="stylesheet" href="jobstyle.css" type="text/css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
body{
	background-image:url("user-background.jpeg");
	background-position:center;
	background-size:cover;
}
</style>
</head>
<body>
<?php include_once("usernav.html"); ?>
<div class="adddetail">
<h1>Apply for Leave</h1>
</div>
<div class="main">
<form action="addleave.php" method="post" enctype="multipart/form-data">	
<h2 class="form1">Employee Id</h2>
<input type="text" class="empid" name="empid" id="design" value="<?php echo $row['empid'];?>" ><br/>
<h2 class="form1">Employee Name</h2>
<input type="text" class="name" name="name" id="design" value="<?php echo $row['name'];?>"  ><br/>
<h2 class="form1">Employee Email</h2>
<input type="email" class="email" name="email" id="design" value="<?php echo $row['email'];?>"  ><br/>
<h2 class="form1">Leave Type</h2>
<select class="option" name="leave_type" id="design" required>
<Option disabled="disabled" selected ="selected"  >Choose Leave Type</option>
<option>Sick Leave</option>
<option>Earned Leave</option>
<option>Marriage Leave</option>
<option>casual Leave</option>
<option>Compensatory Leave</option>
</select><br/>
<h2 class="form1">Leave From</h2>
<input type="date" class="leave_from" name="leave_from" id="design" placeholder="Enter Leave From Date" required><br/>
<h2 class="form1">Leave To</h2>
<input type="date" class="leave_to" name="leave_to" id="design" placeholder="Enter Leave To Date" required><br/>
<h2 class="form1">Description</h2>
<input type="text" class="descrp" name="descrp" id="design" placeholder="Enter Description" ><br/>
<h2 class="form1"> </h2>
<input type="submit" name="submit" class="submit">
<input type="reset" name="reset" class="reset">
</form>
</div>
<?php 
	if(isset($_POST['submit']))
	{	
		$empid=$_POST['empid'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$leave_type=$_POST['leave_type'];
		$leave_from=$_POST['leave_from'];
		$leave_to=$_POST['leave_to'];
		$descrp=$_POST['descrp'];
		$result=mysqli_query($con,"insert into leaverqst(empid,name,email,leave_type,leave_from,leave_to,descrp,status) values('$empid','$name','$email','$leave_type','$leave_from','$leave_to','$descrp',1)");
		if($result)
			{
				echo '<script>alert("Leave Applied Successfully!!!!")</script>';
			}
			else
			{
				echo "error";
			}
	}
 ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>

