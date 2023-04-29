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
                <p class="h2 text-center my_text_clr" ><?php echo $g_name ?> Balances 
                    </p>
               

            </div>
            <hr class="border border-light">


           
            <div class="">
                <a href="./manage_group.php?g_id=<?php echo $g_id ?>" class="btn btn-sm btn-dark">Expences</a>
                <!-- <a href="" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#add_participants">Overview</a> -->
                <!-- <a href="whatsapp://send?text=Join Group on SplitNow, id=<?php echo $g_userid ?> and password=<?php echo $g_password ?>" data-action="share/whatsapp/share" class="btn btn-sm btn-dark">Share</a> -->

           
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
</body>
</html>