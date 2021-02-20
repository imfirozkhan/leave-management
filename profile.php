<?php
	session_start();
	if(!$_SESSION['user'])
	{
		header("location:login.php");
	}
?>

<?php
	include_once("connect.php");
	$email=$_SESSION['user'];
	$result = mysqli_query($con, "select *from userinfo WHERE email='$email'");
	$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html>
 <html>
<head>
<title>Profile</title>
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
<h1>Your Profile</h1>
</div>
<div class="main">
<form action="" method="post" enctype="multipart/form-data">	
<h2 class="form1">Employee Name</h2>
<input type="text" class="name" name="name" id="design" placeholder="Enter Employee Name" value="<?php echo $row['name'];?>" required><br/>
<h2 class="form1">Employee Id</h2>
<input type="text" class="empid" name="empid" id="design" placeholder="Enter Employee Id" value="<?php echo $row['empid'];?>" required><br/>
<h2 class="form1">Department</h2>
<select class="option" name="dept" id="design" required>
<Option selected ="selected"  ><?php echo $row['dept']?></option>
<option>IT</option>
<option>HR</option>
<option>sales</option>
<option>Marketing</option>
<option>Finance</option>
</select><br/>
<h2 class="form1">Email</h2>
<input type="email" class="email" name="email" id="design" placeholder="Enter Email" value="<?php echo $row['email'];?>" required><br/>
<h2 class="form1">Password</h2>
<input type="text" class="passwrd" name="passwrd" id="design" placeholder="Enter password" value="<?php echo $row['passwrd'];?>" required><br/>
<h2 class="form1">Qualification</h2>
<input type="text" class="qualification" name="qualification" id="design" placeholder="Enter Qualification" value="<?php echo $row['qualification'];?>" required><br/>
<h2 class="form1">Mobile Number</h2>
<input type="number" class="mobile" name="mobile" id="design" placeholder="Enter Mobile Number" value="<?php echo $row['mobile'];?>" required><br/>
<h2 class="form1">Joining Date</h2>
<input type="date" class="jdate" name="jdate" id="design" placeholder="Enter Joining Date" value="<?php echo $row['jdate'];?>" required><br/>
<h2 class="form1">Birth Date</h2>
<input type="date" class="bdate" name="bdate" id="design" placeholder="Enter Birth date" value="<?php echo $row['bdate'];?>" required><br/>
<h2 class="form1">Address</h2>
<input type="text" class="addr" name="addr" id="design" placeholder="Enter Address" value="<?php echo $row['addr'];?>" required><br/>
</form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>