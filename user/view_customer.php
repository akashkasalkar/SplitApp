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
   
	<div class="container mt-5">
        <!-- <a href="./view_group.php" class="btn btn-outline-light">Back</a> -->
		<p class="h3  text-danger"></p>
		<div class="col-8 col-lg-6 offset-3 border border-light ">
            <div >
                <p class="h2 text-center my_text_clr" >Customer Expences 
               
                    <!-- <a href="" data-toggle="modal" data-target="#edit_group_details">
                        <span class="h5"><i class="fa fa fa-pencil-square-o h6 text-light"></i></span>
                    </a> -->

                    </p>
                <a href="" class=" text-dark h5 btn btn-light mt-2" data-toggle="modal" data-target="#add_customer">Add Customer</a>
                <!-- <a href="" class=" text-dark h5 btn btn-light mt-2" data-toggle="modal" data-target="#add_participants"> Participants</a> -->

            </div>
            <hr class="border border-light">


            <!-- //modal add expences -->
            <div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                      

                        </div>
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="cust_name" placeholder="Name of customer " required>
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" class="form-control" name="cust_phone" placeholder="8073807591 " required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="cust_email" placeholder="customer@gmail.com" required>
                        </div>
                      
                        <div class="form-group">
                            <button name="save_cust" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>

            </div>
            <!-- modal end add expences -->
            
            <?php
                if(isset($_POST['save_cust'])){
                    $cust_name=$_POST['cust_name'];
                    $cust_email=$_POST['cust_email'];
                    $cust_phone=$_POST['cust_phone'];


                    $qry="select * from customer where cust_email='$cust_email' or cust_phone='$cust_phone' and created_by='$user_id'";
                    $exc=mysqli_query($conn,$qry);
                    $count=mysqli_num_rows($exc);
                    if($count==0){
                        $insert_cust_qry="INSERT INTO `customer`(`created_by`, `cust_name`, `cust_email`, `cust_phone`) VALUES('$user_id','$cust_name','$cust_email','$cust_phone')";
                        if(mysqli_query($conn,$insert_cust_qry)){
                            echo "<script>alert('New customer added.');
                            location=location</script>";
                        }
                    }
                    else{
                        echo "<script>alert(' customer already exist.');
                            location=location</script>";
                    }
                    

                }
            ?>
			
            <?php 
                $qry="select * from customer 
                where created_by='$user_id'
            ";
                $exc=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($exc)){
                    
                    ?>
                   
           
            <div class="row border-top mt-1">
                
                <div class="col-3 border-right pr-2 my_text_clr">
                    <span class="h1 "><i class="fa fa-user offset-4"></i></span>
                    
                </div>
                <div class="col-7">
                    <p class="h3 my_text_clr text-center mt-2"> 
                        <?php echo $row['cust_name'] ?>
                    <!-- <span class="float-right my_text_clr" style="color:#F1F6F9">₹ <?php //echo $row['expence_amount'] ?></span> -->

                    </p>
                    <p class=" my_text_clr" style="font-size: 14px;"> 
                        
                    <!-- <span class="float-right my_text_clr" style="font-size: 12px;" >Expence On <?php //echo $row['paid_date'] ?></span> -->

                    </p>
                </div>
                <div class="col-2 pr-2 border-left my_text_clr">
                    <p class="mt-2 h3">
                        <a href="./view_customer_expences_details.php?cust_id=<?php echo $row['cust_id'] ?>" class="my_text_clr  text-center float-center" >
                            
                            <i class="fa a fa-pencil-square-o text-dark"></i>
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
</body>
</html>