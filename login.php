<!DOCTYPE HTML>
<html>
	<?php
include_once('header.php');
?>
	<body>
		
	<div class="colorlib-loader"></div>
	
	<div id="page">
	
		   					
<div id="colorlib-contact">
		<div class="container">
			<div class="row">
			<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="colorlib-contact-info">
						
						
							Don't Have a Account<a href='signup.php'> REGISTER HERE. </a>
							
						
					</div>

				</div>
				
				<div class="col-md-6 animate-box">
					<h3>LOGIN</h3>
					<form action="logincheck.php" method='post'>
						 <div class="row form-group">
							<div class="col-md-12">
								
								<input type="tel" id="username" class="form-control" placeholder="Enter your 12 digit Aadhar Number" pattern="[0-9]{12}">
							</div>
						</div>
                        <div class="row form-group">
							<div class="col-md-12">
								
								<input type="date" id="password" class="form-control" placeholder="Date of Birth">
							</div>
						</div>
						

						
						<div class="form-group">
							<input type="submit" value="LOGIN" class="btn btn-primary">
						</div>

					</form>		
				</div>
			</div>
			
		</div>
	</div>
		   				

	
	
	
	<?php include "footer.php"; ?>

	
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	
	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- countTo -->
	<script src="js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Google Map -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
	<script src="js/google_map.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	</body>
</html>

