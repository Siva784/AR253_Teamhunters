<!DOCTYPE HTML>
<html>
<?php
include_once('header.php');
include './queries/connect.php';
?>

<?php
$msg = "";
if (isset($_POST['mill_register'])) {
	$ad_no = $_POST['maadhar'];
	$mname = $_POST['mname'];
	$mstate = $_POST['state'];
	$district = $_POST['district'];
	$millname = $_POST['millname'];
	$phnum = $_POST['mphnum'];
	$mpassword = $_POST['mpassword'];
	$filename = $_FILES['file']['name'];
	$location = "uploads/mill/" . $filename;

	move_uploaded_file($_FILES['file']['tmp_name'], $location);



	$query = "INSERT INTO `mills`(`name`, `phnum`, mill_name, `passwd`, `adhaar`, `state`, `district`,document) VALUES ('$mname','$phnum','$millname','$mpassword','$ad_no','$mstate','$district','$filename')";
	// echo $query;
	$q = mysqli_query($conn, $query);
	if ($q) {
		$msg = "Farmer Registered";
	} else {
		$msg = "Farmer Not Registered";
	}
}
?>

<body>

	<div class="colorlib-loader"></div>

	<div id="page">


		<div id="colorlib-contact">
			<div class="container">
				<div class="row">
					<div class="row">
						<div style="text-align: center;color:black;font-size:30px">
							<?php
							echo "$msg";
							?>
						</div>
						<div class="col-md-12 animate-box">
							<h3>Mill Owners Signup Form</h3>
							<div>
								<div>
									<div class="col-md-6 animate-box">

										<form action="mo-signup.php" method='post' enctype="multipart/form-data">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="maadhar">Aadhar Number </label>
													<input type="text" id="maadhar" class="form-control" placeholder="Your Aadhar Number" name="maadhar" required>
												</div>

											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="mname">Name </label>
													<input type="text" id="mname" class="form-control" placeholder="Your Name" name="mname">
												</div>

											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="mphn">Phone Number</label>
													<input type="text" id="mphnum" class="form-control" placeholder="Your firstname" name="mphnum">
												</div>

											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="fstate">Document</label>
													<input type="file" name='file' id='file'>

												</div>
											</div>


									</div>

									<div class="col-md-6 animate-box">


										<div class="row form-group">
											<div class="col-md-12">
												<label for="millname">Mill Name</label>
												<input type="text" id="millname" name='millname' class="form-control" placeholder="Mill Name">
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<label for="millname">Password</label>
												<input type="text" id="mpassword" name='mpassword' class="form-control" placeholder="Password">
											</div>
										</div>
										<h3>Mill Location</h3>
										<div class="row form-group">

											<div class="col-md-6">
												<label for="state">State </label>
												<select name="state" id="states">
													<option value="ap">Andhra Pradesh</option>
													<option value="tn">Telangana</option>
													<option value="mp">Madhya Pradesh</option>
													<option value="kerala">Kerala</option>
													<option value="tamil">Tamilnadu</option>
												</select>
											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<label for="district">District </label>
												<select name="district" id="district">
													<option value="wg">West Godavari</option>
													<option value="eg">East Godavari</option>
													<option value="gn">Guntur</option>
													<option value="vzng">Vizayanagaram</option>

												</select>
											</div>
										</div>




										<div class="form-group">
											<input type="submit" value="SIGN UP" name="mill_register" class="btn btn-primary">
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