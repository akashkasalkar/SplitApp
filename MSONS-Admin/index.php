<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
       
</head>
<body>
    <br>
    <div class="d-flex justify-content-center">
    <div style="border: 1px solid royalblue;width:400px;height: 550px;border-radius: 5px;">
    <div >
        <div class="col-12">
            <div class="row">
                <div class="logo col-6">
                    <img class="logo_size" src="https://firebasestorage.googleapis.com/v0/b/msons-b9c76.appspot.com/o/MSONS-LOGO.png?alt=media&token=1ed1b3c8-276a-4e23-837f-466b988d9b18" 
                    style="margin-top: 22px;" alt="" srcset="" width="50%">
                </div>
                <div class="col-6">
                    <h4 class="mt-3 log-txt">ADMIN LOGIN</h4><br><br>
                </div>
                
            </div>
    </div>
    </div><br>
    <form method="post">
        <div class="container-fluid d-flex justify-content-center log-txt">

            <div style="width:300px">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email ID</label>
                    <input type="email" class="form-control" id="uname" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Password" required>
                </div>
                <button id="submitBtn" type="submit" name="login" class="btn btn-primary btn-block">Login
                    <div class="spinner-border spinner-border-sm text-dark" id="spinner" role="role" style="display:none;">
                        <span class="sr-only">Loading...</span>
                      </div>
                </button>
            </div>
        </div>
    </form>

    <?php
        include "../include/dbconn.php";
        if(isset($_POST['login'])){
            $email=$_POST['email'];
            $password=$_POST['password'];
            session_start();
            $qry="select * from admin where username='$email' AND password='$password'";
            $rs=mysqli_query($conn,$qry);
    
            $count=mysqli_num_rows($rs);
        if($count==true)
        {
             echo '<script> alert("Login In successfull... ");</script>';
            $_SESSION['username']=$_POST['username'];
            
            header("location:home.php");
             
        }
        else
        {
            echo'<script> alert("Login In Fail...please try again ");</script>';
            echo '<script>window.location="index.php" ;</script>';
        }
       

        }

    ?>

    
    
    <br> <div class="container-fluid" style="text-align: center;">
              
        <div class="alert alert-warning" id="login-w" style="display: none;">
            <strong>Warning! </strong>Username OR Password Incorect
        </div>
        <div class="alert alert-danger" id="login-d" style="display: none;">
            <strong>Danger! </strong>Something went wrong !
        </div>
    </div><br>
    <div class="container-fluid" style="text-align: center;font-size: small;margin-top: 100px;">
        <span>All copyrights are reserved</span><br>
    </div>
    
    </div>
    

</div>
<!-- <input type="text" name="" id="namebox"><br>
<img src="" id="myimg" alt="">
<label for="" id="upProgress"></label><br>

<button id="select">select</button>
<button id="upload">upload</button>
<button id="retrieve">retrieve</button> -->
    <!-- Bootstrap core JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>



<script src="js/custom.js"></script>

</body>
</html>