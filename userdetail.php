<?php 
	session_start();
	if(!$_SESSION['admin'])
	{
		header("location:admin.php");
	}
 ?>
<?php
include_once("connect.php");
$result=mysqli_query($con,"select *from userinfo");
?>

<!DOCTYPE html>
<html>
<head>
<title>User Detail</title>
<link rel="icon" href="leave.png" type="image/jpg">
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
<?php include_once("adminnav.html");?>
<br/><br/>
<h1 style="text-align:center";>All Emplyee Details</h1>
<div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <table class="table table-bordered table-stripped text-center">
                       <tr>
                           <th>Emplyee Name</th>
                           <th>Employee Id</th>
                           <th>Department</th>
						   <th>Email</th>
						   <th>Password</th>
						   <th>Qualification</th>
                           <th>Mobile Number</th>
						   <th>Joining Date</th>
						   <th>Birth Date</th>
						   <th>Address</th>
						   <th width="150px">Action</th>
                       </tr>
					   <?php 
						while($user_data=mysqli_fetch_array($result))
						{
						?>
							<tr>
							<td><?php echo $user_data['name'];?></td>
							<td><?php echo $user_data['empid'];?></td>
							<td><?php echo $user_data['dept'];?></td>
							<td><?php echo $user_data['email'];?></td>
							<td><?php echo $user_data['passwrd'];?></td>
							<td><?php echo $user_data['qualification'];?></td>
							<td><?php echo $user_data['mobile'];?></td>
							<td><?php echo $user_data['jdate'];?></td>
							<td><?php echo $user_data['bdate'];?></td>
							<td><?php echo $user_data['addr'];?></td>
							<td><a href="edit.php?id=<?php echo $user_data['id'];?>" class="btn btn-success">Edit</a>
							<a href="delete.php?id=<?php echo $user_data['id'];?>" class="btn btn-danger">Delete</a></td>
							</tr>
						<?php
						}
					   ?>
					   
					   </table>
                       
                       
       </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>