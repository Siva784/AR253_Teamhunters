<div class="nano">
	<div class="nano-content">
		<nav id="menu" class="nav-main" role="navigation">

			<ul class="nav nav-main">
				<li>
					<a class="nav-link" href="index.php">
						<i class="fa fa-home" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li>
					<a class="nav-link" href="purchased_jute.php">
						<i class="fa fa-home" aria-hidden="true"></i>
						<span>Purchased Jute</span>
					</a>
				</li>

				<li class="nav-parent">
					<a class="nav-link" href="#">
						<i class="fas fa-certificate" aria-hidden="true"></i>
						<span>Mill Workers</span>
					</a>
					<ul class="nav nav-children">
						<li>
							<a class="nav-link" href="worker-add.php">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Add Mill Workers
							</a>
						</li>
						<li>
							<a class="nav-link" href="workers-view.php">
								<i class="fa fa-plus" aria-hidden="true"></i>
								View Mill Workers
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-parent">
					<a class="nav-link" href="#">
						<i class="fas fa-calculator" aria-hidden="true"></i>
						<span>Reports</span>
					</a>
					<ul class="nav nav-children">
						<li>
							<a class="nav-link" href="report-wages.php">
								<i class="fa fa-calculator" aria-hidden="true"></i>
								Wages Report
							</a>
						</li>
						<li>
							<a class="nav-link" href="report-date.php">
								<i class="fa fa-calendar" aria-hidden="true"></i>
								Report By Dates
							</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="nav-link" href="<?php echo $_SERVER['PHP_SELF'] . "?lo"; ?>">
						<i class="fa fa-power-off" aria-hidden="true"></i>
						<span>LogOut</span>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</div>