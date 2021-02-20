<?php
	session_start();
	if(!$_SESSION['admin'])
	{
		header('location:admin.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin</title>
<link rel="icon" href="leave.png" type="image/jpg">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<style>
body{
	background-image:url("admin-tag.jpg");
	background-size:cover;
}
</style>
</head>
<body>
<?php include_once("adminnav.html");
	echo"<center><h1>welcome ".$_SESSION['admin']. "</h1></center>";
 ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>