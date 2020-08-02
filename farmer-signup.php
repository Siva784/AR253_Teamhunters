<!DOCTYPE HTML>
<html>
<?php
include_once('header.php');
include 'queries/connect.php';
?>
<?php
$msg = "";
if (isset($_POST['far_register'])) {
	$ad_no = $_POST['faadharno'];
	$fname = $_POST['fname'];
	$fstate = $_POST['fstate'];
	$fvillage = $_POST['fvname'];
	$faddress = $_POST['faddress'];
	$phnum = $_POST['phnum'];
	$fpassword = $_POST['fpassword'];
	$filename = $_FILES['file']['name'];
	$location = "uploads/farmer/" . $filename;

	move_uploaded_file($_FILES['file']['tmp_name'], $location);

	$query = "INSERT INTO `farmers`(`far_name`, `far_phnum`, `far_passwd`, `far_adhaar`, `far_state`, `far_village`, `far_address`,document) VALUES ('$fname','$phnum','$fpassword','$ad_no','$fstate','$fvillage','$faddress','$filename')";
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
							<h3>Farmer Signup Form</h3>
							<div>
								<div>
									<div class="col-md-6 col-md-push animate-box">

										<h3>SIGN UP</h3>
										<form action="farmer-signup.php" method='post' enctype="multipart/form-data">
											<div class="row form-group">
												<div class="col-md-12">
													<label for="faadharno">Aadhar Number</label>
													<input type="text" id="faadharno" name="faadharno" class="form-control" placeholder="Aadhar Number">
												</div>
											</div>
											<div class="row form-group">
												<div class="col-md-12">
													<label for="lname">Name</label>
													<input type="text" id="fname" name="fname" class="form-control" placeholder="Your name">
												</div>
											</div>

											<div class="row form-group">
												<div class="col-md-12">
													<label for="fstate">State</label>
													<select id="fstate" name="fstate" class="from-control" placeholder="state">
														<option value="Andhra pradesh">Andhra pradesh</option>
														<option value="Telangana">Telangana</option>
														<option value="Kerala">Kerala</option>
														<option value="Tamil Nadu">Tamil Nadu</option>
														<option value="West Bengal">West Bengal</option>
													</select>

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
												<label for="fvname">Village Name</label>
												<input type="text" id="fvname" name="fvname" class="form-control" placeholder="Your village name">
											</div>
										</div>

										<div class="row form-group">
											<div class="col-md-12">
												<label for="faddress">Address</label>

												<input type="text" id="faddress" name="faddress" class="form-control" placeholder="Address">

											</div>
										</div>
										<div class="row form-group">
											<div class="col-md-12">
												<label for="username">Phone Number</label>
												<input type="text" id="phnum" name="phnum" class="form-control" placeholder="Phone number">
											</div>
										</div>




										<div class="row form-group">
											<div class="col-md-12">
												<label for="fpassword">Password</label>
												<input type="password" id="fpassword" name="fpassword" class="form-control" placeholder="Enter password">
											</div>
										</div>



										<div class="form-group">
											<input type="submit" value="SIGN UP" class="btn btn-primary" name='far_register'>
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

						<script>
							function far_register() {
								var ad_no = $('#faadharno').val();
								var fname = $('#fname').val();
								var fstate = $('#fstate').val();
								var fvillage = $('#fvname').val();
								var faddress = $('#faddress').val();
								var phnum = $('#phnum').val();
								var fpassword = $('#fpassword').val();

								$.ajax({
									url: 'queries/farmer.php',
									data: 'text',
									type: 'POST',
									data: {
										ad_no: faadharno,
										fname: fname,
										fstate: fstate,
										fvillage: fvname,
										faddress: faddress,
										phnum: phnum,
										fpassword: fpassword,
									},
									success: function(data) {
										alert(data);
										window.location = 'falogin.php';
									}

								});
							}
						</script>

</body>

</html>