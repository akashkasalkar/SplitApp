<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<style>
        .my_text_clr{
            color:394867;
        }
    </style>
</head>
<body  style="background-color:#9BA4B5">
	<?php include "navbar.php"; ?>

	<div class="container m-5">
		<div class="col-lg-6 offset-3">
		<p class="h3 my_text_clr text-center">Profile</p>

			<form method="post">
				
			
			<table class="table table-bordered table-stripped">
				
					<!-- // $qry="select * from user where email='$email'";
					// $exc=mysqli_query($conn,$qry);
					// while ($row=mysqli_fetch_array($exc)) {
					// 	# code...
					// 	$id=$row['id'];
					// 	$qry2="select * from user where id='$id'";
					// 	$exc2=mysqli_query($conn,$qry2);
					// 	while ($row2=mysqli_fetch_array($exc2)) {
					// 		# code...
					// 		$dept_name=$row2['name'];
					// 	}
						 -->

				<?php
				$qry="select * from user where u_id='$user_id'";
				$exc=mysqli_query($conn,$qry);
				while($row=mysqli_fetch_array($exc)) {
					$id=$row['u_id'];
					$name=$row['u_name'];
				
				?>		 

				<tr>
					<th>Name</th>
					<td><input type="text" name="name" class="form-control" required="" value="<?php echo $row['u_name'] ?>" readonly></td>
				</tr>
				
				
				<tr>
					<th>Email</th>
					<td><input type="text" name="email" class="form-control" required="" value="<?php echo $row['u_email'] ?>" readonly></td>
				</tr>
			
				<tr>
					<th>Phone</th>
					<td><input type="text" name="v_type" class="form-control" required="" value="<?php echo $row['u_phone'] ?>" readonly></td>
				</tr>
				
					<?php
					}

				 ?>
			</table>
			<div class="from-group offset-4">
				<!-- <button class="btn btn-success" name="update">Update</button> -->
			</div>
			</form>
			

				<!-- // if (isset($_POST['update'])) {
				// 	# code...
				// 	$name=$_POST['name'];
				// 	$sem=$_POST['sem'];
				// 	$qry="update student_details set name='$name',sem='$sem'";
				// 	if (mysqli_query($conn,$qry)) {
				// 		echo "<script>
				// 		alert('updated');
				// 		location=location
				// 		</script>";
				// 	}
				// } -->
			
		</div>
	</div>
</body>
</html>