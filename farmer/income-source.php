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

        <?php
        $incomes = "SELECT * FROM `income_source` WHERE crop_id={$_POST['crop_id']}";
        $incomes = mysqli_query($conn, $incomes);

        $crop = "SELECT * FROM `crops` WHERE crop_id={$_POST['crop_id']}";
        $crop = mysqli_query($conn, $crop);
        $crop = mysqli_fetch_assoc($crop);

        ?>
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
                </header>
                <!-- start: page -->
                <div class="row">
                    <div class="col">
                        <section class="card">
                            <header class="card-header">
                                <h2 class="card-title">Income For Cultivation</h2>
                            </header>
                            <div class="card-body">
                                <table style="text-align:left" class="table" border=1>
                                    <tr>
                                        <td>Crop Start Date</td>
                                        <td><?php echo $crop['crop_start']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Crop End Date</td>
                                        <td><?php echo $crop['crop_end']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Land Area in acers</td>
                                        <td><?php echo $crop['crop_acers']; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Crop Type</td>
                                        <td><?php echo $crop['crop_type']; ?></td>
                                    </tr>
                                </table>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label class="control-label pt-2" for="inputDefault">Income Source<span class="required">*</span></label>
                                        <div class="col-lg">
                                            <select name="" id="income_source" class="form-control">
                                                <option value="Bank Loan">Bank Loan</option>
                                                <option value="Gov Subsides">Gov Subsides</option>
                                                <option value="Rents">Land Rents</option>
                                                <option value="Other">Other</option>
                                            </select>
                                            <div id="name_err" style="color:red"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="control-label pt-2" for="inputDefault">Income Amount<span class="required">*</span></label>
                                        <div class="col-lg">
                                            <input type="text" class="form-control" id="income_amt" value=''>
                                            <div id="name_err" style="color:red"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="control-label pt-2" for="inputDefault">Date<span class="required">*</span></label>
                                        <div class="col-lg">
                                            <input type="date" class="form-control" id='date'>
                                            <div id="name_err" style="color:red"></div>
                                        </div>
                                    </div>

                                </div>


                                <hr>
                                <div class="form-group row">
                                    <div class="col-lg" style="text-align:center">
                                        <button class='btn btn-primary' id='add' style='width:20%;' onclick='add();'>Sell</button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">

                                <table class="table table-bordered table-striped mb-0" id="datatable-default">
                                    <thead>
                                        <th>Income Source</th>
                                        <th>Income Date</th>
                                        <th>Income Amount</th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sum = 0;
                                        while ($income = mysqli_fetch_assoc($incomes)) {
                                        ?>
                                            <tr>
                                                <td><?php $sum = $sum + $income['income_amt'];
                                                    echo $income['income_source']; ?></td>
                                                <td><?php echo $income['income_date']; ?></td>
                                                <td><?php echo $income['income_amt']; ?></td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td colspan="2" style="text-align: right;">Total Amount</td>
                                            <td><?php echo "$sum"; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
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
    <script>
        function add() {
            var income_source = $('#income_source').val();
            var income_amt = $('#income_amt').val();
            var date = $('#date').val();

            $.ajax({
                url: 'queries/crop.php',
                type: 'post',
                dataType: 'text',
                data: {
                    income_source :income_source,
                    income_amt :income_amt,
                    date :date,
                    crop_id: '<?php echo $_POST['crop_id']; ?>',
                    income_add: '',

                },
                success: function(data) {
                    alert(data);
                    window.location = "crop-view.php";
                }
            });
        }
    </script>
</body>

</html>