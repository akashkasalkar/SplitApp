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

           
                <div class="row">
                    
                            <table class="table table-stripped mt-2 ">
                            <?php
                            $all_user_total=0;
                            $no_of_user=0;
                          $qry="select * from user u,s_group sg,manage_group mg
                            where u.u_id=mg.fk_user_id
                            and mg.fk_group_id=sg.g_id
                            AND mg.fk_group_id='$g_id'
                         ";
                        $exc=mysqli_query($conn,$qry);
                        $count=mysqli_affected_rows($conn);
                        // echo $count;
                        for ($i=1;$i<=2;$i++){
                            while($row=mysqli_fetch_array($exc)){
                                $u_id=$row['u_id'];
                                $no_of_user=$no_of_user+1;
                               $total_exp_qry="select * ,SUM(mge.expence_amount) as user_total from manage_group_expences mge,user u
                              WHERE u.u_id=mge.paid_by 
                              AND mge.paid_by='$u_id'
                              AND mge.fk_group_id='$g_id'
                            ";
                               $total_exp_exc=mysqli_query($conn,$total_exp_qry);
                               while($total_exp_row=mysqli_fetch_array($total_exp_exc)){
                                    $particular_user_total=$total_exp_row['user_total'];
                               }
                                 $all_user_total=$particular_user_total+$all_user_total;
                           
                                 $split_value=$all_user_total/$count;
                            }
                        }
                            ?>
                            <?php 
                           
                                 $qry="select *,SUM(mge.expence_amount) as total_expence_amount  from manage_group_expences mge,user u
                                WHERE u.u_id=mge.paid_by 
                                AND mge.fk_group_id='$g_id'
                                group by (mge.paid_by)
                                
                             ";
                            $exc=mysqli_query($conn,$qry);
                            while($row=mysqli_fetch_array($exc)){
                                $final_amount= $row['total_expence_amount']-$split_value;
                            ?>
                              <tr>
                                <th class="text-center"><?php 
                                echo $row['u_name'];
                                if($row['u_id']==$user_id){
                                    echo " (You)";
                                }
                                ?> </th>
                                <td><?php 
                                    if($final_amount < 0){
                                        echo "<span class='text-danger h6'>".$final_amount."</span>";
                                        ?>
                                        <a href="" class="btn btn-sm btn-dark ml-3">Settle</a>
                                        <?php
                                    }
                                    else{
                                        echo "<p class='text-success h6'>".$final_amount."</p>";

                                    }
                                ?></td>
                              </tr>
                            <?php } ?>
                          
                            </table>


                           
                </div>
             </div>
		</div>
	</div>
</body>
</html>