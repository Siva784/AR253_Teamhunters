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
					<div class="col-lg">
						<section class="card">

							<header class="card-header">
								<h2 class="card-title">Crop Sold Details</h2>
							</header>
							<div class="card-body">
								<form action="report-date.php" method="post">
									<div class="form-row">
										<div class="col-lg-4">
											<label class="control-label pt-2" for="inputDefault">From Date<span class="required">*</span></label>
											<div class="col-lg">
												<input type="date" class="form-control" id="start_date" name="sdate" value=''>
												<div id="name_err" style="color:red"></div>
											</div>
										</div>
										<div class="col-lg-4">
											<label class="control-label pt-2" for="inputDefault">To Date<span class="required">*</span></label>
											<div class="col-lg">
												<input type="date" class="form-control" id="start_date" value='' name='edate'>
												<div id="name_err" style="color:red"></div>
											</div>
										</div>
										<div class="col-lg-4">
											<label class="control-label pt-2" for="inputDefault">Submit</label>
											<div class="col-lg">
												<input type="submit" class="btn btn-primary" value='Get Report'>
												<div id="name_err" style="color:red"></div>
											</div>
										</div>
									</div>
								</form>

							</div>
						</section>
					</div>
				</div>

				<div class="row">
					<div class="col-lg">
						<?php

						if (isset($_POST['sdate'])) {
							$sdate = $_POST['sdate'];
							$edate = $_POST['edate'];
							$crops = "SELECT * from crops where far_id = {$_SESSION['far_id']}";
							$crops = mysqli_query($conn, $crops);

						?>
							<section class="card">

								<header class="card-header">
									<h2 class="card-title">Crop Sold Details</h2>
								</header>



								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-bordered table-striped mb-0" id="datatable-tabletools" id="datatable-details">
											<thead>
												<th>CropId</th>
												<th>Crop Start</th>
												<th>Crop End</th>
												<th>Acers</th>
												<th>Total Income</th>
												<th>Total Investment</th>
												<th>Sold Price</th>
												<th>Net Profit/Loss</th>
											</thead>
											<tbody>
												<?php
												while ($crop = mysqli_fetch_assoc($crops)) {
													$crop_details = "SELECT * from crops where crop_id={$crop['crop_id']}";
													$crop_details = mysqli_query($conn, $crop_details);
													$crop_details = mysqli_fetch_assoc($crop_details);

													$crop_investment = "SELECT sum(invest_amt) as invest_amt from crop_investment where crop_id={$crop['crop_id']}";
													$crop_investment = mysqli_query($conn, $crop_investment);
													$crop_investment = mysqli_fetch_assoc($crop_investment);

													$crop_income = "SELECT sum(income_amt) as income_amt from income_source where crop_id={$crop['crop_id']}";
													$crop_income = mysqli_query($conn, $crop_income);
													$crop_income = mysqli_fetch_assoc($crop_income);

													$sell = "SELECT sum(sell_price) as sell_price from sold_mill where crop_id={$crop['crop_id']}";
													$sell = mysqli_query($conn, $sell);
													$sell = mysqli_fetch_assoc($sell);

													$sum = $sell['sell_price'] - $crop_investment['invest_amt'];
													$color = "";
													if ($sum > 0) {
														$color = 'green';
													} else {
														$sum = $sum * -1;
														$color = 'red';
													}
												?>
													<tr>
														<td><?php echo $crop['crop_id'] ?></td>
														<td><?php echo $crop['crop_start']; ?></td>
														<td><?php echo $crop['crop_end']; ?></td>
														<td><?php echo $crop['crop_acers']; ?></td>
														<td><?php echo $crop_income['income_amt']; ?></td>
														<td><?php echo $crop_investment['invest_amt']; ?></td>
														<td><?php echo $sell['sell_price']; ?></td>
														<td style="color: <?php echo $color; ?>;"><?php echo $sum; ?></td>

													</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- end: page -->
							</section>
							<br>
							<div class="row ">
								<div class="col-lg-6">
									<section class="card">
										<header class="card-header">

											<h2 class="card-title">Amount Spent for Investments</h2>
											<p class="card-subtitle"></p>
										</header>
										<div class="card-body">

											<!-- Flot: Pie -->
											<div class="chart chart-md" id="flotPie"></div>
											<?php
											$invest_re = "SELECT invest_reason,sum(invest_amt) as amt FROM `crop_investment` WHERE farmer_id=8 group by invest_reason";
											$invest_re = mysqli_query($conn, $invest_re);

											?>
											<script type="text/javascript">
												var flotPieData = [
													<?php
													$x = 0;
													$color = array("#0088cc", "#2baab1", "#734ba9", "#E36159", "blue");
													while ($q1 = mysqli_fetch_assoc($invest_re)) {
													?> {
															label: "<?php echo $q1['invest_reason'] . "(" . $q1['amt'] . ")";; ?>",
															data: [
																[<?php echo $x; ?>, <?php echo $q1['amt']; ?>]
															],
															color: '<?php echo $color[$x++]; ?>'
														},
													<?php } ?>
												];

												// See: js/examples/examples.charts.js for more settings.
											</script>

										</div>
									</section>
								</div>

								<div class="col-lg-6">
									<section class="card">
										<header class="card-header">
											<div class="card-actions">
												<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
												<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
											</div>

											<h2 class="card-title">Investments and Profits</h2>
											<p class="card-subtitle"></p>
										</header>
										<div class="card-body">

											<div class="chart chart-md" id="morrisArea"></div>
											<script type="text/javascript">
												var morrisAreaData = [
													<?php
													$crop_g = "SELECT * from crops where far_id = {$_SESSION['far_id']}";
													$crop_g = mysqli_query($conn, $crop_g);
													while ($c = mysqli_fetch_assoc($crop_g)) {
														$i = "select sum(invest_amt) as amt from crop_investment where crop_id={$c['crop_id']}";
														$i = mysqli_query($conn, $i);
														$i = mysqli_fetch_assoc($i);

														$se = "SELECT sum(sell_price) as amt from sold_mill where crop_id = {$c['crop_id']}";
														$se = mysqli_query($conn, $se);
														$se = mysqli_fetch_assoc($se);
													?> {
															y: "<?php echo $c['crop_start'] . " to " . $c['crop_end'];  ?>",
															a: <?php echo $i['amt']; ?>,
															b: <?php echo $se['amt'] - $i['amt']; ?>
														},
													<?php } ?>

												];

												// See: js/examples/examples.charts.js for more settings.
											</script>

										</div>
									</section>
								</div>
							</div>
						<?php
						}
						?>
					</div>
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

	<script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
	<script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>
	<script src="js/examples/examples.datatables.default.js"></script>
	<script src="js/examples/examples.datatables.row.with.details.js"></script>
	<script src="js/examples/examples.datatables.tabletools.js"></script>

	<!-- Theme Base, Components and Settings -->
	<script src="js/theme.js"></script>

	<!-- Theme Custom -->
	<script src="js/custom.js"></script>

	<!-- Theme Initialization Files -->
	<script src="js/theme.init.js"></script>

	<!-- Examples -->
	<script src="js/examples/examples.dashboard.js"></script>
	<script src="js/examples/examples.charts.js"></script>


</body>

</html>