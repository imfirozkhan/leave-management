<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="icon" href="leave.png" type="image/jpg">
	<link rel="stylesheet" href="style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div class="main">
		<div class="form-box">
			<div class="button-box">
			<div id="btn"></div>
				<button type="button" class="toggle-btn" onclick="login()">Log In</button>
			</div>
			<div class="social-icons">
			<img src="facebook.png">
			<img src="insta.png">
			<img src="google.jpg">
			</div>
			<form id="login" class="input-group" action="" method="post">
				<input type="email" class="input-field" name="email" placeholder="Enter Email" required>
				<input type="password" class="input-field" name="passwrd" placeholder="Enter password" required>
				<input type="checkbox" class="check-box" ><span>Remember Password</span>
				<button type="submit" name="submit" class="submit-btn">Log In</button>
				<br>
				<p>Do you want to go back?<a href="index.php">Click Here</a></p>

			 </form>
			 	</div>
		</div>
		<?php
if(isset($_POST['submit']))
	{
		$email=$_POST['email'];
		$passwrd=$_POST['passwrd'];
		include_once("connect.php");
		$result=mysqli_query($con,"select count(*)as total from adminlog where email='$email' and passwrd='$passwrd'");
		$row=mysqli_fetch_array($result);
		$_SESSION['admin']=$email;
		if($row['total']>0){
		echo '<script>
		alert("Login Successfully!!!");
		window.location.href="adminindex.php";
		</script>';
		}
		else
		{
			echo '<script>alert("Please enter valid Username and Password")</script>';
		}
		
	}
	?>
		</body>
		</html>
		