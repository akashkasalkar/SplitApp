<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
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
        <p class="h3 my_text_clr text-center">Chnage Password</p>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Current Password</label>
                <input type="password" name="old_pass" class="form-control" placeholder="****" required>
            </div>
            <div class="form-group">
                <label for="">New Password</label>
                <input type="password" name="new_pass" class="form-control" placeholder="****" required>
            </div>
            <div class="form-group">
                <button class="btn btn-dark" name="c_p">Change Password</button>
            </div>
            
        </form>
			<?php
                if(isset($_POST['c_p'])){
                    $old_pass=$_POST['old_pass'];
                    $new_pass=$_POST['new_pass'];

                    $qry="UPDATE `user` SET u_password='$new_pass' where u_id='$user_id'";
                    if(mysqli_query($conn,$qry)){
                        echo "<script>alert('Password Changed')
                            location='./logout.php'
                        </script>";
                    }

                }
            ?>

		
			
		</div>
	</div>
</body>
</html>