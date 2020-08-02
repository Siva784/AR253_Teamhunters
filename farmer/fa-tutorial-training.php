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
	<style>
/* Style the element that is used to open and close the accordion class */
p.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    text-align: left;
    border: none;
    outline: none;
    transition: 0.4s;
    margin-bottom:10px;
}

/* Add a background color to the accordion if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
p.accordion.active, p.accordion:hover {
    background-color: #ddd;
}

/* Unicode character for "plus" sign (+) */
p.accordion:after {
    content: '\2795'; 
    font-size: 13px;
    color: #777;
    float: right;
    margin-left: 5px;
}

/* Unicode character for "minus" sign (-) */
p.accordion.active:after {
    content: "\2796"; 
}

/* Style the element that is used for the panel class */

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: 0.4s ease-in-out;
    opacity: 0;
    margin-bottom:10px;
}

div.panel.show {
    opacity: 1;
    max-height: 500px; /* Whatever you like, as long as its more than the height of the content (on all screen sizes) */
}
</style>

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
					<h2>Farmer Tutorial Training</h2>
				</header>

				<!-- start: page -->
				<div class="row">
					<div class="col">
						<section class="card">
							
							<div class="card-body">
							<h3>Tutorial Training</h3>

<p class="accordion">1. How to Add crop?</p>
<div class="panel">Just after your  login you will find dashboard with your name on right side.On left sidebar you will find an option" crop".
 click on that Then two options will be seen 1. Addcrop 2.view crop.
If you want to add your crop details in our website  then Click on " Add crop"
As you click on add crop you will get a form. kindly enter the details like Start date,end data,field address,Area in acres and
Type of gute. After you are done just Click add crop button. Then it open' view crop' window.

   In  that " view crop" you will find the details that you have entered previously in "Add crop". you can cross Check them.
</div>

<p class="accordion">2.How to add investments ?</p>
<div class="panel">Just behind the crop details in " view crop" you will find "Add investements" option . Click on that. 
Then you find your Crop details in box present at the top. Below that you will find dropdown containing the details on
which farmer invests his money. Select the investment reason, enter the amount spend and fill the data.
After you confirm the details Click "Add investement". The invertements are stored and displayed in the box below.
<br>
   In the some manner fill all the investments that you made on crop.Every time you fill the details you will get an
alert box.Just click ok.After all investements are added you will find the sum of all investements at the end of the box in
Total investment amount column
</div>

<p class="accordion">3.How to add income Source?</p>
<div class="panel">After you are done adding  the investements go to view crop.select "Add Income Source".In that also you will find a box with
 crop details same as in "add investment ".

    Below the table you will find a drop down of income Sources like govt subsidy,land rent and other Sort of income for farmers.
From dropdown select the correct option and the income amount and Select the respective date. Click "add".So that the data will be
added to database
   DO it accordingly for the income sources and after the completion of adding you will find all the entered details in
box below and sum of all incomes will be summed up and shown in last column of the box as  "Total Amount".</div>

<p class="accordion">4.How to add sell crop Details?</p>
<div class="panel">After adding data in "Add Income Source",just go back to "View Crop".In that yoy will find "Sell Crop" option.
 
 Below the crop details.you will find a text field for entering jute quantity in Kgs.On the right side,you can see
the list of jute mills with "Minimum Selling Price" of that mill.From that  farmer can select the mill which
provides him with good price for the crop.A farmer can sell his crop to even multiple mills.After farmer decides the mill,
enter the total amount i.e selling price in the text box provided. 
</div>
<p class="accordion">5.How to use Reports?</p>
<div class="panel">.On the left sidebar you will find another option named "Income Reports".By clicking on that you will find two options.They are
1.Crop Report  2.Report by Dates

     By selecting "crop Report" farmer will get the reports for his jute crop.From that reports farmer will
know whether he will get profit or loss.   

    By clicking on "Reports by Date" you will get the reports of crops in that particular time period.So based on that a farmer 
can check whether that time is suitable for cultivation or not.</div>

<p class="accordion">5.Training ?</p>
<div class="panel">In training we are going to have the tutorials that will help the farmers to get high yield.We are also having the live sessions
that will help farmers to interact with higher officials and to get rid of their doubts.We even have the accesability for farmer to
change the language </div>



							</div>
						</section>
					</div>
				</div>
				<!-- end: page -->
			</section>
		</div>
	</section>

	<!-- Vendor -->
	<script>
document.addEventListener("DOMContentLoaded", function(event) { 


var acc = document.getElementsByClassName("accordion");
var panel = document.getElementsByClassName('panel');

for (var i = 0; i < acc.length; i++) {
    acc[i].onclick = function() {
        var setClasses = !this.classList.contains('active');
        setClass(acc, 'active', 'remove');
        setClass(panel, 'show', 'remove');

        if (setClasses) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
}

function setClass(els, className, fnName) {
    for (var i = 0; i < els.length; i++) {
        els[i].classList[fnName](className);
    }
}

});
</script>

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
			var data = {
				crop_id: id,
				del_crop: ''
			};

			if (confirm("Confirm to Approve")) {
				$.ajax({
					url: 'queries/crop.php',
					type: 'post',
					dataType: 'text',
					data: data,

					success: function(data) {
						alert(data);
						window.location = "crop-view.php";
					}
				});
			}
		}
	</script>
</body>

</html>