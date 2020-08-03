<!doctype html>
<html class="fixed">

<head>
	<?php
	include_once 'includes/head.php';

	?>


	<!-- Web Fonts  -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

	<!-- Vendor CSS -->
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="vendor/animate/animate.css">
	<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="vendor/font-awesome/css/fontawesome-all.min.css" />
	<link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.css" />
	<link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css" />

	<!-- Specific Page Vendor CSS -->
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.css" />
	<link rel="stylesheet" href="vendor/jquery-ui/jquery-ui.theme.css" />
	<link rel="stylesheet" href="vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
	<link rel="stylesheet" href="vendor/morris/morris.css" />

	<!-- Theme CSS -->
	<link rel="stylesheet" href="css/theme.css" />

	<!-- Skin CSS -->
	<link rel="stylesheet" href="css/skins/default.css" />

	<!-- Theme Custom CSS -->
	<link rel="stylesheet" href="css/custom.css">

	<!-- Head Libs -->
	<script src="vendor/modernizr/modernizr.js"></script>

</head>

<body>

	<section class="body">
		<!-- start: header -->
		<?php include_once 'includes/header.php'; ?>
		<!-- end: header -->

		<div class="inner-wrapper">
			<!-- start: sidebar -->
			<aside id="sidebar-left" class="sidebar-left">

				<div class="sidebar-header">
					<div class="sidebar-title">
						Navigation
					</div>
					<div class="sidebar-toggle d-none d-md-block" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
						<i class="fas fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>

				<?php include 'includes/nav-bar.php'; ?>

			</aside>
			<!-- end: sidebar -->

			<section role="main" class="content-body">
				<header class="page-header">
					<h2>Users Registered b/w Dates</h2>
				</header>

				<!-- start: page -->
				<div class="row">
					<div class="col">
						<section class="card">

							<div class="card-body">
								<form action="#" method="POST">
									<div class="form-group row">

										<div class="col-lg-3">
											<label class="control-label pt-2" for="inputDefault">Start Date<span class="required">*</span></label>
											<input type="date" name="startdate" class="form-control" id="start_date" value=''>
										</div>
										<div class="col-lg-3">
											<label class="control-label pt-2" for="inputDefault">End Date<span class="required">*</span></label>
											<input type="date" name="enddate" class="form-control" id="start_date" value=''>
										</div>
										<div class="col-lg-3">
											<button type="submit" name="submit" class="btn btn-primary">Get Users</button>
										</div>
									</div>
								</form>

							</div>
						</section>
					</div>
				</div>
				<!-- end: page -->
				<?php
				if (isset($_POST['submit'])) {
					$startdate = $_POST['startdate'];
					$enddate = $_POST['enddate'];
					$dataavailability = 1;

					$farquery = "SELECT  `far_name`, `far_phnum`, `far_adhaar`,  `status`, `timestamp` FROM `farmers` WHERE timestamp BETWEEN '$startdate' and '$enddate'";
					$farresult = mysqli_query($conn, $farquery);
					$millquery = "SELECT  `name`, `phnum`, `adhaar`, `status`, `timestamp` FROM `mills` WHERE  timestamp BETWEEN '$startdate' and '$enddate'";
					$millresult = mysqli_query($conn, $millquery);
					$numrows = mysqli_num_rows($farresult);
					$millnumrows = mysqli_num_rows($millresult);
				?>
					<div class="row">
						<div class="col">
							<section class="card">

								<div class="card-body">

									<table class="table table-bordered table-striped mb-0" id="datatable-default">
										<thead>
											<th>Date</th>
											<th>Name</th>
											<th>Type</th>
											<th>Mobile Number</th>
											<th>Aadhar Number</th>
											<th>Status</th>
										</thead>
										<tbody>
											<?php
												while ($row = mysqli_fetch_row($farresult)) {

												?>
													<tr>
														<td><?php echo "$row[4]" ?></td>
														<td><?php echo "$row[0]" ?></td>
														<td><?php echo "Farmer" ?></td>
														<td><?php echo "$row[1]" ?></td>
														<td><?php echo "$row[2]" ?></td>
														<td><?php if ($row[3] == 0) {
																echo "Disapproved";
															} else {
																echo "Approved";
															}
															?>

														</td>
													</tr>

											<?php
												}
											?>
											<?php
												while ($row = mysqli_fetch_row($millresult)) {

												?>
													<tr>
														<td><?php echo "$row[4]" ?></td>
														<td><?php echo "$row[0]" ?></td>
														<td><?php echo "Mill Owner" ?></td>
														<td><?php echo "$row[1]" ?></td>
														<td><?php echo "$row[2]" ?></td>
														<td><?php if ($row[3] == 0) {
																echo "Disapproved";
															} else {
																echo "Approved";
															}
															?>

														</td>
													</tr>

											<?php
												}
											?>
										</tbody>
									</table>
								</div>
							</section>
						</div>
					</div>
				<?php
				}
				?>
		</div>
	</section>


	<!-- Vendor -->
	<script src="vendor/jquery/jquery.js"></script>
	<script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
	<script src="vendor/popper/umd/popper.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.js"></script>
	<script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
	<script src="vendor/common/common.js"></script>
	<script src="vendor/nanoscroller/nanoscroller.js"></script>
	<script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="vendor/jquery-placeholder/jquery-placeholder.js"></script>

	<!-- Specific Page Vendor -->
	<script src="vendor/jquery-ui/jquery-ui.js"></script>
	<script src="vendor/jqueryui-touch-punch/jqueryui-touch-punch.js"></script>
	<script src="vendor/jquery-appear/jquery-appear.js"></script>
	<script src="vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
	<script src="vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
	<script src="vendor/flot/jquery.flot.js"></script>
	<script src="vendor/flot.tooltip/flot.tooltip.js"></script>
	<script src="vendor/flot/jquery.flot.pie.js"></script>
	<script src="vendor/flot/jquery.flot.categories.js"></script>
	<script src="vendor/flot/jquery.flot.resize.js"></script>
	<script src="vendor/jquery-sparkline/jquery-sparkline.js"></script>
	<script src="vendor/raphael/raphael.js"></script>
	<script src="vendor/morris/morris.js"></script>
	<script src="vendor/gauge/gauge.js"></script>
	<script src="vendor/snap.svg/snap.svg.js"></script>
	<script src="vendor/liquid-meter/liquid.meter.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- datatable js -->
	<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
	<script src="js/examples/examples.datatables.default.js"></script>
	<script src="js/examples/examples.datatables.row.with.details.js"></script>
	<script src="js/examples/examples.datatables.tabletools.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>
	<script>
		function del(id) {
			if (confirm("Confirm to Delete")) {
				getrequest("queries/faculty.php", "fac_id=" + id + "&del_fac=''", "fac-view.php");
				// location.reload();
			}
		}
	</script>
</body>

</html>