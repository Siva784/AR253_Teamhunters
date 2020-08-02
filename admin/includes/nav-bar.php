<div class="nano">
	<div class="nano-content">
		<nav id="menu" class="nav-main" role="navigation">

			<ul class="nav nav-main">
				<li>
					<a class="nav-link" href="dashboard.php">
						<i class="fa fa-home" aria-hidden="true"></i>
						<span>Dashboard</span>
					</a>
				</li>

				<li class="nav-parent">
					<a class="nav-link" href="#">
						<i class="fas fa-certificate" aria-hidden="true"></i>
						<span>Approvals</span>
					</a>
					<ul class="nav nav-children">
						<li>
							<a class="nav-link" href="farmers_approvals.php">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Farmer Approvals
							</a>
						</li>
						<li>
							<a class="nav-link" href="mill_approvals.php">
								<i class="fa fa-plus" aria-hidden="true"></i>
								Mill Owner Approvals
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