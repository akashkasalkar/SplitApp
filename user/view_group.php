<!DOCTYPE html>
<html>
<head>
	<title>Group</title>
</head>
<body style="background-color:#9BA4B5">
	<?php 
        
    include "navbar.php"; ?>

	<div class="container m-5">
		<p class="h1   text-center" style="color: #212A3E;">Groups</p>
        <div class="">
    
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#joingroup">
            Join Group
        </button>
        <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#creategroup">
        Create New Group
        </button>
 
        </div>
        
        
        <div class="modal fade" id="joingroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Join Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Group ID</label>
                            <input type="text" class="form-control" name="group_id" placeholder="Enter group Id " required>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="g_password" placeholder="***** " required>
                        </div>
                        <div class="form-group">
                            <button name="join_group" class="btn btn-dark">Join</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Join</button> -->
                </div>
                </div>
            </div>
            </div>
            <?php 
                if(isset($_POST['join_group'])){
                    $already_joined_qry="select * from manage_group where fk_user_id='$user_id'";
                    $already_joined_exc=mysqli_query($conn,$already_joined_qry);
                    $already_joined_count=mysqli_num_rows($already_joined_exc);
                    if($already_joined_count==1){
                        echo "<script>alert('You already joined group')</script>";

                    }
                    else{

                    

                    $group_id=$_POST['group_id'];
                    $g_password=$_POST['g_password'];

                    $qry="select * from s_group 
                        where g_userid='$group_id'
                        AND g_password='$g_password'";
                    $exc=mysqli_query($conn,$qry);
					 $count=mysqli_num_rows($exc);
                    if($count==1){
                        //assign group to current user
                        while($row=mysqli_fetch_array($exc)){
                            $g_id=$row['g_id'];
                        }
                        $add_user_qry="INSERT INTO `manage_group`(`fk_group_id`, `fk_user_id`) VALUES('$g_id','$user_id')";
                        $add_user_exc=mysqli_query($conn,$add_user_qry);
                        if($add_user_exc){
                            echo "<script>alert('You joined group..!')</script>";
                        }

                    }
                    else{
                        echo "<script>alert('Wrong Group Details')</script>";

                    }
                }


                }
            ?>
            <div class="modal fade" id="creategroup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Group Name</label>
                            <input type="text" class="form-control" name="group_name" placeholder="Group Name" required>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="cat_id" class="form-control" id="" required>
                                <option value="" selected disabled>Select Category</option>
                                <?php 
                                    $qry="select * from expence_category";
                                    $exc=mysqli_query($conn,$qry);
                                    while($row=mysqli_fetch_array($exc)){
                                        ?>
                                    <option value="<?php echo $row['cat_id'] ?>"><?php echo $row['c_name'] ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button name="create_group" class="btn btn-dark">Create</button>
                        </div>
                       
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" name="create_group" class="btn btn-primary">Create</button> -->
                </div>
                </div>
                </form>
            </div>
            </div>


    <?php 
        if(isset($_POST['create_group'])){
            $group_name=$_POST['group_name'];
            $g_userid=rand(11111,99999);
            $g_password="12345";
            $cat_id=$_POST['cat_id'];
            $qry="INSERT INTO `s_group`(`fk_cat_id`, `created_by`, `g_name`, `g_userid`, `g_password`) VALUES('$cat_id','$user_id','$group_name','$g_userid','$g_password')";
            if(mysqli_query($conn,$qry)){
                $last_inserted_id=mysqli_insert_id($conn);
                $manage_grp_qry="INSERT INTO `manage_group`( `fk_group_id`, `fk_user_id`) VALUES('$last_inserted_id','$user_id')";
                $manage_grp_exc=mysqli_query($conn,$manage_grp_qry);

                echo "<script>alert('Group Created');
                    location=location
                </script>";
            }
            else{
                echo "err";
            }
            
        }
    ?>


        <div class="row mt-3">
            <?php 
                $qry="select * from manage_group mg,s_group sg ,user u
                        where mg.fk_group_id=sg.g_id
                        AND u.u_id=sg.created_by
                        AND mg.fk_user_id='$user_id'
                        AND g_status='Active'        
                ";
                $exc=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($exc)){
                    ?>

                  
            <div class="col-8 col-lg-3  offset-1 ">
                <a href="./manage_group.php?g_id=<?php echo $row['g_id'] ?>">
                    <div class="card" style="color: #F1F6F9;">
                        <div class="card-body">
                        <span class="display-3" style="color: #394867;">
                            <i class="fa fa-group float-right p-2"></i>
                        </span>
                            <h5 style="color: #394867;"><?php echo $row['g_name'] ?> 
                            
                        </h5>

                            <div class="float-right mt-3 text-dark" style="font-size: 12px;">
                                <?php 
                                    if($row['created_by']==$user_id){
                                        echo "Created By You";
                                    }else{
                                        echo "Created By ".$row['u_name'];
                                    }
                                ?>    
                            <!-- Created by <?php echo $row['u_name'] ?></div> -->
                        </div>

                    </div>
                </a>	
            </div>
            
         
        </div>
		<?php
                }
            ?>
	</div>
</body>
</html>