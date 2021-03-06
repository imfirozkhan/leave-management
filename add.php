<?php
	session_start();
	if(!$_SESSION['admin'])
	{
		header('location:admin.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Create User</title>
<link rel="icon" href="leave.png" type="image/jpg">
<link rel="stylesheet" href="jobstyle.css" type="text/css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<style>
body{
	background-image:url("background.jpeg");
	background-position:center;
	background-size:cover;
}
</style>
</head>
<body>
<?php include_once("adminnav.html"); ?>
<div class="adddetail">
<h1>Create User</h1>
</div>
<div class="main">
<form action="add.php" method="post" enctype="multipart/form-data">	
<h2 class="form1">Employee Name</h2>
<input type="text" class="name" name="name" id="design" placeholder="Enter Employee Name" required><br/>
<h2 class="form1">Employee Id</h2>
<input type="text" class="empid" name="empid" id="design" placeholder="Enter Employee Id" required><br/>
<h2 class="form1">Department</h2>
<select class="option" name="dept" id="design" required>
<Option disabled="disabled" selected ="selected"  >Choose Department</option>
<option>IT</option>
<option>HR</option>
<option>sales</option>
<option>Marketing</option>
<option>Finance</option>
</select><br/>
<h2 class="form1">Email</h2>
<input type="email" class="email" name="email" id="design" placeholder="Enter Email" required><br/>
<h2 class="form1">Password</h2>
<input type="password" class="passwrd" name="passwrd" id="design" placeholder="Enter password" required><br/>
<h2 class="form1">Qualification</h2>
<input type="text" class="qualification" name="qualification" id="design" placeholder="Enter Qualification" required><br/>
<h2 class="form1">Mobile Number</h2>
<input type="number" class="mobile" name="mobile" id="design" placeholder="Enter Mobile Number" required><br/>
<h2 class="form1">Joining Date</h2>
<input type="date" class="jdate" name="jdate" id="design" placeholder="Enter Joining Date" required><br/>
<h2 class="form1">Birth Date</h2>
<input type="date" class="bdate" name="bdate" id="design" placeholder="Enter Birth date" required><br/>
<h2 class="form1">Address</h2>
<input type="text" class="addr" name="addr" id="design" placeholder="Enter Address" required><br/>
<h2 class="form1"> </h2>
<input type="submit" name="submit" class="submit">
<input type="reset" name="reset" class="reset">
</form>
</div>
<?php 
	if(isset($_POST['submit']))
	{	
		$name=$_POST['name'];
		$empid=$_POST['empid'];
		$dept=$_POST['dept'];
		$email=$_POST['email'];
		$passwrd=$_POST['passwrd'];
		$qualification=$_POST['qualification'];
		$mobile=$_POST['mobile'];
		$jdate=$_POST['jdate'];
		$bdate=$_POST['bdate'];
		$addr=$_POST['addr'];
		include_once("connect.php");
		$result=mysqli_query($con,"insert into userinfo(name,empid,dept,email,passwrd,qualification,mobile,jdate,bdate,addr) values('$name','$empid','$dept','$email','$passwrd','$qualification','$mobile','$jdate','$bdate','$addr')");
		if($result)
			{
				echo '<script>alert("Form Submitted Successfully!!!!")</script>';
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

