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
					<h2>Mill Reports</h2>
				</header>
				<!-- start: page -->
				<div class="row">
					<div class="col-lg">
						<section class="card">

							<header class="card-header">
								<h2 class="card-title">Reports by date</h2>
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
												<input type="button" class="btn btn-primary" value='Get Report' onclick="show()">
												<div id="name_err" style="color:red"></div>
											</div>
										</div>
									</div>
								</form>

							</div>
						</section>
					</div>
				</div>
				<br>
				<div id="report">

					<div class="row">
						<div class="col-lg-6">
							<!--	<h4 class="mb-0 mt-2">Circular Charts</h4>
							<p class="mb-3">Easy pie chart is a jQuery plugin that uses the canvas element to render simple pie charts for single values.</p>
						-->
							<div class="row">
								<div class="col-md-12">
									<section class="card">
										<header class="card-header">
											<div class="card-actions">
												<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
												<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
											</div>

											<h2 class="card-title">Current Status</h2>
											<p class="card-subtitle"></p>
										</header>
										<div class="card-body">
											<div class="row text-center">
												<div class="col-lg-6">
													<div class="circular-bar">
														<div class="circular-bar-chart" data-percent="73" data-plugin-options='{ "barColor": "#0088CC", "delay": 300 }'>
															<strong>Jute Purchased</strong>
															<label><span class="percent">63</span>%</label>
														</div>
													</div>
												</div>
												<div class="col-lg-6">
													<div class="circular-bar">
														<div class="circular-bar-chart" data-percent="27" data-plugin-options='{ "barColor": "#2BAAB1", "delay": 600 }'>
															<strong>Jute Remained</strong>
															<label><span class="percent">37</span>%</label>
														</div>
													</div>
												</div>
											</div>
										</div>
									</section>
								</div>
							</div>
						</div>

						<div class="col-lg-6">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Production of Jute Goods</h2>
									<p class="card-subtitle"></p>
								</header>
								<div class="card-body">

									<!-- Flot: Pie -->
									<div class="chart chart-md" id="flotPie"></div>
									<script type="text/javascript">
										var flotPieData = [{
											label: "Hessian",
											data: [
												[1, 60]
											],
											color: '#0088cc'
										}, {
											label: "Sacking",
											data: [
												[1, 10]
											],
											color: '#2baab1'
										}, {
											label: "Yarn & Twine",
											data: [
												[1, 15]
											],
											color: '#734ba9'
										}, {
											label: "Canvas & Tarpaulin",
											data: [
												[1, 15]
											],
											color: '#E36159'
										}];

										// See: js/examples/examples.charts.js for more settings.
									</script>

								</div>
							</section>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Revenue in Years</h2>
									<p class="card-subtitle">Year-wise Revenue generation based on type of Jute.</p>
								</header>
								<div class="card-body">

									<!-- Morris: Bar -->
									<div class="chart chart-md" id="morrisBar"></div>
									<script type="text/javascript">
										var morrisBarData = [{
											y: '2010',
											a: 10,
											b: 30
										}, {
											y: '2011',
											a: 100,
											b: 25
										}, {
											y: '2012',
											a: 60,
											b: 25
										}, {
											y: '2013',
											a: 75,
											b: 35
										}, {
											y: '2014',
											a: 90,
											b: 20
										}, {
											y: '2015',
											a: 75,
											b: 15
										}, {
											y: '2016',
											a: 50,
											b: 10
										}, {
											y: '2017',
											a: 75,
											b: 25
										}, {
											y: '2018',
											a: 30,
											b: 10
										}, {
											y: '2019',
											a: 75,
											b: 5
										}, {
											y: '2020',
											a: 60,
											b: 8
										}];

										// See: js/examples/examples.charts.js for more settings.
									</script>

								</div>
							</section>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-6">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Workers Count</h2>
									<p class="card-subtitle">Total Workers count in particular financial year.</p>
								</header>
								<div class="card-body">

									<!-- Flot: Bars -->
									<div class="chart chart-md" id="flotBars"></div>
									<script type="text/javascript">
										var flotBarsData = [
											["2011", 22],
											["2012", 20],
											["2013", 25],
											["2014", 23],
											["2015", 37],
											["2016", 36],
											["2017", 38],
											["2018", 54],
											["2019", 40],
											["2020", 50],
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

									<h2 class="card-title">Present Workers Chart</h2>
									<p class="card-subtitle">This chart classifies based on types of workers. </p>
								</header>
								<div class="card-body">

									<!-- Morris: Donut -->
									<div class="chart chart-md" id="morrisDonut"></div>
									<script type="text/javascript">
										var morrisDonutData = [{
											label: "Permanent Workers",
											value: 30
										}, {
											label: "Casual Workers",
											value: 10
										}, {
											label: "Temporary Workers",
											value: 20
										}];

										// See: js/examples/examples.charts.js for more settings.
									</script>

								</div>
							</section>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-6">
							<section class="card">
								<header class="card-header">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>

									<h2 class="card-title">Profits</h2>
									<p class="card-subtitle">Year-wise Profit analysis graph.</p>
								</header>
								<div class="card-body">

									<!-- Morris: Line -->
									<div class="chart chart-md" id="morrisLine"></div>
									<script type="text/javascript">
										var morrisLineData = [{
											y: '2012',
											a: 60,
											b: 50
										}, {
											y: '2013',
											a: 70,
											b: 55
										}, {
											y: '2014',
											a: 75,
											b: 58
										}, {
											y: '2015',
											a: 79,
											b: 60
										}, {
											y: '2016',
											a: 83,
											b: 61
										}, {
											y: '2017',
											a: 86,
											b: 63
										}, {
											y: '2018',
											a: 87,
											b: 65
										}, {
											y: '2019',
											a: 90,
											b: 67
										}, {
											y: '2020',
											a: 93,
											b: 69
										}];

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

									<h2 class="card-title">Expenditure vs Income</h2>
									<p class="card-subtitle"></p>
								</header>
								<div class="card-body">

									<!-- Morris: Area -->
									<div class="chart chart-md" id="morrisArea"></div>
									<script type="text/javascript">
										var morrisAreaData = [{
											y: '2011',
											a: 100,
											b: 300
										}, {
											y: '2012',
											a: 150,
											b: 220
										}, {
											y: '2013',
											a: 150,
											b: 295
										}, {
											y: '2014',
											a: 150,
											b: 310
										}, {
											y: '2015',
											a: 180,
											b: 350
										}, {
											y: '2016',
											a: 195,
											b: 360
										}, {
											y: '2017',
											a: 180,
											b: 340
										}, {
											y: '2018',
											a: 100,
											b: 338
										}, {
											y: '2019',
											a: 120,
											b: 345
										}, {
											y: '2020',
											a: 230,
											b: 350
										}];

										// See: js/examples/examples.charts.js for more settings.
									</script>

								</div>
							</section>
						</div>
					</div>

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
	<script>
		$('#report').hide();

		function show() {
			$('#report').hide();
			setTimeout(function() {
				$('#report').show();
			}, 2000);

		}
	</script>

</body>

</html>