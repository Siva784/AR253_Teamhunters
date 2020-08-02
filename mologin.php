<!DOCTYPE HTML>
<html>
<?php
include_once('header.php');
include './queries/connect.php';
?>

<?php
if (isset($_POST['phnum']) && isset($_POST['passwd'])) {
	$check = "SELECT * from `mills` where phnum='{$_POST['phnum']}' && status=1";
	// echo $check;
	$check = mysqli_query($conn, $check);
	$login_row = mysqli_fetch_assoc($check);
	if ($_POST['phnum'] == $login_row['phnum'] && $_POST['passwd'] == $login_row['passwd']) {
		session_start();
		$_SESSION['mill_id'] = $login_row['mill_id'];
		header('Location: mill/index.php');
	}
}
?>

<body>

	<div class="colorlib-loader"></div>

	<div id="page">


		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-push-1 animate-box">

						<div class="colorlib-contact-info">


							Don't Have a Account<a href='mo-signup.php'> REGISTER HERE. </a>


						</div>

					</div>

					<div class="col-md-6 animate-box">
						<h3>Mill Owner Login Form</h3>
						<form action="mologin.php" method='post'>
							<div class="row form-group">
								<div class="col-md-12">

									<input type="tel" id="phnum" class="form-control" placeholder="Enter your Phone Number" pattern="[0-9]{10}" name="phnum">
								</div>
							</div>

							<div class="row form-group">
								<div class="col-md-12">

									<input type="password" id="passwd" class="form-control" placeholder="Enter password" name="passwd">
								</div>




								<div class="form-group">
									<input type="submit" value="LOGIN" name="submit" class="btn btn-primary">
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
		<script src="js/main.js"></script>

</body>

</html>