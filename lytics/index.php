
<!DOCTYPE html>
<html lang="en">
<head>

	<title>Lytics - Analytics for All</title>
	<meta charset="utf-8">
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/plans.css">
	<link rel="stylesheet" type="text/css" href="css/clients.css">

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

</head>
<body>

	<section class="billboard">

		<?php include("header.html") ?>

		<section class="caption">
			<p class="cap_title">Analytics for All</p>
		</section>
	</section><!-- Billboard End -->

	<section class="services">
		<div class="wrapper">
			<div class="S_icons">
				<div class="icon-div monitor">
				</div>
				<hr class="sp"/>
				<div class="icon-div burn">
				</div>
				<hr class="sp"/>
				<div class="icon-div locked">
				</div>
			</div>
			<ul class="desc">
				<li>
					<h3>Data-Driven</h3>
					<p>Our service conglomerates data to provide valuable insight into user workflow.</p>
				</li>
				<li>
					<h3>Design-Focused</h3>
					<p>Our innovative heat-map algorithm lets you view how users interact with your site.</p>
				</li>
				<li>
					<h3>Security-Oriented</h3>
					<p>All data collected by our system is backed up and stored on secure servers.</p>
				</li>
			</ul>
		</div>
	</section><!-- services End -->

	<section class="call_to_action">
		<div class="wrapper">
			<img src="img/tesla-heatmap.png" alt="" title="">
			<section class="cta_desc">
				<h3>We make good websites great.</h3>
				<p style = "font-size: 20px">
					Unlike other analytics platforms, Lytics consolidates all your data in a single, easy to understand dashboard. Our system lets you track
					and store all your data using one service with the lowest monthly fee of any analytics system, <b>saving you money while increase your website revenue by an average of 20%</b>.
				</p>
				<!--
				<p style = "font-size: 25px">After 3 months of using our product, our clients averaged a 20% increase in website revenue. Don't leave money on the table.</p>
				-->
				<a href="sign_up.php" class="cta_btn">Sign Up Today</a>
			</section>
		</div>
	</section><!-- call_to_action End -->

	<section class="client_testimonials">
		<div class="wrapper">
			<h3>Some of our clients</h3>
			<table id="client_images">
				<tr>
					<td><img src = "img/google.png" title = "" atl = ""/></td>
					<td><img src = "img/robinhood.png" title = "" atl = ""/></td>
					<td><img src = "img/airbnb.png" title = "" atl = ""/></td>
					<td><img src = "img/kayak.png" title = "" atl = ""/></td>
				</tr>
				<tr>
					<td><img src = "img/tesla.png" title = "" atl = ""/></td>
					<td><img src = "img/uber.png" title = "" atl = ""/></td>
					<td><img src = "img/hp.png" title = "" atl = ""/></td>
					<td><img src = "img/microsoft.png" title = "" atl = ""/></td>
				</tr>
			</table>

		</div>
	</section><!-- testimonials End -->

	<!-- begin pricing plans -->
	<section id="pricing_plans">
		<h2 id="pricing_plan_title">Our Pricing Plans</h2>
		<div class="cd-pricing-container cd-has-margins">

			<ul class="cd-pricing-list">
				<li>
					<span class="cd-pricing-header">
						<h2>Basic</h2>

						<div class="cd-price">
							<span class="cd-currency">$</span>
							<span class="cd-value">30</span>
							<span class="cd-duration">mo</span>
						</div>
					</span> <!-- .cd-pricing-header -->

					<div class="cd-pricing-body">
						<ul class="cd-pricing-features">
							<li><em>10,000 users</em> Data cap</li>
							<li><em>3 months</em> Data storage lifetime</li>
							<li><em>1</em> Heatmap</li>
							<li><em>0</em> Funnel Chart</li>
							<li><em>24/7</em> Support</li>
						</ul>
					</div> <!-- .cd-pricing-body -->

					<footer class="cd-pricing-footer">
						<a class="cd-select" href="sign_up.php?plan=plan_basic">Select</a>
					</footer> <!-- .cd-pricing-footer -->
				</li>
				<li class="cd-popular">
					<span class="cd-pricing-header">
						<h2>Popular</h2>

						<div class="cd-price">
							<span class="cd-currency">$</span>
							<span class="cd-value">60</span>
							<span class="cd-duration">mo</span>
						</div>
					</span> <!-- .cd-pricing-header -->

					<div class="cd-pricing-body">
						<ul class="cd-pricing-features">
							<li><em>100,000 users</em> Data cap</li>
							<li><em>6 months</em> Data storage lifetime</li>
							<li><em>5</em> Heatmaps</li>
							<li><em>3</em> Funnel Charts</li>
							<li><em>24/7</em> Support</li>
						</ul>
					</div> <!-- .cd-pricing-body -->

					<footer class="cd-pricing-footer">
						<a class="cd-select" href="sign_up.php?plan=plan_popular">Select</a>
					</footer> <!-- .cd-pricing-footer -->
				</li>
				<li>
					<span class="cd-pricing-header">
						<h2>Premier</h2>

						<div class="cd-price">
							<span class="cd-currency">$</span>
							<span class="cd-value">90</span>
							<span class="cd-duration">mo</span>
						</div>
					</span> <!-- .cd-pricing-header -->

					<div class="cd-pricing-body">
						<ul class="cd-pricing-features">
							<li><em>Unlimited</em> Data</li>
							<li><em>Unlimited</em> Data storage lifetime</li>
							<li><em>10</em> Heatmaps</li>
							<li><em>10</em> Funnel Charts</li>
							<li><em>24/7</em> Support</li>
						</ul>
					</div> <!-- .cd-pricing-body -->

					<footer class="cd-pricing-footer">
						<a class="cd-select" href="sign_up.php?plan=plan_premium">Select</a>
					</footer>  <!-- .cd-pricing-footer -->
				</li>
			</ul> <!-- .cd-pricing-list -->
		</div> <!-- end pricing plans -->
	</section>

	<?php include("footer.html") ?>
    
</body>