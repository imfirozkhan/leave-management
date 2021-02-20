<?php 
	session_start();
	if(!$_SESSION['admin'])
	{
		header("location:admin.php");
	}
 ?>
<?php
 include_once("connect.php");
$result=mysqli_query($con,"select *from leaverqst");

if(isset($_GET['type']) && $_GET['type']=='update' && isset($_GET['id'])){
	$id=$_GET['id'];
	$status=$_GET['status'];
	mysqli_query($con,"UPDATE leaverqst set status='$status' where id=$id"); 
}
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
	background-image:url("background.jpeg");
	background-position:center;
	background-size:cover;
}
 </style>
 </head>
<body>
<?php include_once("adminnav.html");?>
<br/><br/>
<h1 style="text-align:center;"><b>All Leaves Request</b></h1>
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
								<?php { ?>
								<br><select style="width:130px;" onchange="statusUpdate('<?php echo $user_data['id']?>',this.options[this.selectedIndex].value)">
								<option value="">Update Status</option>
								<option value="2">Approved</option>
								<option value="3">Rejected</option>
								</select>
								<?php }?>
							</td>
							<td><a href="deleteleave.php?id=<?php echo $user_data['id'];?>" class="btn btn-danger">Delete</a></td>
							</tr>
						<?php
						}
					   ?>
					   
					   </table>
                       
                       
       </div>
    </div>
</div>
<script>
	function statusUpdate(id,val){
		window.location.href='adminleave.php?id='+id+'&type=update&status='+val;
	}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>