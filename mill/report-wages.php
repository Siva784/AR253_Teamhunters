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
                    <h2>Reports</h2>
                </header>
                <!-- start: page -->
                <div class="row">
                    <div class="col-lg">
                        <section class="card">

                            <header class="card-header">
                                <h2 class="card-title">Wages Report</h2>
                            </header>
                            <div class="card-body">
                                <form action="report-wages.php" method="post">
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
                        $wages = "SELECT w.date,m.name,m.phnum,m.type,m.joining_date,w.amt FROM `worker_wages` w,mill_workers m WHERE date BETWEEN '$sdate' AND '$edate' && m.mill_id = w.mill_id && m.worker_id = w.worker_id && m.mill_id = {$_SESSION['mill_id']}";
                            $wages = mysqli_query($conn, $wages);

                        ?>
                            <section class="card">

                                <header class="card-header">
                                    <h2 class="card-title">Wages Details</h2>
                                </header>



                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped mb-0" id="datatable-tabletools" id="datatable-details">
                                            <thead>
                                                <th>Wage Pay Date</th>
                                                <th>Worker Name</th>
                                                <th>Worker Mobile</th>
                                                <th>Type</th>
                                                <th>Joining Date</th>
                                                <th>Amount(Rs.)</th>
                                            </thead>
                                            <tbody>
                                                <?php
                                                while ($wage = mysqli_fetch_assoc($wages)) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $wage['date'] ?></td>
                                                        <td><?php echo $wage['name']; ?></td>
                                                        <td><?php echo $wage['phnum']; ?></td>
                                                        <td><?php echo $wage['type']; ?></td>
                                                        <td><?php echo $wage['joining_date']; ?></td>
                                                        <td><?php echo $wage['amt']; ?></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- end: page -->
                            </section>
                           
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