<!DOCTYPE html>
<html>
<head>
	<title>Manage Group</title>
    <style>
        .my_text_clr{
            color:394867;
        }
    </style>
</head>
<body style="background-color:#9BA4B5">
	<?php include "navbar.php"; ?>
    <?php 
    if(!isset($_GET['g_id'])){
        echo "<script>location='./view_group.php'</script>";
    }
        $g_id=$_GET['g_id'];
        $qry="select * from s_group sg,expence_category c where g_id='$g_id' and c.cat_id=sg.fk_cat_id";
        $exc=mysqli_query($conn,$qry);
        while($row=mysqli_fetch_array($exc)){
            $g_name=$row['g_name'];
            $g_userid=$row['g_userid'];
            $g_password=$row['g_password'];
            $category_name=$row['c_name'];

        }
    ?>
	<div class="container mt-5">
        <a href="./view_group.php" class="btn btn-outline-light">Back</a>
		<p class="h3  text-danger"></p>
		<div class="col-8 col-lg-6 offset-3 border border-light ">
            <div >
                <p class="h2 text-center my_text_clr" ><?php echo $g_name ?> Expences 
               
                    <!-- <a href="" data-toggle="modal" data-target="#edit_group_details">
                        <span class="h5"><i class="fa fa fa-pencil-square-o h6 text-light"></i></span>
                    </a> -->

                    </p>
                <a href="" class=" text-dark h5 btn btn-light mt-2" data-toggle="modal" data-target="#add_expences">Add Expences</a>
                <!-- <a href="" class=" text-dark h5 btn btn-light mt-2" data-toggle="modal" data-target="#add_participants"> Participants</a> -->

            </div>
            <hr class="border border-light">


            <!-- //modal add expences -->
            <div class="modal fade" id="add_expences" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Expences</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                        <input type="radio" name="expence_type" value="Expence" checked> &nbsp;<label for=""> Expence</label> &nbsp;
                        <input type="radio" value="Income" name="expence_type">&nbsp;<label for=""> Income</label> 

                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="expence_title" placeholder="Ex: Petrol,Grocery,ticket " required>
                        </div>
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" class="form-control" name="expence_amount" placeholder="Expence Amount in INR " required>
                        </div>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input type="date" class="form-control" name="expence_date" required>
                        </div>
                        <div class="form-group">
                            <label for="">Paid by</label>
                            <select name="paid_user_id" id="" class="form-control" required>
                                <option value="<?php echo $user_id ?>"><?php echo $user_name ?></option>
                                <?php 
                                     $qry="select * from manage_group mu,user u 
                                        where  mu.fk_user_id=u.u_id
                                        and mu.fk_group_id='$g_id'";
                                    $exc=mysqli_query($conn,$qry);
                                    while($row=mysqli_fetch_array($exc)){
                                        if($row['fk_user_id']!=$user_id){
                                            ?>
                                            <option value=""><?php echo $row['u_name'] ?></option>
                                        <?php
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button name="save_expences" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>

            </div>
            <!-- modal end add expences -->
                  <?php
                    if(isset($_POST['save_expences'])){
                        $expence_title=$_POST['expence_title'];
                        $expence_amount=$_POST['expence_amount'];
                        $expence_date=$_POST['expence_date'];
                        $paid_user_id=$_POST['paid_user_id'];
                        $expence_type=$_POST['expence_type'];

                        $qry="INSERT INTO `manage_group_expences`( `paid_by`, `fk_group_id`, `expence_title`, `expence_amount`, `paid_date`,`expence_type`) VALUES('$paid_user_id','$g_id','$expence_title','$expence_amount','$expence_date','$expence_type')";
                        $exc=mysqli_query($conn,$qry);
                        if($exc){
                            echo "<script>alert('Added.');
                                location=location
                            </script>";
                        }
                        else{
                            echo "err";
                        }

                    }
                  ?>                  
			
            <!-- //modal add participants -->
            <div class="modal fade" id="add_participants" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Overview</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Group Name</th>
                            <td><?php echo $g_name ?></td>
                        </tr>
                        <tr>
                            <th>Category</th>
                            <td><?php echo $category_name; ?></td>
                        </tr>
                    </table>
                    <table class="table table-bordered">
                        <thead class="text-center bg-dark text-light">
                            <tr>
                                <th colspan="4">Participants</th>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                 $qry="select * from manage_group mg,user u,s_group sg
                                    where sg.g_id=mg.fk_group_id
                                    and u.u_id=mg.fk_user_id
                                    and mg.fk_group_id='$g_id'
                                ";
                                $exc=mysqli_query($conn,$qry);
                                while($row=mysqli_fetch_array($exc)){
                                    ?>
                                <tr>
                                    <td><?php echo $row['u_name'] ?></td>
                                    <td><?php echo $row['u_email'] ?></td>
                                    <td><?php echo $row['u_phone'] ?></td>
                                    <td></td>

                                </tr>
                                    <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <hr>
                   <table class="table table-bordered">
                    <tr >
                        <td colspan="2" class="text-center h3 bg-dark text-light">Group Details</td>
                    </tr>
                        <tr>
                            <th>Group Id</th>
                            <td><?php echo $g_userid ?></td>
                        </tr>
                        <tr>
                            <th>Group Password</th>
                            <td><?php echo $g_password ?></td>
                        </tr>
                   </table>
                   <p class="text-danger">Share this group ID and password with your friends to join group.</p>
                </div>
              
                </div>
            </div>

            </div>
            <!-- modal end add participants -->

            
            <!-- //modal edit group -->
            <div class="modal fade" id="edit_group_details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Group Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                   <table class="table table-stripped">
                        <tr>
                            <th>Group Id</th>
                            <td><?php echo $g_userid ?></td>
                        </tr>
                        <tr>
                            <th>Group Password</th>
                            <td><?php echo $g_password ?></td>
                        </tr>
                   </table>
                   <p class="text-danger">Share this group ID and password with your friends to join group.</p>
                </div>
              
                </div>
            </div>

            </div>
            <!-- modal end edit group -->
            <div style="height: 350px; overflow-y:auto">

                <a href="" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#add_participants">Overview</a>
                <a href="./view_group_balance_details.php?g_id=<?php echo $g_id ?>" class="btn btn-sm btn-dark">Balance</a>
                <a href="whatsapp://send?text=Join Group on SplitNow, id=<?php echo $g_userid ?> and password=<?php echo $g_password ?>" data-action="share/whatsapp/share" class="btn btn-sm btn-dark">Share</a>

           
            <?php
                 $qry="select * from manage_group_expences mg,s_group sg,user u
                        where mg.fk_group_id=sg.g_id
                        AND mg.paid_by=u.u_id
                        AND mg.fk_group_id='$g_id'
                ";
                $exc=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($exc)){
                    ?>

              
            <div class="row border-top mt-1">
                
                <div class="col-3 border-right pr-2 my_text_clr">
                    <span class="h1 "><i class="fa fa-exchange offset-4"></i></span>
                    
                </div>
                <div class="col-7">
                    <p class="h3 my_text_clr"> 
                        <?php echo $row['expence_title'] ?>
                    <span class="float-right my_text_clr" style="color:#F1F6F9">₹ <?php echo $row['expence_amount'] ?></span>

                    </p>
                    <p class=" my_text_clr" style="font-size: 14px;"> 
                        Paid By <?php echo $row['u_name'] ?>
                    <span class="float-right my_text_clr" style="font-size: 12px;" >Expence On <?php echo $row['paid_date'] ?></span>

                    </p>
                </div>
                <div class="col-2 pr-2 border-left my_text_clr">
                    <p class="mt-4 h3">
                        <a href="" class="my_text_clr" >
                            <i class="fa fa-edit float-center text-dark"></i>
                        </a>
                    </p>
                </div>
               
               
            </div>
            <?php
                }
            ?>
              
              </div>
             </div>
		</div>
	</div>
</body>
</html>