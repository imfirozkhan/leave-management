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
	$result=mysqli_query($con,"select *from leaverqst WHERE email='$email'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Leave Request</title>
<link rel="icon" href="leave.png" type="image/jpg">
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
<?php include_once("usernav.html");?>
<br/><br/>
<h1 style="text-align:center;">All Leaves Request</h1>
<div class="col-md-12">
           <div class="card">
               <div class="card-body">
                   <table class="table table-bordered table-stripped text-center">
                       <tr>
                           <th>Emplyee Name</th>
                           <th>Employee Id</th>
                           <th>Leave From</th>
						   <th>Leave To</th>
						   <th>Leave Type</th>
						   <th>Status</th>
						   <th width="150px">Action</th>
                       </tr>
					   <?php 
						while($user_data=mysqli_fetch_array($result))
						{
						?>
							<tr>
							<td><?php echo $user_data['name'];?></td>
							<td><?php echo $user_data['empid'];?></td>
							<td><?php echo $user_data['leave_from'];?></td>
							<td><?php echo $user_data['leave_to'];?></td>
							<td><?php echo $user_data['leave_type'];?></td>
							<td>
								<?php 
									if($user_data['status']==1){
										echo "Applied";
									}if($user_data['status']==2){
										echo "Approved";
									}if($user_data['status']==3){
										echo "Rejected";
									}
										
								?>
								</td>
							<td>
							<?php if($user_data['status']==1){?>
							<a href="deleteleave.php?id=<?php echo $user_data['id'];?>" class="btn btn-danger">Delete</a></td>
							<?php }?>
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