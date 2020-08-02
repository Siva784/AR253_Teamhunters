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
                    <h2>Crop</h2>
                    <?php
                    $crop_details = "SELECT * from crops where crop_id={$_POST['crop_id']}";
                    $crop_details = mysqli_query($conn, $crop_details);
                    $crop_details = mysqli_fetch_assoc($crop_details);

                    $crop_investment = "SELECT sum(invest_amt) as invest_amt from crop_investment where crop_id={$_POST['crop_id']}";
                    $crop_investment = mysqli_query($conn, $crop_investment);
                    $crop_investment = mysqli_fetch_assoc($crop_investment);

                    $crop_income = "SELECT sum(income_amt) as income_amt from income_source where crop_id={$_POST['crop_id']}";
                    $crop_income = mysqli_query($conn, $crop_income);
                    $crop_income = mysqli_fetch_assoc($crop_income);

                    $sell = "SELECT sum(sell_price) as sell_price from sold_mill where crop_id={$_POST['crop_id']}";
                    $sell = mysqli_query($conn, $sell);
                    $sell = mysqli_fetch_assoc($sell);
                    ?>
                </header>
                <!-- start: page -->
                <div class="row">
                    <div class="col-lg">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">Crop Reports</h2>
                            </header>
                            <div class="card-body">
                                <div class="row">
                                    <h3 style="color: black;">
                                        Crop Details</h3>
                                    <table style="text-align:left" class="table" border='1'>
                                        <tr>
                                            <td>Crop Start Date</td>
                                            <td><?php echo $crop_details['crop_start']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Crop End Date</td>
                                            <td><?php echo $crop_details['crop_end']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Land Area in acers</td>
                                            <td><?php echo $crop_details['crop_acers']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Crop Type</td>
                                            <td><?php echo $crop_details['crop_type']; ?></td>
                                        </tr>
                                    </table>

                                    <h3 style="color: black;">
                                        Crop Profit/Loss
                                    </h3>
                                    <table class="table" border=1>
                                        <?php 
                                            $sum = ($sell['sell_price']-$crop_investment['invest_amt']);                                  
                                        ?>
                                        <tbody >
                                            <tr>
                                                <td>Total Income </td>
                                                <td><?php echo $crop_income['income_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Total Investment </td>
                                                <td><?php echo $crop_investment['invest_amt']; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Crop Sold For Price </td>
                                                <td><?php echo $sell['sell_price']; ?></td>
                                            </tr>
                                            <tr style="font-size:30px;text-align: center;color:<?php if($sum>0) { echo 'green';} else{echo 'red';} ?>" colspan=2>
                                                <td colspan="2">
                                                    <?php 
                                                        if($sum >0){
                                                            echo "Profit :".$sum;
                                                        }else{
                                                            echo "Loss :".($sum*-1);
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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