<!DOCTYPE html>
<html>
<head>
	<title>customer expences</title>
    <style>
        body {
    position: relative;
  }
        .my_text_clr{
            color:394867;
        }
    </style>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body style="background-color:#9BA4B5" data-spy="scroll" data-target="#myScrollspy" data-offset="1">
	<?php include "navbar.php"; ?>
   <?php 
    if(!isset($_GET['cust_id'])){
        echo "<script>location='./view_customer.php'</script>";
    }
    $cust_id=$_GET['cust_id'];
    $cust_name="";
      $qry="select * from customer c where c.cust_id='$cust_id'

            ";
                $exc=mysqli_query($conn,$qry);
                while($row=mysqli_fetch_array($exc)){
                     $cust_name=$row['cust_name'];
                }
   ?>
           <!-- //modal you gave -->
           <div class="modal fade" id="you_gave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You Gave <?php echo $cust_name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">
                     
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
                            <button name="gave_btn" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>

            </div>
            <?php 
                if(isset($_POST['gave_btn'])){
                    $expence_type="Gave";
                    $expence_amount=$_POST['expence_amount'];
                    $expence_date=$_POST['expence_date'];
                    $expence_title=$_POST['expence_title'];


                    $qry="INSERT INTO `customer_expence`( `fk_cust_id`, `expence_type`, `expence_amount`, `expence_date`,`fk_user_id`,`expence_title`) VALUES('$cust_id','$expence_type','$expence_amount','$expence_date','$user_id','$expence_title')";
                    if(mysqli_query($conn,$qry)){
                        echo "<script>location=location</script>";
                    }

                }
            ?>
            <!-- modal end you gave -->
             <!-- //modal you got -->
           <div class="modal fade" id="you_got" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
            <div class="modal-dialog" role="document" >
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">You Got from <?php echo $cust_name ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post">
                     
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
                            <button name="got_btn" class="btn btn-dark">Save</button>
                        </div>
                    </form>
                </div>
              
                </div>
            </div>

            </div>
            <?php 
                if(isset($_POST['got_btn'])){
                    $expence_type="Got";
                    $expence_amount=$_POST['expence_amount'];
                    $expence_date=$_POST['expence_date'];
                    $expence_title=$_POST['expence_title'];
                    $qry="INSERT INTO `customer_expence`( `fk_cust_id`, `expence_type`, `expence_amount`, `expence_date`,`fk_user_id`,`expence_title`) VALUES('$cust_id','$expence_type','$expence_amount','$expence_date','$user_id','$expence_title')";
                    if(mysqli_query($conn,$qry)){
                        echo "<script>location=location</script>";
                    }

                }
            ?>
            <!-- modal end you got -->
	<div class="container mt-5">
        <!-- <a href="./view_group.php" class="btn btn-outline-light">Back</a> -->
		<p class="h3  text-danger"></p>
		<div class="col-8 col-lg-6 offset-3 border border-light ">
            <div >
                <p class="h2 text-center my_text_clr" > <?php echo $cust_name ?>'s  Expences  </p>

                <?php
                $calculate_total_gave_amt=$calculate_total_got_amt=0;
                    $calculate_total_gave_qry="select *,SUM(expence_amount) as total_amount from customer_expence 
                    where fk_cust_id='$cust_id' 
                    and fk_user_id='$user_id'
                    and expence_type='Gave'
                    group by (fk_user_id)";
                    $calculate_total_gave_exc=mysqli_query($conn,$calculate_total_gave_qry);
                    while($calculate_total_gave_row=mysqli_fetch_array($calculate_total_gave_exc)){
                         $calculate_total_gave_amt= $calculate_total_gave_row['total_amount'];
                    }

                    $calculate_total_got_qry="select *,SUM(expence_amount) as total_amount from customer_expence 
                    where fk_cust_id='$cust_id' 
                    and fk_user_id='$user_id'
                    and expence_type='Got'
                    group by (fk_user_id)";
                    $calculate_total_got_exc=mysqli_query($conn,$calculate_total_got_qry);
                    while($calculate_total_got_row=mysqli_fetch_array($calculate_total_got_exc)){
                         $calculate_total_got_amt= $calculate_total_got_row['total_amount'];
                    }
                    
                    if($calculate_total_gave_amt > $calculate_total_got_amt)
                    {
                        ?>
                      <p class="h5 text-center  border-top mt-2 p-2 ">You will get  <span class="text-danger">
                      ₹<?php echo $calculate_total_gave_amt-$calculate_total_got_amt  ?>
                      </span>  </p>

                        <?php
                    }
                    elseif($calculate_total_gave_amt < $calculate_total_got_amt)
                    {
                        ?>
                      <p class="h5 text-center  border-top mt-2 p-2 ">You will give  <span class="text-success">
                      ₹<?php echo $calculate_total_got_amt - $calculate_total_gave_amt ?>
                      </span>  </p>

                        <?php
                    }
                    else{
                        ?>
                         <p class="h5 text-center  border-top mt-2 p-2 ">Settled Up </p>
                        <?php
                    }

                ?>
            <hr class="border border-light">
            <div  data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example" style="height:300px; overflow-y:auto">

               <?php
                $cust_exp_qry="select * from customer_expence where fk_cust_id='$cust_id' and fk_user_id='$user_id'";
                $cust_exp_exc=mysqli_query($conn,$cust_exp_qry);
                while($cust_exp_row=mysqli_fetch_array($cust_exp_exc)){
                     $cust_exp_row['expence_type'];
                
              
                    if($cust_exp_row['expence_type'] =='Gave'){
                        ?>
                    <div class="border p-3">
                        <p class="h2"><?php echo $cust_exp_row['expence_title'] ?> <span class="float-right text-danger h3">₹ <?php echo $cust_exp_row['expence_amount'] ?></span></p>
                        <p style="font-size: 12px;">Transaction date : <?php echo $cust_exp_row['expence_date'] ?></p>
                    </div>
                        <?php
                    }
                    elseif($cust_exp_row['expence_type'] =='Got'){
                        ?>
                        <div class="border p-3">
                        <p class="h2"><?php echo $cust_exp_row['expence_title'] ?> <span class="float-right text-success h3">₹ <?php echo $cust_exp_row['expence_amount'] ?></span></p>
                        <p style="font-size: 12px;">Transaction date : <?php echo $cust_exp_row['expence_date'] ?></p>
                    </div>
                        <?php
                    }
                           }           ?>
                           
            </div>
                    
                    <div class="row mt-5">
                        <div class="col-6">
                            <a href="" class="btn btn-danger form-control"  data-toggle="modal" data-target="#you_gave">You Gave</a>
                        </div>
                        <div class="col-6">
                            <a href="" class="btn btn-success form-control" data-toggle="modal" data-target="#you_got">You Got</a>
                           

                        </div>

                    </div>
                    </p>
               

            </div>

            
     
			
           
                
               
               
            </div>
           
            </div>
            
     
		</div>
	</div>
    <script>
        $('body').scrollspy({ target: '#navbar-example' })
    </script>
</body>
</html>