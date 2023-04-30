<?php
session_start();
    if(!isset($_SESSION['email'])){
        echo "<script>window.location='../index.php'</script>";
    }
    include "../dbconn.php";
    $email=$_SESSION['email'];
    $qry="select * from user where u_email='$email'";
    $exc=mysqli_query($conn,$qry);
    while($row=mysqli_fetch_array($exc)){
      $user_id=$row['u_id'];
      $user_name=$row['u_name'];

    }
   

?>


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<!-- icon -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">







<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #394867;">
  <a class="navbar-brand font-weight-bold  text-white display-1" href="student_home.php"> <span class="h1">Splitwise</span> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto ml-5">
      <li class="nav-item ">
        <a class="nav-link text-light border-right" href="./index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link text-light border-right " href="./profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light border-right" href="./view_group.php">Group</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light border-right" href="./view_customer.php">Customer</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light " href="./change_password.php">Change Password</a>
      </li>
     
     
      
      
    </ul>
    <span class=" float-lg-right">
         <a class="nav-link text-white h5 font-weight-bold" href="#" tabindex="-1" >
          <i class='fas fa-user-alt' style='font-size:24px'></i>
          Welcome <?php echo $email; ?></a>
      </span>
     <span class=" float-lg-right">
         <a class="nav-link  " style="color:#F1F6F9" href="./logout.php" tabindex="-1" data-toggle="tooltip" title="Logout" ><i class='fas fa-lock' style='font-size:24px'></i></a>
      </span>
   
  </div>
</nav>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>