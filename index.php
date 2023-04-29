<!DOCTYPE html>
<html lang="en">
<?php include './dbconn.php';
    session_start();
	?>
<head>
	<title>SplitNow</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Travello template project">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
	<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
	<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
	<link rel="stylesheet" type="text/css" href="styles/main_styles.css">
	<link rel="stylesheet" type="text/css" href="styles/responsive.css">
	<link rel="stylesheet" type="text/css" href="styles/styles.css">
	<style>
		.testimonial-h1 {
			font-size: 16px;
			text-align: center;
			margin-bottom: 40px;
		}

		.testimonial-quote {
			font-size: 16px;
		}

		.testimonial-quote blockquote {
			/* Negate theme styles */
			border: 0;
			margin: 0;
			padding: 0;
			background: none;
			color: gray;
			font-family: Georgia, serif;
			font-size: 1.5em;
			font-style: italic;
			line-height: 1.4 !important;
			margin: 0;
			position: relative;
			text-shadow: 0 1px white;
			z-index: 600;
		}

		.testimonial-quote blockquote * {
			box-sizing: border-box;
		}

		.testimonial-quote blockquote p {
			color: #75808a;
			line-height: 1.4 !important;
		}

		.testimonial-quote blockquote p:first-child:before {
			content: '\201C';
			color: #81bedb;
			font-size: 7.5em;
			font-weight: 700;
			opacity: .3;
			position: absolute;
			top: -.4em;
			left: -.2em;
			text-shadow: none;
			z-index: -300;
		}

		.testimonial-quote img {
			border: 3px solid #9CC1D3;
			border-radius: 50%;
			display: block;
			width: 120px;
			height: 120px;
			position: absolute;
			top: -.2em;
			left: 0;
		}

		.testimonial-quote cite {
			color: gray;
			display: block;
			font-size: .8em;
		}

		.testimonial-quote cite span {
			color: #5e5e5e;
			font-size: 1em;
			font-style: normal;
			font-weight: 700;
			letter-spacing: 1px;
			text-transform: uppercase;
			text-shadow: 0 1px white;
		}

		.testimonial-quote {
			position: relative;
		}

		.testimonial-quote .quote-container {
			padding-left: 160px;
		}

		.testimonial-quote.right .quote-container {
			padding-left: 0;
			padding-right: 160px;
		}

		.testimonial-quote.right img {
			left: auto;
			right: 0;
		}

		.testimonial-quote.right cite {
			text-align: right;
		}

		.black {
			color: black !important;
		}

		* {
			box-sizing: border-box;
		}

		img {
			vertical-align: middle;
		}

		/* Position the image container (needed to position the left and right arrows) */
		.container {
			position: relative;
		}

		/* Hide the images by default */
		.mySlides {
			display: none;
		}

		/* Add a pointer when hovering over the thumbnail images */
		.cursor {
			cursor: pointer;
		}

		/* Next & previous buttons */
		.prev,
		.next {
			cursor: pointer;
			position: absolute;
			top: 40%;
			width: auto;
			padding: 16px;
			margin-top: -50px;
			color: white;
			font-weight: bold;
			font-size: 20px;
			border-radius: 0 3px 3px 0;
			user-select: none;
			-webkit-user-select: none;
		}

		/* Position the "next button" to the right */
		.next {
			right: 0;
			border-radius: 3px 0 0 3px;
		}

		/* On hover, add a black background color with a little bit see-through */
		.prev:hover,
		.next:hover {
			background-color: rgba(0, 0, 0, 0.8);
		}

		/* Number text (1/3 etc) */
		.numbertext {
			color: #f2f2f2;
			font-size: 12px;
			padding: 8px 12px;
			position: absolute;
			top: 0;
		}

		/* Container for image text */
		.caption-container {
			text-align: center;
			background-color: #222;
			padding: 2px 16px;
			color: white;
		}

		.row:after {
			content: "";
			display: table;
			clear: both;
		}

		/* Six columns side by side */
		.column {
			float: left;
			width: 16.66%;
		}

		/* Add a transparency effect for thumnbail images */
		.demo {
			opacity: 0.6;
		}

		.active,
		.demo:hover {
			opacity: 1;
		}

		html {
			scroll-behavior: smooth;
		}
	</style>
</head>

<body>
	<div class="super_container">
		<!-- Header -->
		<header class="header">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start">
							<div class="header_content_inner d-flex flex-row align-items-end justify-content-start">
								<div class="logo"><a href="index.php" style="color: black;">		
								<!-- <img src="./images/MSONS-LOGO.png" alt="" srcset="" width="120px"> -->
								SplitNow
										</a></div>
								<!-- menu for pc, laptop, desktop screen -->
								<nav class="main_nav">
									<ul class="d-flex flex-row align-items-start justify-content-start">
										<li class="text-dark active" id="home_li"><a onclick="active('home')"
												href="#home" style="color: #fff;">Home</a>
										</li>
										
										<!-- <li><a href="#">Services</a></li> -->
										<li id="product_li" class=""><a href="#product" onclick="active('product')"
												style="color: #fff;">Signup</a></li>
										<li id="testimonials2_li" class=""><a href="#testimonials2"
												onclick="active('testimonials2')" style="color: #fff;">Login</a>
										</li>
										<li id="contact_li" class=""><a href="#contact" onclick="active('contact')"
												style="color: #fff;">Contact</a></li>
									</ul>
								</nav>
								<!-- <div class="header_phone ml-auto" style="color: #fff;">Call us: 8073807591</div> -->

								<!-- Hamburger -->

								<div class="hamburger ml-auto">
									<i class="fa fa-bars" aria-hidden="true"></i>
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header_social d-flex flex-row align-items-center justify-content-start">
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</header>

		<!-- Menu for mobile devices-->
		<div class="menu">
			<div class="menu_header d-flex flex-row align-items-center justify-content-start">
				<div class="menu_logo"><a href="index.php"></a></div>
				<div class="menu_close_container ml-auto">
					<div class="menu_close">
						<div></div>
						<div></div>
					</div>
				</div>
			</div>
			<div class="menu_content">
				<ul>
					<li><a href="#home">Home</a></li>
					

					<li><a href="#product">Signup</a></li>
					<li><a href="#testimonials2">Login</a></li>

					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
			<div class="menu_social">
				<!-- <div class="menu_phone ml-auto">Call us: 8073807591</div> -->
				<ul class="d-flex flex-row align-items-start justify-content-start">
					<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
				</ul>
			</div>
		</div>

		<!-- Home -->

		<div class="home" id="home">

			<!-- Home Slider #home-->
			<div class="home_slider_container">
				<div class="owl-carousel owl-theme home_slider">
					<!-- Slide -->
					<div class="owl-item">
						<div class="background_image" style="background-image:url(images/cover6.jpg)"></div>
						<div class="home_slider_content_container">
							<div class="container">
								<div class="row">
									<div class="col">
										<div class="home_slider_content">
											<div class="home_title">
												<h2 style="color: black; text-shadow:5px 5px 5px white">Money is a reward for solving problems.</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Slide -->
					<!-- <div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<div class="home_title"><h2>Let us take you away</h2></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

					<!-- Slide -->
					<!-- <div class="owl-item">
					<div class="background_image" style="background-image:url(images/home_slider.jpg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content">
										<div class="home_title"><h2>Let us take you away</h2></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				</div>

			</div>
		</div>
		
		<!-- Login -->
		<div id="testimonials2" style="background-color: #eff0ef;">
			<div class="col-md-9"
				style=" margin: 0 auto; padding-top: 80px; padding-bottom: 80px;background-color: #eff0ef;">
				<h1 style="text-align: center;margin-bottom: 40px;margin-top: -40px;">Login</h1>
				<div class="container col-6">
						<form action="" method="post">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" required placeholder="sam@gmail.com**">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" name="password" required placeholder="*****">
							</div>
							<div class="form-group">
								<button class="btn btn-dark" name="login">Login</button>
							</div>
						</form>
						<?php 
    if(isset($_POST['login'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
      
       
            $qry="select * from user WHERE u_email='$email'
                    AND u_password='$password' AND user_type='customer'";
            $exc=mysqli_query($conn,$qry);
            $count=mysqli_affected_rows($conn);
            if($count == 1){
                $_SESSION['email']=$email;
                
                echo "<script>
                location='./user/profile.php'</script>";
            }
            else{
                echo "<script>alert('Email/Password wrong.')
                location=location</script>";
            }
        }

        
 ?>
					</div>

				<hr style="margin: 60px auto; opacity: .5;">
			</div>
		</div>
		<!-- Register -->
		<div id="product" style="background-color: #eff0ef;">
			<div class="col-md-9"
				style=" margin: 0 auto; padding-top: 80px; padding-bottom: 80px;background-color: #eff0ef;">
				<h1 style="text-align: center;margin-bottom: 40px;margin-top: -40px;">Signup</h1>
				
					<div class="container col-6">
						<form action="" method="post">
							
							<div class="form-group">
								<label for="">Name</label>
								<input type="text" class="form-control" name="name" required placeholder="Your name">
							</div>
							<div class="form-group">
								<label for="">Mobile</label>
								<input type="number" class="form-control" name="mobile" required placeholder="80738075**">
							</div>
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email" required placeholder="sam@gmail.com**">
							</div>
							<div class="form-group">
								<button class="btn btn-dark" name="signup">Signup</button>
							</div>
						</form>
						<?php 
							if(isset($_POST['signup'])){
								$name=$_POST['name'];
								$email=$_POST['email'];
								$mobile=$_POST['mobile'];
								$password=rand(1000,9999);
								
								$qry="select * from user where u_email='$email' or u_phone='$mobile'";
								$exc=mysqli_query($conn,$qry);
								$count=mysqli_num_rows($exc);
								if ($count == 0){
									$reg_qry="INSERT INTO `user`(`u_name`, `u_email`, `u_phone`, `u_password`,`user_type`) VALUES('$name','$email','$mobile','$password','customer')";
									$reg_exc=mysqli_query($conn,$reg_qry);
									if($reg_exc){
										echo "<script>alert('Successfully Registered.Your Password sent to your Email ID')
										location=location</script>";
									}
									else{
										echo "error";
									}
									// echo "register";
								}
								else{
									echo "<script>alert('Alredy Registered.')
										location=location</script>";
								}



							}
						?>
					</div>
				<hr style="margin: 60px auto; opacity: .5;">
			</div>
		</div>
		<!-- Footer -->
		<footer class="footer" id="contact">
			<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/cover2.jpg"
				data-speed="0.8"></div>
			<div class="container">
				<div class="row footer_contact_row">
					<div class="col-xl-10 offset-xl-1">
						<div class="row">

							<!-- Footer Contact Item -->
							<div class="col-xl-4 footer_contact_col">
								<div
									class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
									<div class="footer_contact_icon"><img src="images/road-sign.png" alt=""></div>
									<div class="footer_contact_title black">give us a call</div>
									<div class="footer_contact_list">
										<ul>
											<!-- <li>Office Landline: +44 5567 32 664 567</li> -->
											<li class="black">Mobile: +91 8073807591</li>
										</ul>
									</div>
								</div>
							</div>

							<!-- Footer Contact Item -->
							<div class="col-xl-4 footer_contact_col">
								<div
									class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
									<div class="footer_contact_icon"><img src="images/package.png" alt=""></div>
									<div class="footer_contact_title black">come & drop by</div>
									<div class="footer_contact_list">
										<ul style="max-width:190px">
											<li class="black">No.215,1<sup>st</sup> satge,1<sup>st</sup>phase</li>
											<li class="black">West of Chord road Rajai Nagar,Banglore</li>
										</ul>
									</div>
								</div>
							</div>

							<!-- Footer Contact Item -->
							<div class="col-xl-4 footer_contact_col">
								<div
									class="footer_contact_item d-flex flex-column align-items-center justify-content-start text-center">
									<div class="footer_contact_icon"><img src="images/airplane-around-earth.png" alt="">
									</div>
									<div class="footer_contact_title black">send us a message</div>
									<div class="footer_contact_list">
										<ul>
											<!-- <li>youremail@gmail.com</li> -->
											<li class="black">kasalkar16@gmail.com</li>
										</ul>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
			<div class="col text-center pb-4" style="color: black;">
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				Copyright &copy;
				<script>document.write(new Date().getFullYear());</script> All rights reserved
				<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
			</div>
		</footer>
	</div>

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="styles/bootstrap4/popper.js"></script>
	<script src="styles/bootstrap4/bootstrap.min.js"></script>
	<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
	<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
	<script src="plugins/scrollTo/jquery.scrollTo.min.js"></script>
	<script src="plugins/easing/easing.js"></script>
	<script src="plugins/parallax-js-master/parallax.min.js"></script>

	<script src="js/custom.js"></script>
	<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
			showSlides(slideIndex += n);
		}

		function currentSlide(n) {
			showSlides(slideIndex = n);
		}

		function showSlides(n) {
			var i;
			var slides = document.getElementsByClassName("mySlides");
			var dots = document.getElementsByClassName("demo");
			var captionText = document.getElementById("caption");
			if (n > slides.length) { slideIndex = 1 }
			if (n < 1) { slideIndex = slides.length }
			for (i = 0; i < slides.length; i++) {
				slides[i].style.display = "none";
			}
			for (i = 0; i < dots.length; i++) {
				dots[i].className = dots[i].className.replace(" active", "");
			}
			slides[slideIndex - 1].style.display = "block";
			dots[slideIndex - 1].className += " active";
			captionText.innerHTML = dots[slideIndex - 1].alt;
		}

		function active(val) {
			switch (val) {
				case "home":
					document.getElementById('home').classList.add("active");
					$("#home_li").addClass("active");
					$("#about_li").removeClass("active");
					$("#product_li").removeClass("active");
					$("#contact_li").removeClass("active");
					$("#testimonials2_li").removeClass("active");
					break;
				case "about":
					document.getElementById('about').classList.add("active");
					$("#home_li").removeClass("active");
					$("#about_li").addClass("active");
					$("#product_li").removeClass("active");
					$("#contact_li").removeClass("active");
					$("#testimonials2_li").removeClass("active");
					break;
				case "product":
					document.getElementById('product').classList.add("active");
					$("#home_li").removeClass("active");
					$("#about_li").removeClass("active");
					$("#product_li").addClass("active");
					$("#contact_li").removeClass("active");
					$("#testimonials2_li").removeClass("active");
					break;
				case "contact":
					document.getElementById('contact').classList.add("active");
					$("#home_li").removeClass("active");
					$("#about_li").removeClass("active");
					$("#product_li").removeClass("active");
					$("#contact_li").addClass("active");
					$("#testimonials2_li").removeClass("active");
					break;
				case "testimonials2":
					document.getElementById('contact').classList.add("active");
					$("#home_li").removeClass("active");
					$("#about_li").removeClass("active");
					$("#product_li").removeClass("active");
					$("#contact_li").removeClass("active");
					$("#testimonials2_li").addClass("active");
					break;
			}
		}
	</script>
</body>

</html>