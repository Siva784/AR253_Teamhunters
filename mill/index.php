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
					<h2>Dashboard</h2>
				</header>
				<!-- start: page -->
				<div class="row">
					<div class="col-xl-6">
						<section class="card">
							<div class="card-body">
								<header class="card-header card-header-transparent">
									<h2 class="card-title">Details</h2>
								</header>
								<?php
								$query1 = "SELECT * from faculty where fac_id=" . $_SESSION['fac_id'];
								$query1 = mysqli_query($conn, $query1);
								$row1 = mysqli_fetch_assoc($query1);
								?>

								<div class="form-group row">
									<label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Name</label>
									<div class='col-lg-8'>
										<h5 style="color:black;"><b><?php echo $row1['fac_name']; ?></b></h5>
									</div>
									<label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Mail</label>
									<div class='col-lg-8'>
										<h5 style="color:black;"><b><?php echo $row1['fac_mail']; ?></b></h5>
									</div>
									<label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Role</label>
									<div class='col-lg-8'>
										<h5 style="color:black;"><b><?php if ($row1['fac_role'] == 0) echo 'Dean';
																	else if ($row1['fac_role'] == 1) echo 'H.O.D';
																	else if ($row1['fac_role'] == 2) echo 'Teacher';
																	?></b></h5>
									</div>
									<label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Designation</label>
									<div class='col-lg-8'>
										<h5 style="color:black;"><b><?php echo $row1['fac_designation']; ?></b></h5>
									</div>
									<label class="col-lg-4 control-label text-lg-right pt-2" for="inputDefault">Department</label>
									<div class='col-lg-8'>
										<h5 style="color:black;"><b><?php
																	$query2 = "SELECT * from department where dept_id=" . $row1['dept_id'];
																	$query2 = mysqli_query($conn, $query2);
																	$row2 = mysqli_fetch_assoc($query2);
																	echo $row2['dept_name'];
																	?></b></h5>
									</div>
								</div>
							</div>
						</section>
						<section class="card">
							<div class="card-body">
								<header class="card-header card-header-transparent">
									<h2 class="card-title">Department Faculty</h2>
								</header>
								<table class="table table-responsive-md table-striped mb-0">
									<?php
									$query = "SELECT dept_id from faculty where fac_id=" . $_SESSION['fac_id'];
									$query = mysqli_query($conn, $query);
									$row1 = mysqli_fetch_assoc($query);
									$fac = "SELECT fac_id,fac_name,fac_mail,fac_phnum from faculty where dept_id=" . $row1['dept_id'] . " GROUP BY RAND() LIMIT 6";
									$fac = mysqli_query($conn, $fac);
									if (mysqli_num_rows($fac) > 0) {
										?>
										<thead>
											<tr>
												<th>Name</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($row = mysqli_fetch_assoc($fac)) {
												?>
												<tr>
													<td>
														<a target="_blank" href="../fac_details.php?fac_id=<?php echo $row['fac_id']; ?>">
															<?php echo $row['fac_name']; ?>
														</a>
													</td>
													<td><?php echo $row['fac_mail']; ?></td>
												</tr>
											<?php } ?>
											<tr>
												<td colspan="2" style="text-align:center"><a href="../faculty.php#<?php echo $row1['dept_id']; ?>" target="_blank">View All</a></td>
											</tr>
										</tbody>
									<?php } else echo "No Records Found"; ?>
								</table>
							</div>
						</section>


					</div>
					<div class="col-xl-6">
						<section class="card">
							<div class="card-body">
								<header class="card-header card-header-transparent">
									<h2 class="card-title">Publications</h2>
								</header>
								<table class="table table-responsive-md table-striped mb-0">
									<?php
									$query = "SELECT dept_id,dept_name from department";
									$query = mysqli_query($conn, $query);
									if (mysqli_num_rows($query) > 0) {
										?>
										<thead>
											<tr>
												<th>Department</th>
												<th> Count </th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($row = mysqli_fetch_assoc($query)) {
												?>
												<tr>
													<td>
														<a target="_blank" href="../departments.php?dept_id=<?php echo $row['dept_id']; ?>">
															<?php echo $row['dept_name']; ?>
														</a>
													</td>
													<?php
													$pub_cnt = "SELECT COUNT(pub_id) as cnt from publication";
													$pub_cnt = mysqli_query($conn, $pub_cnt);
													$pub_cnt = mysqli_fetch_assoc($pub_cnt);
													$pub = "SELECT DISTINCT pub_mapping.pub_id from pub_mapping,faculty WHERE faculty.dept_id=" . $row['dept_id'] . " and faculty.fac_id=pub_mapping.fac_id";
													$pub = mysqli_query($conn, $pub);
													$pub_num = mysqli_num_rows($pub);
													?>
													<td>
														<?php
														echo $pub_num;
														?>
													</td>
												</tr>
											<?php } ?>
										</tbody>
									<?php } else echo "No Record Found"; ?>
								</table>
							</div>
						</section>
						<section class="card">
							<div class="card-body">
								<header class="card-header card-header-transparent">
									<h2 class="card-title">Recent Events</h2>
								</header>
								<table class="table table-responsive-md table-striped mb-0">
									<?php
									$query = "SELECT event_id,event_title,event_from_date,event_to_date from events where event_level_status=2 order by event_from_date DESC";
									// echo $query;
									$query = mysqli_query($conn, $query);
									if (mysqli_num_rows($query) > 0) {
										?>
										<thead>
											<tr>
												<th>Event</th>
												<th>From Date</th>
												<th>To Date</th>
											</tr>
										</thead>
										<tbody>
											<?php
											while ($row = mysqli_fetch_assoc($query)) {
												?>
												<tr>
													<td>
														<a target="_blank" href="../event_details.php?event_id=<?php echo $row['event_id']; ?>">
															<?php echo urldecode($row['event_title']); ?>
														</a>
													</td>
													<td>
														<?php
														echo urldecode($row['event_from_date']);
														?>
													</td>
													<td>
														<?php
														echo $row['event_to_date'];
														?>
													</td>
												</tr>
											<?php }
											?>
										</tbody>
									<?php } else echo "No Record Found"; ?>
								</table>
							</div>
						</section>
					</div>
				</div>
				<div class="row">


				</div>
				<div class='row'>
					<div class="col-xl">
						<section class="card">
							<div class="card-body">
								<?php
								if ($_SESSION['fac_role'] == 0 || $_SESSION['fac_role'] == 3) {
									?>
									<header class="card-header card-header-transparent">
										<h2 class="card-title">Most Recent Publications</h2>
									</header>
									<table class="table table-responsive-md table-striped mb-0">
										<tbody>
											<?php
											$pub_id = "SELECT pub_id FROM publication ORDER by publication.pub_year DESC limit 5";
											$pub_id = mysqli_query($conn, $pub_id);
											$p = mysqli_num_rows($pub_id);
											while ($row = mysqli_fetch_assoc($pub_id)) {
												$pub_q = "SELECT * from publication where pub_id=" . $row['pub_id'];
												$pub_q = mysqli_query($conn, $pub_q);
												$result = mysqli_fetch_assoc($pub_q);
												?>
												<tr>
													<td> <?php echo urldecode($result['pub_author'] . ' (' . $result['pub_year'] . ') , ' . $result['pub_title'] . ' ,<b> ' . $result['pub_type_name'] . '</b>, ' . $result['pub_publisher'] . ',' . $result['pub_volume'] . ',' . $result['pub_number'] . "," . $result['pub_pages']);
															if (!empty($result['pub_impact'])) {
																echo ', (' . $result['pub_impact'] . ').';
															} else {
																echo '.';
															} ?> </td>
												</tr>
											<?php } ?>
											<?php
											if ($p == 0) {
												echo "No Records Found";
											}
											?>
										</tbody>
									</table>
								<?php
								} else {
									?>
									<header class="card-header card-header-transparent">
										<h2 class="card-title">Most Recent Publications</h2>
									</header>
									<table class="table table-responsive-md table-striped mb-0">
										<tbody>
											<?php
											$pub_id = "SELECT pub_id FROM publication ORDER by publication.pub_year DESC limit 5";
											$pub_id = mysqli_query($conn, $pub_id);
											$p = mysqli_num_rows($pub_id);
											while ($row = mysqli_fetch_assoc($pub_id)) {
												$pub_q = "SELECT * from publication where pub_id=" . $row['pub_id'];
												$pub_q = mysqli_query($conn, $pub_q);
												$result = mysqli_fetch_assoc($pub_q);
												?>
												<tr>
													<td> <?php echo $result['pub_author'] . ' (' . $result['pub_year'] . ') , ' . $result['pub_title'] . ' ,<b> ' . $result['pub_type_name'] . '</b>, ' . $result['pub_publisher'] . ',' . $result['pub_volume'] . ',' . $result['pub_number'] . "," . $result['pub_pages'];
															if (!empty($result['pub_impact'])) {
																echo ', (' . $result['pub_impact'] . ').';
															} else {
																echo '.';
															} ?> </td>
												</tr>
											<?php } ?>
											<?php
											if ($p == 0) {
												echo "No Records Found";
											}
											?>
										</tbody>
									</table>
								<?php } ?>
							</div>
						</section>
					</div>
				</div>

				<!-- end: page -->
			</section>
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
	<script src="vendor/jqvmap/jquery.vmap.js"></script>
	<script src="vendor/jqvmap/data/jquery.vmap.sampledata.js"></script>
	<script src="vendor/jqvmap/maps/jquery.vmap.world.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.africa.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.asia.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.australia.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.europe.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.north-america.js"></script>
	<script src="vendor/jqvmap/maps/continents/jquery.vmap.south-america.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>

</body>

</html>